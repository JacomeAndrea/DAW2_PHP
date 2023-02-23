<?php

require_once 'AccesoDatos.php';
require_once 'Cliente.php';
require_once 'Pedido.php';

if (empty($_GET['nombre']) || empty($_GET['clave'])) {
    $mensaje= "Los campos están vacíos";
    include "vistaerror.php";
    exit();
}

$nombre = $_GET['nombre'];
$clave = $_GET['clave'];

$db = AccesoDatos::getModelo();

$cliente = $db->getCliente($nombre, $clave);

if ($cliente == null) {
    $mensaje= "El cliente no existe";
    include "vistaerror.php";
    exit();
}

//actualizar el número de veces que ha entrado el cliente
$db->updateVecesCliente($cliente->cod_cliente);

$pedidos = $db->getPedidos($cliente->cod_cliente);

$db->closeModelo();

include 'vistapedidos.php';