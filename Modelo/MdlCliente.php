<?php
require_once "conexion.php";
class ClienteMdl {
    static public function mdlObtenerCliente($parametro) {
        if($parametro != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM clientesdatos where `idCliente` = :$idCliente");
            $stmt->bindParam(":",$idCliente,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM clientesdatos");
            $stmt->execute();
            return $stmt -> fetchAll();
            //$stmt->close();
            //$stmt=null;
        }
        
        
    }
    static public function mdlGuardarclientes($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO clientesdatos (`Nombre`, `App`, `Apm`, `Telef`) VALUES (:Nombre,:App,:Apm,:Telef)");
        $stmt->bindParam(":Nombre",$datos["Nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":App",$datos["App"],PDO::PARAM_STR);
        $stmt->bindParam(":Apm",$datos["Apm"],PDO::PARAM_STR);
        $stmt->bindParam(":Telef",$datos["Telef"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "correcto";
            
        }else{
            return "error";
        }
      //  $stmt->close();
      
        $stmt=null;
    }
}
/*if($stmt->execute()){
            return"correcto";
        }else{
            return "incorrecto";
        }
        return $stmt -> fetch(); */