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
  

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap">
  <style>


    .boton-container {
      display: flex;
      justify-content: space-between;
      width: flex;
      text-align: center;
    }

    .boton {
      padding: 15px 25px;
      font-size: 18px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      border: none;
      border-radius: 30px;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s, transform 0.3s;
      font-weight: bold;
    }

    .boton-izquierda {
      color: #fff;
      background-color: #007bff;
    }

    .boton-derecha {
      color: #fff;
      background-color: #28a745;
    }

    .boton:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .boton:active {
      transform: translateY(0);
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .emoji {
      margin-right: 10px;
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
      color: #337ab7;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.05);
      }
    }

    .text-primary {
        font-size: 34px; /* Tamaño de fuente */
        font-family: 'Merriweather', serif; /* Tipo de letra */
        font-weight: bold; /* Texto en negrita */
        background-color: white; /* Fondo blanco */
    }
  </style>

</head>
<body>

  <section class="h-100">
  <div class="container-login">
  <div class="masthead-content">



    <div class="wrap-login">
      <!-- Automatic element centering -->
      <div class="lockscreen-wrapper">
        <?php //include '../ajax/asistencia.php' ?>
        <div name="movimientos" id="movimientos"></div> 
        <div class="lockscreen-logo">
        <h1 align="center">
        <p class="text-primary">ITL - CLAIMPAY</p>
    </h1> 
          <h2 align="center" ><p class="bg-primary">Registro de Asistencia</p></h2> 
        </div>
        <div class="lockscreen-name" style="text-align: center; margin-top: 20px;">
      <h4>Por favor seleccionar una opción:</h4>
    </div>
    <div style="margin-bottom: 20px;"></div>

<div class="boton-container">
  <button class="boton boton-izquierda" onclick="asistenciaConBreak()"><span class="emoji">🍽️</span> Asistencia con Break</button>
  <button class="boton boton-derecha" onclick="asistenciaSinBreak()"><span class="emoji">🚫</span> Asistencia sin Break</button>
</div>

<script>
  function asistenciaConBreak() {
    window.location.href = 'asistencia.php';
  }

  function asistenciaSinBreak() {
    window.location.href = 'asistenciasnbreak.php';
  }
</script>

<div class="text-center">
  <div class="lockscreen-footer text-center">
    <div class="blue-border-box"> <!-- Agrega esta clase -->
      <style>
        .red-bold-text {
          color: #337ab7;
          font-weight: bold;
          font-size: 18px; /* Cambia el tamaño de la fuente según sea necesario */
          text-align: left; /* Alinea el texto a la derecha */
        }
        .blue-border-box {
          border: 2px solid #337ab7; /* Agrega un borde azul */
          padding: 10px; /* Puedes ajustar este valor según sea necesario */
          border-radius: 5px; /* Para redondear las esquinas */
        }
        .bold-text {
          font-weight: bold; /* Hace que el texto esté en negrita */
          color: blue;
        }
        .underline-text {
          text-decoration: underline; /* Subraya el texto */
        }
      </style>

      <div class="red-bold-text underline-text">Si deseas ver tus marcaciones:</div>
      <a href="../admin/"><h4 align="center" class="bold-text"> >>>Iniciar Sesión<<<</h4></a>
    </div>
  </div>
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
  
</body>
</html> 
