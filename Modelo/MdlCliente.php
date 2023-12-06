<?php
require_once "conexion.php";
class ClienteMdl {
    static public function obtenerCliente($param = "") {
        if($param != ""){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes where `id` = ?");
            $stmt->bindParam(1,$param);
            $stmt->execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes");
            $stmt->execute();
            return $stmt -> fetchAll();
        }
    }
    static public function guardarCliente($datos){
      $stmt = Conexion::conectar()->prepare("INSERT INTO clientes (`Nombre`, `App`, `Apm`, `Telef`) VALUES (:Nombre, :App, :Apm, :Telef)");
      $datosArray = array("Nombre" => $datos["Nombre"], "App" => $datos["App"], "Apm" => $datos["Apm"], "Telef" => $datos["Telef"]);
      try{
        $stmt->execute($datosArray); 
        return "correcto";   
      }catch(PDOException $e){
        return "error: " . $e->getMessage();
      }
    }
    static public function actualizarCliente($datos){
      $stmt = Conexion::conectar()->prepare("UPDATE clientes SET Nombre = :Nombre, App = :App, Apm = :Apm, Telef = :Telef WHERE id = :id");
      $datosArray = array("id" => $datos['id'], "Nombre" => $datos["Nombre"], "App" => $datos["App"], "Apm" => $datos["Apm"], "Telef" => $datos["Telef"]);
      try{
        $stmt->execute($datosArray); 
        return "correcto";   
      }catch(PDOException $e){
        return "error: " . $e->getMessage();
      }
    }
    static public function eliminarCliente($id){
      $stmt = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id = ?");
      $stmt->bindParam(1,$id);
      try{
        $stmt->execute(); 
        //This needs to be changed, depending on the driver used. For example, this works for MySQL but not for Postgres
        if ($stmt->rowCount()!=1) {
          echo json_encode(array("status" => "error", "message" => "This client doesn't exist"));
        }
        echo json_encode(array("status" => "correcto"));
      }catch(PDOException $e){
          echo json_encode(array("status" => "error", "message" => $e->getMessage()));
      }
    }
}