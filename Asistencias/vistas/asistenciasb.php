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
      color: orange;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.05);
      }
    }



  </style>
</head>
<body>
  <section class="h-100">
  <div class="container-login">
  <div class="masthead-content">
    <div class="container-fluid px-lg-0">
    <div class="widget" style="border: 3px solid  ; padding: 0.1px; background-color: #007bff; color: white;">
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
  <div class="lockscreen-wrapper">
    <?php //include '../ajax/asistencia.php' ?>
    <div name="movimientos" id="movimientos"></div> 

    <div class="lockscreen-name" style="text-align: center; margin-top: 20px;">
      <h4>Por favor ingresa tu ID</h4>
    </div>
    <div style="display: flex; justify-content: center; margin-top: 20px;">
      <form action="" class="lockscreen-credentials" name="formulario" id="formulario" method="POST">
        <div class="input-group">
          <style>
            /* Estilos personalizados para el input de contraseña */
            input#codigo_persona.custom-password-input {
              border: 2px solid #FFB200; /* Borde verde */
              border-radius: 25px; /* Bordes redondeados */
              padding: 15px; /* Espaciado interno */
              font-size: 16px; /* Tamaño de la fuente */
              width: 250px; /* Ancho del input */
              background-color: #f4f4f4; /* Color de fondo */
              color: #FFB200; /* Color del texto */
              outline: none; /* No resaltado al hacer clic */
              transition: border-color 0.3s; /* Transición suave para el cambio de color de borde */
            }
            /* Placeholder */
            input#codigo_persona.custom-password-input::placeholder {
              color: #aaa; /* Color del texto del placeholder */
            }
            /* Cambio de color del borde cuando el input está enfocado */
            input#codigo_persona.custom-password-input:focus {
              border-color: #ff6f61; /* Borde rojo cuando el input está enfocado */
            }
            /* Botón de envío */
            .btn-primary .fa-arrow-right {
              font-size: 24px; /* Tamaño de la flecha */
              color: #FFB200; /* Color del ícono */
            }
            .btn-primary {
  background-color: transparent !important; /* Fondo completamente transparente */
  border-color: #007bff; /* Color del borde del botón */
  padding: 15px 30px; /* Espaciado interno del botón */
  font-size: 24px; /* Tamaño del texto del botón */
  border-radius: 50px; /* Bordes redondeados */
  transition: background-color 0.3s, border-color 0.3s; /* Transición suave */
}

.btn-primary:hover {
  background-color: #007bff; /* Color de fondo del botón al pasar el mouse */
  border-color: #0056b3; /* Color del borde del botón al pasar el mouse */
}
          </style>
          <!-- Input de contraseña con formato personalizado -->
          <input type="text" class="custom-password-input form-control" name="codigo_persona" id="codigo_persona" placeholder="Ingresar ID" required>
<div class="input-group-btn">
  <button id="submitButton" type="submit" class="btn btn-primary rounded-circle p-2">
    <i class="fa fa-arrow-right"></i>
  </button>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar el botón de envío
    const submitButton = document.getElementById('submitButton');

    // Escuchar clic en el botón de envío
    submitButton.addEventListener('click', function() {
        // Redirigir a asistencia.php después de 6 segundos (6000 milisegundos)
        setTimeout(function() {
            window.location.href = 'asistencia.php';
        }, 2000); 
    });
});
</script>
        </div>     
      </form>
    </div>
  </div>
</div>


    
          <!-- /.lockscreen credentials --> 

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
