<?php
require_once "conexion.php";
class UsuarioMdl {
    static public function mdlMostrarUsuario($valor) {
        $stmt = Conexion::conectar()->prepare("SELECT Contrasena FROM usuarios WHERE Usuario = ?");
        $stmt->bindParam(1, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetch();
    }
}