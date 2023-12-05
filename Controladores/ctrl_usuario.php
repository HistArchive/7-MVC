<?php
class UsuarioCtrl {
    static public function ctrlIngresoCliente() {
        
        if (isset($_POST["txt_usuario"]) && isset($_POST["txt_contrasena"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_usuario"]) && 
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["txt_contrasena"])) {
                $valor = $_POST["txt_usuario"];
                $valor2 = $_POST["txt_contrasena"];
                $result = UsuarioMdl::mdlMostrarCliente($valor, $valor2);
                var_dump($result);
                if ($result && $result["Usuario"] == $_POST["txt_usuario"] && $result["Contrasena"] == $_POST["txt_contrasena"]) {
                    $_SESSION["login"] = "activa";
                    echo '<script>window.location="inicio";</script>';
                } else {
                    echo 'mal';
                }
            }
        }
    }
}