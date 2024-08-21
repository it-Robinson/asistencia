<!DOCTYPE html>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
} else {
    require 'header.php';
    require_once('../modelos/Usuario.php');
    $usuario = new Usuario();
    $rsptan = $usuario->cantidad_usuario();
    $reg = $rsptan->fetch_object();
    $reg->nombre;

    ?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

        <?php

$conn = mysqli_connect("localhost", "root_assistancesystem", "Dbmm3l8-MA4surd-RAs55#hrowback-#5qL", "assistancesystemdb");     
$conn->set_charset("utf8mb4");   
// Conectar a la base de datos y obtener las solicitudes
// ...
$sql = "SELECT DATE_FORMAT(s.fecha_solicitud, '%d/%m/%Y %H:%i:%s') as fecha_solicitud,
s.id,
s.usuario_revisor,
u.nombre,
u.apellidos,
DATE_FORMAT(s.fecha_inicio, '%d/%m/%Y') as fecha_inicio,
DATE_FORMAT(s.fecha_fin, '%d/%m/%Y')as fecha_fin,
s.motivo,
s.estado,
s.descripcion,
s.archivo_adjunto
FROM solicitudes_permisos s
INNER JOIN usuarios u ON s.idusuario = u.idusuario";
$result = mysqli_query($conn, $sql);
?>
<style>
    .aprobado {
        background-color: #28a745; /* Verde */
        color: #ffffff; /* Blanco */
        padding: 3px 6px; /* Espacio adicional alrededor del texto */
        border: 1px solid #000000; /* Borde negro */
        border-radius: 5px; /* Bordes redondeados */
        font-weight: bold; /* Negrita */
    }

    .pendiente {
        background-color: #ffc107; /* Amarillo */
        color: #ffffff; /* Blanco */
        padding: 3px 6px; /* Espacio adicional alrededor del texto */
        border: 1px solid #000000; /* Borde negro */
        border-radius: 5px; /* Bordes redondeados */
        font-weight: bold; /* Negrita */
    }

    .rechazado {
        background-color: #FC0000; /* Rojo */
        color: #ffffff; /* Blanco */
        padding: 3px 6px; /* Espacio adicional alrededor del texto */
        border: 1px solid #000000; /* Borde negro */
        border-radius: 5px; /* Bordes redondeados */
        font-weight: bold; /* Negrita */
    }
/* Estilo básico para los botones */
.btn {
    display: inline-block;
    padding: 2px 5px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Botón verde */
.btn-approve {
    background-color: green;
    border: 2px solid darkgreen; /* Añade un borde sólido de 2px de color darkgreen */
}

.btn-approve:hover {
    background-color: darkgreen;
}

/* Botón rojo */
.btn-reject {
    background-color: red;
    border: 2px solid darkred; /* Añade un borde sólido de 2px de color darkred */
}

.btn-reject:hover {
    background-color: darkred;
}

/* Asegurar que no cambien a azul en hover */
.btn:hover {
    color: white;
    text-decoration: none;
}
.descripcion-col {
    width: 300px; /* Ajusta este valor seg�n tus necesidades */
  }

  .descripcion-textarea {
    width: 100%;
    height: 100px;
    resize: none;
    border: none;
    background: transparent;
    margin: 10px;
    padding: 10px;
    box-sizing: border-box; /* Asegura que el padding se incluya en el ancho total */
  }

</style>

<div style="background-color: white; border: 2px solid #3c8dbc; border-radius: 10px; padding: 20px;">
    <div style="text-align: center;">
        <h3 style="color: #3c8dbc; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 28px; text-transform: uppercase; border-bottom: 2px solid #3c8dbc; padding-bottom: 5px; margin-bottom: 20px; display: inline-block;">Lista de solicitudes</h3>
    </div>
<table id="solicitudes_table">
    <thead>
        <tr>
            <th>Fecha de Solicitud</th>
            <th>N° de Solicitud</th>
            <th>Usuario Revisor</th>
            <th>Nombre Completo</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Motivo</th>          
            <th>Estado</th>
            <th>Descripción</th>
            <th>Archivo Adjuntos</th>
            <th style="width: 130px;">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($solicitud = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td style="text-align: center;"><?php echo $solicitud["fecha_solicitud"]; ?></td>
                <td style="text-align: center;"><strong><?php echo $solicitud["id"]; ?></strong></td> 
                <td style="text-align: center;"><?php echo $solicitud["usuario_revisor"]; ?></td>
                <td><?php echo $solicitud["nombre"] . ' ' . $solicitud["apellidos"]; ?></td>
                <td><?php echo $solicitud["fecha_inicio"]; ?></td>
                <td><?php echo $solicitud["fecha_fin"]; ?></td>
                <td><?php echo $solicitud["motivo"]; ?></td>
                <td>
    <?php 
        $estado = $solicitud["estado"]; 
        if ($estado == "Aprobado") {
            echo '<span class="aprobado">' . $estado . '</span>';
        } elseif ($estado == "Pendiente") {
            echo '<span class="pendiente">' . $estado . '</span>';
        } elseif ($estado == "Rechazado")  {
            echo '<span class="rechazado">' . $estado . '</span>';
        }
    ?>
            </td>
 <td class="descripcion-col">
  <textarea readonly class="descripcion-textarea"><?php echo htmlspecialchars($solicitud["descripcion"]); ?></textarea>
</td>                                        <td style="text-align: center;">
    <?php 
    // Obtener el nombre del archivo de la ruta
    $ruta_archivo = $solicitud["archivo_adjunto"];
    
    if ($ruta_archivo !== null) {
        $nombre_archivo = basename($ruta_archivo);
        // Generar la URL del archivo adjunto
        $url_archivo = "../files/archivos/" . $nombre_archivo;
        echo '<a href="' . $url_archivo . '" download>' . $nombre_archivo . '</a>';
    } else {
        // Si $ruta_archivo es nulo, mostrar mensaje de que no hay documento
        echo "No hay documento";
    }
    ?>
</td>
<td>
    <?php if($solicitud['estado'] == 'Pendiente') { ?>
        <a href="aprobar_permiso.php?id=<?php echo $solicitud['id']; ?>" class="btn btn-approve">Aprobar</a>
        <a href="rechazar_permiso.php?id=<?php echo $solicitud['id']; ?>" class="btn btn-reject">Rechazar</a>
    <?php } else { ?>
        <strong>Accion Realizada</strong>
    <?php } ?>
</td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
<script>
    $(document).ready(function() {
        $('#solicitudes_table').DataTable();
    });
</script>



        
        </section>






    </div>

<?php
require 'footer.php';
}
ob_end_flush();
?>