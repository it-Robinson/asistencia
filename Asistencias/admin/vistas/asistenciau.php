<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Usuarios</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistadou" class="table table-striped table-bordered table-condensed table-hover">
  <thead>
    <th>Fecha</th>
    <th>Código</th>
    <th>Nombres</th>
    <th>Área</th>
    <th style="background-color: green; color: white;">Entrada de Turno</th>
    <th style="background-color: lightblue; color: black;">Entrada de Break</th>
    <th style="background-color: orange; color: black;">Salida de Break</th>
    <th style="background-color: red; color: white;">Salida de Turno</th>
  </thead>
    <tbody>
    </tbody>  
  </table>
</div>

      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 

require 'footer.php';
 ?>
 <script src="scripts/asistencia.js"></script>
 <?php 
}

ob_end_flush();
  ?>
