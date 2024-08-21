<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root_assistancesystem", "Dbmm3l8-MA4surd-RAs55#hrowback-#5qL", "assistancesystemdb");
$conn->set_charset("utf8mb4");
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id = $_GET['id'];
$nombreAprobador = $_SESSION['nombre']; 
$apellidoAprobador = $_SESSION['apellidos']; 

$completoAprobador = $nombreAprobador . ' ' . $apellidoAprobador;

$sql = "UPDATE solicitudes_permisos SET estado='Aprobado', usuario_revisor='$completoAprobador' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Permiso aprobado correctamente.";

    // Obtener información de la solicitud y del empleado
    $sql_info = "SELECT s.usuario_revisor,u.email, u.nombre, u.apellidos, s.fecha_inicio, s.fecha_fin, s.motivo, s.descripcion 
                 FROM solicitudes_permisos s 
                 JOIN usuarios u ON s.idusuario = u.idusuario 
                 WHERE s.id = '$id'";
    $result = mysqli_query($conn, $sql_info);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $email = $row['email'];
            $nombre = isset($row['nombre']) ? $row['nombre'] : '';
            $apellidos = isset($row['apellidos']) ? $row['apellidos'] : '';
            $fecha_inicio = $row['fecha_inicio'];
            $fecha_fin = $row['fecha_fin'];
            $motivo = $row['motivo'];
            $usuario_revisor = $row['usuario_revisor'];
            $descripcion = $row['descripcion'];

            // Envío del correo de notificación
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'it@flinslaw.com';
                $mail->Password = 'ZWVV$eF8^VbbvVm%L6K@hTdwpgebMWnPzPssva^1fRKqb1HXjRt%@eu!9B7S';  // Usa la contraseña de aplicación generada
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configuración segura para verificación de certificados
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => true,
                        'allow_self_signed' => true
                    )
                );

                // Configuración del correo
                $mail->setFrom('it@itl.legal', 'Notificaciones');
                $mail->addAddress($email, "{$nombre} {$apellidos}");

                $mail->CharSet = 'UTF-8';


                // Convertir y formatear las fechas
                $date_inicio = new DateTime($fecha_inicio);
                $fecha_inicio_formateada = $date_inicio->format('d/m/Y');
                
                $date_fin = new DateTime($fecha_fin);
                $fecha_fin_formateada = $date_fin->format('d/m/Y');
                
                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Solicitud de permiso aprobada';
                $mail->Body    = "Hola {$nombre} {$apellidos},<br><br>
                                  Tu solicitud de permiso ha sido <b>Aprobada</b> por <b>{$completoAprobador}</b>.<br><br>
                                  <b>Fecha de Inicio:</b> {$fecha_inicio_formateada}<br>
                                  <b>Fecha de Fin:</b> {$fecha_fin_formateada}<br>
                                  <b>Motivo:</b> {$motivo}<br>
                                  <b>Descripción:</b> {$descripcion}<br><br>
                                  Saludos,<br>
                                  Equipo de Recursos Humanos";
                $mail->AltBody = "Hola {$nombre} {$apellidos},\n\n
                                  Tu solicitud de permiso ha sido aprobada.\n\n
                                  Fecha de Inicio: {$fecha_inicio_formateada}\n
                                  Fecha de Fin: {$fecha_fin_formateada}\n
                                  Motivo: {$motivo}\n
                                  Descripción: {$descripcion}\n\n
                                  Saludos,\n
                                  Equipo de Recursos Humanos";

                $mail->send();
                echo 'Se ha enviado una notificación por correo al empleado.';
            } catch (Exception $e) {
                echo "La notificación por correo no pudo ser enviada. Error de correo: {$mail->ErrorInfo}";
            }
        } else {
            echo "No se encontró la información de la solicitud.";
        }
    } else {
        echo "Error en la consulta de información de la solicitud: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ListadoPermisos.php");
exit;
?>
