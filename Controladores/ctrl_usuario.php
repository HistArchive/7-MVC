<?php
if (session_id() == '') {session_start();} 
class UsuarioCtrl {
    static public function ctrlIngresoUsuario() {
      if (isset($_POST["txt_usuario"]) && isset($_POST["txt_contrasena"])) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_usuario"]) && 
          preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_contrasena"])) {
          $ctrl_usuario = dirname(__DIR__) . "/Modelo/MdlUsuario.php";
          require_once(realpath($ctrl_usuario));
          $result = UsuarioMdl::mdlMostrarUsuario($_POST["txt_usuario"], $_POST["txt_contrasena"]);
          if ($result && $result["Usuario"] == $_POST["txt_usuario"] && $result["Contrasena"] == $_POST["txt_contrasena"]) {
              $_SESSION["login"] = "activa";
              $_SESSION['user']=$result["Usuario"];
              $_SESSION['flash_msg'] = '<script>window.location="Inicio";</script>';
          } else {
            $_SESSION['flash_msg'] = 'Usuario o contraseña incorrecto, por favor verifique su información y vuelva a intentarlo.';
          }
        }
      }
    }
}