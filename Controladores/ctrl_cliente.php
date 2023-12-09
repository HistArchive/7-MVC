<?php
$mdl_cliente = dirname(__DIR__) . "/Modelo/MdlCliente.php";
require_once(realpath($mdl_cliente));
class ControladorClientes{
  static public function guardarCliente(){
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        return;
    }
    //Add a new client
    if(isset($_POST["add_txt_nombre"])){
      if(preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_nombre"]) && 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_app"])     && 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_apm"])     &&
        preg_match('/^[0-9]+$/',$_POST["add_txt_tel"])){
        //accion correcta
        //var_dump($_POST["txt_nombre"]);
        $datos = array(
          "Nombre" => $_POST["add_txt_nombre"],
          "App" => $_POST["add_txt_app"],
          "Apm" => $_POST["add_txt_apm"], 
          "Telef" => $_POST["add_txt_tel"]
        );
        $result = ClienteMdl::guardarCliente($datos);
        if($result == "correcto"){
          //Refresh the page
          echo'<script> window.location="Clientes"; </script>';
        } else {
          echo'<script> alert("'. $result .'"); </script>';
        }
      } else {
        echo'<script> alert("Invalid info sent"); </script>';
      }
    } 
  }
  static public function actualizarCliente(){
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      return;
    }
    if(isset($_POST["edit_id"])){
      if(
        preg_match('/^[0-9]+$/',$_POST["edit_id"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["edit_txt_nombre"]) && 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["edit_txt_app"])   && 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["edit_txt_apm"])   &&
        preg_match('/^[0-9]+$/',$_POST["edit_txt_tel"])){
          //accion correcta
          $datos = array(
            "id" => $_POST["edit_id"],
            "Nombre" => $_POST["edit_txt_nombre"],
            "App" => $_POST["edit_txt_app"],
            "Apm" => $_POST["edit_txt_apm"], 
            "Telef" => $_POST["edit_txt_tel"]
          );
          $result = ClienteMdl::actualizarCliente($datos);
          if($result == "correcto"){
            //Refresh the page
            echo'<script> window.location="Clientes"; </script>';
          } else {
            echo'<script> alert("'. $result .'"); </script>';
          }
      } else {
        echo'<script> alert("Invalid info sent"); </script>';
      }
    }
  }
  static public function obtenerClientes(){
    return json_encode(ClienteMdl::obtenerCliente());
  }
  static public function obtenerCliente($idCliente){
    return json_encode(ClienteMdl::obtenerCliente($idCliente));
  }
  static public function eliminarCliente($idCliente){
    header('Content-Type: application/json');
    return json_encode(ClienteMdl::eliminarCliente($idCliente));
  }
}