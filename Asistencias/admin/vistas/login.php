<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css"> 
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/css/blue.css">
    <link rel="shortcut icon" href="../public/img/icono.ico">

  </head>
  <body >
    <section class="h-100">
      <div class="container-login">
        <div class="wrap-login">  

    
      <div class="login-logo">
       <a href="login.html"><b class="text-primary" >Control De</b> Asistencia</a>
      </div><!-- /.login-logo -->
      <div >
        <h3 align="center" > <p class="text-primary">Ingrese sus datos de Acceso</p></h3>
        <form method="post" id="frmAcceso">
          <div class="form-group has-feedback">
            <input type="text" id="logina" name="logina" class="form-control" placeholder="Usuario">
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Password">
            <span class="fa fa-key form-control-feedback"></span>
          </div>         

          <div class="container-login-form-btn">
            <div class="wrap-login-form-btn">
                <div class="login-form-bgbtn"></div>
                <button type="submit" name="submit" class="login-form-btn">Ingresar</button>
            </div>
        </div>

          <div class="lockscreen-footer text-center">
            <a href="../../vistas/asistencia.php">Regresar al Registro de Asistencias</a>
          </div>
        </form>        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </div>
 
    <!-- jQuery -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
     <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>

    <script type="text/javascript" src="scripts/login.js"></script>
  
  </section>
  </body>
</html> 
