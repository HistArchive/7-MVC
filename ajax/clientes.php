<?php
require_once "Modelo/MdlCliente.php";
require_once "Controladores/ctrl_cliente.php";
class clientes{
    public function editarAjaxClientes($idCliente){
        echo json_encode(ClienteMdl::mdlObtenerCliente());
    }
}

if(isset($_POST["IdCliente"])){
  $objModficar -> clientes() -> editarAjaxClientes($_POST["idCliente"]);
}