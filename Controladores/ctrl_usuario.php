<?php
if (session_id() == '') {session_start();} 
class UsuarioCtrl {
    static public function ctrlIngresoUsuario() {
      if (isset($_POST["txt_usuario"]) && isset($_POST["txt_contrasena"])) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_usuario"]) && 
          preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_contrasena"])) {
          $ctrl_usuario = dirname(__DIR__) . "/Modelo/MdlUsuario.php";
          require_once(realpath($ctrl_usuario));
          $result = UsuarioMdl::mdlMostrarUsuario($_POST["txt_usuario"]);
          if ($result && password_verify($_POST["txt_contrasena"], $result["Contrasena"]) ) {
              $_SESSION["login"] = "activa";
              $_SESSION['user'] = $_POST["txt_usuario"];
              $_SESSION['flash_msg'] = '<script>window.location="Inicio";</script>';
          } else {
            // Quitar el siguiente comentario para ver la contraseña encriptada a almacenar en la base de datos si se quiere registrar
            // un nuevo usuario
            //$_SESSION['flash_msg'] = password_hash($_POST['txt_contrasena'], PASSWORD_BCRYPT);
            $_SESSION['flash_msg'] = 'Usuario o contraseña incorrecto, por favor verifique su información y vuelva a intentarlo.';
          }
        }
      }
    }
}