<?php
  session_start();
  if(!isset($_SESSION['login'])){
    include "Vista/Modulos/login.php"; 
    return;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leymi Olivares Barreiro</title>
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="Vista/plugins/jquery/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="Vista/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Vista/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vista/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
 


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="Vista/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
    
    ?>
    <section class="content">
      <?php 
        // <!-- Navbar -->
        include "Vista/Modulos/nav.php"; 
        //<!-- Main Sidebar Container -->
        include "Vista/Modulos/aside.php";
        //<!-- Listas amigables -->
        if(isset($_GET["ruta"])){
            if($_GET["ruta"]=="Inicio" ||
                $_GET["ruta"]=="Clientes" ||
                $_GET["ruta"]=="Usuarios" ||
                $_GET["ruta"]=="Salir"
            ){
                include "Vista/Modulos/".$_GET["ruta"].".php";
            }else{
              include "Vista/Modulos/404.php"; 
            }
          } else {
            include "Vista/Modulos/Inicio.php";
          }
        include "Vista/Modulos/footer.php"; 
        //echo '</div>';
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->
<!-- InputMask -->
<script src="Vista/plugins/moment/moment.min.js"></script>
<script src="Vista/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- <script>  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })</script> -->

<!-- Bootstrap -->
<script src="Vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="Vista/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Vista/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="Vista/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="Vista/plugins/raphael/raphael.min.js"></script>
<script src="Vista/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="Vista/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="Vista/plugins/chart.js/Chart.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<!--SWEET ALERT-->
<script src="Vista/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Vista/plugins/sweetalert2/sweetalert2.min.css"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Vista/dist/js/pages/dashboard2.js"></script>
</body>
</html>
