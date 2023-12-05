<?php
require_once "Modelo/MdlCliente.php";
require_once "Controladores/ctrl_cliente.php"
class clientes{
    public $idcliente
    public function editarAjaxClientes(){
     
        $idcliente = $this->idcliente;
        $respuesta = ModeloClientes ::  mdlObteneracalientes();
        echo json_encode($respuesta);

    }

    if(isset($_POST["IdCliente"])){
        $objModficar-> new clientes();
        $objModificar -> idCliente = $_POST["idCliente"];
        $objModficar - > editarAjaxClientes();
    }
}