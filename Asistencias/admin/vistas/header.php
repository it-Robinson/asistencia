<?php 
if (strlen(session_id()) < 1) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asistencia</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/icono.ico">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="escritorio.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>PA</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Panel de Asistencia</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php 
                                if (isset($_SESSION['nombre'])) {
                                    $nombreCompleto = $_SESSION['nombre'];
                                    $partesNombre = explode(' ', $nombreCompleto);
                                    echo $partesNombre[0]; // Imprime el primer nombre
                                }
                                ?>
                                <?php 
                                if (isset($_SESSION['apellidos'])) {
                                    $nombreCompleto = $_SESSION['apellidos'];
                                    $partesNombre = explode(' ', $nombreCompleto);
                                    echo $partesNombre[0]; // Imprime el primer nombre
                                }
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php 
                                    if (isset($_SESSION['nombre'])) {
                                        $nombreCompleto = $_SESSION['nombre'];
                                        $partesNombre = explode(' ', $nombreCompleto);
                                        echo $partesNombre[0]; // Imprime el primer nombre
                                    }
                                    ?>
                                    <?php 
                                    if (isset($_SESSION['apellidos'])) {
                                        $nombreCompleto = $_SESSION['apellidos'];
                                        $partesNombre = explode(' ', $nombreCompleto);
                                        echo $partesNombre[0]; // Imprime el primer nombre
                                    }
                                    ?>
                                </p>
                                <p>
                                    <b>
                                        <?php 
                                        if (isset($_SESSION['nombre_departamento'])) {
                                            $nombreCompleto = $_SESSION['nombre_departamento'];
                                            $partesNombre = explode(' ', $nombreCompleto);
                                            echo $partesNombre[0];
                                            if (isset($partesNombre[1])) echo " " . $partesNombre[1];
                                            if (isset($partesNombre[2])) echo " " . $partesNombre[2];
                                        }
                                        ?>
                                    </b>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="../ajax/usuario.php?op=salir" class="btn btn-primary" role="button">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" style="width: 50px; height: 50px;" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>
                        <?php 
                        if (isset($_SESSION['nombre'])) {
                            $nombreCompleto = $_SESSION['nombre'];
                            $partesNombre = explode(' ', $nombreCompleto);
                            echo $partesNombre[0]; // Imprime el primer nombre
                        }
                        ?>
                        <?php 
                        if (isset($_SESSION['apellidos'])) {
                            $nombreCompleto = $_SESSION['apellidos'];
                            $partesNombre = explode(' ', $nombreCompleto);
                            echo $partesNombre[0]; // Imprime el primer nombre
                        }
                        ?>
                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="header">MENÚ DE NAVEGACIÓN</li>
                <li><a href="escritorio.php"><i class="fa fa-dashboard"></i> <span>Escritorio</span></a></li>
                <?php if ($_SESSION['tipousuario'] == 'Administrador') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Acceso</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            <li><a href="tipousuario.php"><i class="fa fa-circle-o"></i> Tipo Usuario</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-building"></i> <span>Departamento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="departamento.php"><i class="fa fa-circle-o"></i> Tipo de Departamento</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-clock-o"></i> <span>Asistencias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="asistencia.php"><i class="fa fa-circle-o"></i> Reporte General</a></li>
                            <li><a href="rptasistencia.php"><i class="fa fa-circle-o"></i> Reportes por fechas</a></li>
                            <!--<li><a href="ListadoPermisos.php"><i class="fa fa-circle-o"></i> Listado de Permisos</a></li>-->
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['tipousuario'] == 'empleado') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-clock-o"></i> <span>Mis Asistencias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="asistenciau.php"><i class="fa fa-circle-o"></i> Reporte General</a></li>
                            <li><a href="rptasistenciau.php"><i class="fa fa-circle-o"></i> Reporte por fechas</a></li>
                            <!--<li><a href="formularioPermiso.php"><i class="fa fa-circle-o"></i> Solicitar Permiso</a></li>-->
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['tipousuario'] == 'Team Leader') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-clock-o"></i> <span>Mis Asistencias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="asistenciau.php"><i class="fa fa-circle-o"></i> Mi lista de Asistencia</a></li>
                            <li><a href="asistenciaspordepa.php"><i class="fa fa-circle-o"></i> Reporte por Area</a></li>
                            <!--<li><a href="formularioPermiso.php"><i class="fa fa-circle-o"></i> Solicitar Permiso</a></li>-->
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['tipousuario'] == 'Gerencia y RRHH') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-clock-o"></i> <span>Mis Asistencias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="asistencia.php"><i class="fa fa-circle-o"></i> Reporte General</a></li>
                            <li><a href="rptasistencia.php"><i class="fa fa-circle-o"></i> Reportes por fechas</a></li>
                           <!-- <li><a href="ListadoPermisos.php"><i class="fa fa-circle-o"></i> Listado de Permisos</a></li>-->
                        </ul>
                    </li>
                <?php } ?>
                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

