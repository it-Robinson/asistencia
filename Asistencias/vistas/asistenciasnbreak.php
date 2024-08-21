<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ITL and Claimpay</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../admin/public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/public/css/font-awesome.css">
  <link rel="stylesheet" href="../admin/public/css/estilos.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/public/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="shortcut icon" href="../admin/public/img/icono.ico">
  <!-- Enlace a Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<style>
.container-login {
  text-align: center;
}
.fecha, .reloj {
 
  margin: 10px;
}

.lockscreen-footer {
      margin-top: 20px;
    }

    .lockscreen-footer a {
      text-decoration: none;
      color: #007bff;
      font-size: 18px;
      transition: color 0.3s;
    }

    .lockscreen-footer a:hover {
      color: #0056b3;
    }

    h4 {
      margin: 0;
      font-size: 20px;
      font-weight: bold;
    }

    .lockscreen-name {
      text-align: center;
      animation: pulse 2s infinite alternate;
    }

    .lockscreen-name h5 {
      margin: 10px 0;
      font-size: 18px;
      color: #555;
      font-style: italic;
    }

    .lockscreen-name h4 {
      margin: 5px 0;
      font-size: 22px;
      font-weight: bold;
      color: #333;
    }

    .lockscreen-name h4:last-child {
      color: white;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.05);
      }
    }



    /* Diseño Ticket */

    .btn-ticket {
  border-radius: 20px; /* Hacemos que los botones tengan bordes redondeados */
  padding: 10px 20px; /* Añadimos espacio interno */
  margin: 5px; /* Añadimos margen entre los botones */
  font-size: 16px; /* Tamaño del texto */
  font-weight: bold; /* Texto en negrita */
  text-transform: uppercase; /* Texto en mayúsculas */
}

.ticket-buttons {
  text-align: center; /* Centramos los botones */
}


  </style>
</head>
<body>
  <section class="h-100">
  <div class="container-login">
  <div class="masthead-content">
    <div class="container-fluid px-lg-0" >
      <div class="widget" style="border: 3px solid  ; padding: 0.1px; background-color: #28a745; color: white;">
        <div class="fecha">
          <p id="diaSemana" class="diaSemana"></p>
          <p id="dia" class="dia"></p>
          <p>de</p>
          <p id="mes" class="mes"></p>
          <p>del</p>
          <p id="year" class="year"></p>
        </div>
        <div class="reloj">
          <p id="horas" class="horas">00</p>
          <p>:</p>
          <p id="minutos" class="minutos">00</p>
          <p>:</p>
          <div class="caja-segundos">
            <p id="segundos" class="segundos">00</p>
          </div>
        </div>
      </div>
    </div>
  </div>


    <div class="wrap-login">
      <!-- Automatic element centering -->
      <div class="lockscreen-wrapper">
        <?php //include '../ajax/asistencia.php' ?>
        <div name="movimientos" id="movimientos"></div> 
        <div class="lockscreen-logo">
        <h3 class="text-center" style="border: 3px solid green; font-size: 0.6em; color: #fff; background-color: #28a745; padding: 1px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">
  ASISTENCIA SIN BREAK
  <img src="..\admin\files\Imagenes/sin-comida.png" style="width: 80px; height: auto; margin-left: 10px;">
</h3>

        </div>
        <!-- User name -->
        <style>
          .lockscreen-name h4 {
            color: red;
            font-weight: bold;
          }
        </style>
<div class="lockscreen-logo" style="border: 3px solid green; padding: 10px; background-color: #28a745; color: white;">
<div class="lockscreen-name">  
<h4>**Solo seleccionar una vez:**</h4>
</div>
  

<div class="ticket-buttons">
<a href="asistenciasbet.php" class="btn btn-success btn-ticket" data-ticket="Entrada de Turno" style="color: white;">Entrada de Turno</a>
<a href="asistenciasbst.php" class="btn btn-danger btn-ticket" data-ticket="Salida de Turno" style="color: white;">Salida de Turno</a>
</div>
</div>

<div class="lockscreen-footer text-center">
  <a href="inicio.php" class="return-link">
    <button class="btn btn-primary btn-lg">
    <i class="bi bi-house-door-fill"></i> <strong>INICIO</strong> <i class="bi bi-house-door-fill"></i>
    </button>
  </a>
</div>


<div class="text-center">
            <p class="mt-5 mb-3 text-muted">&copy; Robinson Sánchez (2024)</p>
          </div>
        </div>
        <!-- /.center -->
      </div>
    </div>
    </div>
  </section>
  <!-- jQuery -->
  <script src="../admin/public/js/jquery-3.1.1.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../admin/public/js/bootstrap.min.js"></script>
  <!-- Bootbox -->
  <script src="../admin/public/js/bootbox.min.js"></script>
  <script type="text/javascript" src="scripts/asistencia.js"></script>
  <script type="text/javascript" src="scripts/scripts.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      function actualizarHora() {
        var fecha = new Date();
        var horas = fecha.getHours();
        var minutos = fecha.getMinutes();
        var segundos = fecha.getSeconds();
        
        // Agregar ceros a la izquierda si es necesario
        horas = (horas < 10 ? "0" : "") + horas;
        minutos = (minutos < 10 ? "0" : "") + minutos;
        segundos = (segundos < 10 ? "0" : "") + segundos;
        
        // Mostrar la hora en el formato deseado
        document.getElementById("horas").innerText = horas;
        document.getElementById("minutos").innerText = minutos;
        document.getElementById("segundos").innerText = segundos;

        // Mostrar los elementos de hora y minutos
        document.getElementById("horas").classList.remove("hidden");
        document.getElementById("minutos").classList.remove("hidden");
      }

      // Actualizar la hora cada segundo
      setInterval(actualizarHora, 1000);

      // Llamar a la función para que muestre la hora actual antes de iniciar el intervalo
      actualizarHora();
    });
  </script>



</body>
</html> 
