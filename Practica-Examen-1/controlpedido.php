<?php

include_once "AccesoDatos.php";
include_once "Cliente.php";
include_once "Pedido.php";

limpiarArrayEntrada($_GET);

//Se comprueba que el usuario y contraseña no esté vacío
if (empty($_GET['nombre']) || empty($_GET['clave'])) {
    $error="Debes introducir nombre y contraseña";
    include_once "vistaerror.php";
    exit();
}



$nombre = $_GET['nombre'];
$clave = $_GET['clave'];
$db = AccesoDatos::getModelo();
$usuario = $db->chequearUsuario($nombre, $clave);

//Comprobamos si el usuario existe o es null
if (!$usuario) {
    $error="El usuario y/o contraseña son incorrectos";
    include_once 'vistaerror.php';
    exit();
}

//pedidos en base al cod_cliente
$arrayPedidos = $db->obtenerListaPedidos($usuario->cod_cliente);


include_once 'vistapedidos.php';
