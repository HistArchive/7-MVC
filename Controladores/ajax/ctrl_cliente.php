<?php
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  return "err";
}
$ctrl_cliente = dirname(__DIR__) . "/ctrl_cliente.php";
require_once(realpath($ctrl_cliente));
if (isset($_POST['idClient'])) {
  echo ControladorClientes::eliminarCliente($_POST['idClient']);
}
?>