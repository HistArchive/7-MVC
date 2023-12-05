<?php
require_once "conexion.php";
class ClienteMdl {
    static public function mdlObtenerCliente($parametro = "") {
        if($parametro != ""){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes where `id` = :idCliente");
            $stmt->bindParam(":idCliente",$parametro);
            $stmt->execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes");
            $stmt->execute();
            return $stmt -> fetchAll();
        }
    }
    static public function mdlGuardarClientes($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO clientes (`Nombre`, `App`, `Apm`, `Telef`) VALUES (:Nombre, :App, :Apm, :Telef)");
        $datosArray = array($datos["Nombre"], $datos["App"], $datos["Apm"], $datos["Telef"]);
        //Changing from individual bindParam to a single Array

        /*$stmt->bindParam(":Nombre",$datos["Nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":App",$datos["App"],PDO::PARAM_STR);
        $stmt->bindParam(":Apm",$datos["Apm"],PDO::PARAM_STR);
        $stmt->bindParam(":Telef",$datos["Telef"],PDO::PARAM_STR);*/

        if($stmt->execute($datosArray)){
            return "correcto";   
        }else{
            return "error";
        }
    }
}
/*if($stmt->execute()){
            return"correcto";
        }else{
            return "incorrecto";
        }
        return $stmt -> fetch(); */