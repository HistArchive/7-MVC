<?php

class ControladorClientes{
    static public function ctrlGuardarCliente(){
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return;
        }
        //desarrollo de las acciones
         if(isset($_POST["txt_nombre"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["txt_nombre"])&& 
                preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["txt_appaterno"]) && 
                preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ]+$/',$_POST["txt_apmaterno"]) &&
                preg_match('/^[0-9]+$/',$_POST["txt_numero"])){
                //accion correcta
                //echo'holaa';
                //var_dump($_POST["txt_nombre"]);
                //enciar los valores a nuestro modelo y el modelo dar
                $datos = array("Nombre"=>$_POST["txt_nombre"],"App"=>$_POST["txt_appaterno"],"Apm"=>$_POST["txt_apmaterno"], "Telef"=>$_POST["txt_numero"]);
                //respuesta
                $respuesta = ClienteMdl::mdlGuardarclientes($datos);
                if($respuesta == "correcto"){
                    echo'<script> windows.location="clientes"; </script>';
                }
            }else{
                
            }
        }
        

        
    }static public function ctrlMostrarClientes(){
            $respuesta = ClienteMdl::mdlObtenerCliente();
                      return $respuesta;
        }
}