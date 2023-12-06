<?php
$mdl_cliente = dirname(__DIR__) . "/Modelo/MdlCliente.php";
require_once(realpath($mdl_cliente));
class ControladorClientes{
  static public function ctrlGuardarCliente(){
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        return;
    }
    //desarrollo de las acciones
    if(isset($_POST["add_txt_nombre"])){
      if(preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_nombre"])&& 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_appa"]) && 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_apma"]) &&
        preg_match('/^[0-9]+$/',$_POST["add_txt_tel"])){
        //accion correcta
        //var_dump($_POST["txt_nombre"]);
        $datos = array(
          "Nombre" => $_POST["add_txt_nombre"],
          "App" => $_POST["add_txt_appa"],
          "Apm" => $_POST["add_txt_apma"], 
          "Telef" => $_POST["add_txt_tel"]
        );
        $result = ClienteMdl::guardarClientes($datos);
        if($result == "correcto"){
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
    return json_encode(ClienteMdl::eliminarCliente($idCliente));
  }
}