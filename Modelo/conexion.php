<?php
class Conexion{
  static public function conectar(){
    try{
      //Change your creds as needed
      $enlace = new PDO("mysql:host=localhost;dbname=cristo7","root","1976197720032006");
      //$enlace = new PDO("mysql:host=localhost;dbname=7_lemi_mvc","root","alpine");
      $enlace->exec("set names utf8");
      return $enlace;
    } catch (PDOException $e) {
        error_log("Error connecting to the database: " . $e->getMessage());
        throw $e; // Rethrow the exception
    } catch (Exception $e) {
        error_log("An error occurred while processing your request: " . $e->getMessage());
        throw $e; // Rethrow the exception
    }
  }
}
?>