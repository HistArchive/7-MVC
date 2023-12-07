<?php 
if (session_id() == '') {session_start();} 
$ctrl_usuario = dirname(__DIR__) . "/../Controladores/ctrl_usuario.php";
require_once(realpath($ctrl_usuario));
$obj_login = new UsuarioCtrl();
$obj_login -> ctrlIngresoUsuario();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leymi Olivares Barreiro | Iniciar sesión</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vista/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="Vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vista/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="Vista/index2.html" class="h1"><b>Leymi</b>MVC</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar Sesion</p>

      <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="txt_usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="txt_contrasena">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
          <?php
          if (isset($_SESSION['flash_msg'])) {
            echo $_SESSION['flash_msg'];
            unset($_SESSION['flash_msg']);
          }
          ?>
        </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="Vista/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Vista/dist/js/adminlte.min.js"></script>
</body>
</html>
