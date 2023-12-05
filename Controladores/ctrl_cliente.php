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
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_appaterno"]) && 
        preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["add_txt_apmaterno"]) &&
        preg_match('/^[0-9]+$/',$_POST["add_txt_numero"])){
        //accion correcta
        //var_dump($_POST["txt_nombre"]);
        $datos = array(
          "Nombre" => $_POST["add_txt_nombre"],
          "App" => $_POST["add_txt_appaterno"],
          "Apm" => $_POST["add_txt_apmaterno"], 
          "Telef" => $_POST["add_txt_numero"]
        );
        if(ClienteMdl::mdlGuardarclientes($datos) == "correcto"){
            echo'<script> windows.location="clientes"; </script>';
        }
      }
    }
  }
  static public function obtenerClientes(){
    return json_encode(ClienteMdl::mdlObtenerCliente());
  }
  static public function obtenerCliente($idCliente){
    return json_encode(ClienteMdl::mdlObtenerCliente($idCliente));
  }
}