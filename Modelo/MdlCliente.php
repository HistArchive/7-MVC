<?php
require_once "conexion.php";
class ClienteMdl {
    static public function obtenerCliente($param = "") {
        $sql = $param != '' ? "SELECT * FROM clientes where `id` = ?" : "SELECT * FROM clientes";
        try { $stmt = Conexion::conectar()->prepare($sql); }
        catch(PDOException $e){return;}
        
        if ($param != '') {
          $stmt->bindParam(1, $param, PDO::PARAM_INT);
        }
        try{
          $stmt->execute(); 
          $result = $param != '' ? $stmt -> fetch() : $stmt -> fetchAll();
          // Check if result is empty
          if (empty($result)) {
            return array(0=>array('err' => ''));
          }
          return $result;
        }catch(PDOException $e){
          return ["error" => "Database error: " . $e->getMessage()];
        }
    }
    static public function guardarCliente($datos){
      $sql = "INSERT INTO clientes (`Nombre`, `App`, `Apm`, `Telef`) VALUES (:Nombre, :App, :Apm, :Telef)";
      try { $stmt = Conexion::conectar()->prepare($sql); }
      catch(PDOException $e){return;}
      $datosArray = array("Nombre" => $datos["Nombre"], "App" => $datos["App"], "Apm" => $datos["Apm"], "Telef" => $datos["Telef"]);
      try{
        $stmt->execute($datosArray); 
        return "correcto";   
      }catch(PDOException $e){
        return "error: " . $e->getMessage();
      }
    }
    static public function actualizarCliente($datos){
      $sql = "UPDATE clientes SET Nombre = :Nombre, App = :App, Apm = :Apm, Telef = :Telef WHERE id = :id";
      try { $stmt = Conexion::conectar()->prepare($sql); }
      catch(PDOException $e){return;}
      $datosArray = array("id" => $datos['id'], "Nombre" => $datos["Nombre"], "App" => $datos["App"], "Apm" => $datos["Apm"], "Telef" => $datos["Telef"]);
      try{
        $stmt->execute($datosArray); 
        return "correcto";   
      }catch(PDOException $e){
        return "error: " . $e->getMessage();
      }
    }
    static public function eliminarCliente($id){
      $sql = "DELETE FROM clientes WHERE id = ?";
      try { $stmt = Conexion::conectar()->prepare($sql); }
      catch(PDOException $e){return;}
      $stmt->bindParam(1, $id);
      try{
        $stmt->execute(); 
        //This needs to be changed, depending on the driver used. For example, this works for MySQL but not for Postgres
        if ($stmt->rowCount()!=1) {
          return array("status" => "error", "message" => "This client doesn't exist");
        }
        return array("status" => "correcto", "message" => "All good!");
      }catch(PDOException $e){
        return array("status" => "error", "message" => error_log($e->getMessage()) ? "Error has been logged" : "Error logging errors");
      }
    }
}