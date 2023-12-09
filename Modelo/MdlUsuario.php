<?php
require_once "conexion.php";
class UsuarioMdl {
    static public function mdlMostrarUsuario($valor) {
      $sql = "SELECT Contrasena FROM usuarios WHERE Usuario = ?";
      try { $stmt = Conexion::conectar()->prepare($sql); }
      catch(PDOException $e){ return -1;}
      $stmt->bindParam(1, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt -> fetch();
    }
}