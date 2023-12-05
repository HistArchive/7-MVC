<?php
/*if ($_SERVER['REQUEST_METHOD']==='POST') {
    $Usuario = "Juan@gmail";
    $Contra = "123";
    $varUsua = $_POST['email'];
    $varContra = $_POST['contra'];
    
    if ($Usuario === $varUsua && $Contra === $varContra) {
        echo"Correcto todo";
    } else {
        echo "Hijole, no puedes entrar";
    }
}

if (isset($_SESSION['Entro'])) {*/
    require_once "Controladores/ctrl_plantilla.php";
    //creacion de objeto
    $obj_plantilla = new ControladorPlantilla();
    $obj_plantilla->ctrlPlantilla();
/*}else{
    require_once "Vista/login2.php";
}*/
