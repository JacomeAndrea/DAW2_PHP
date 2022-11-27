<?php
//iniciamos sesion
session_start();

//PÁGINA PRINCIPAL
if (isset($_GET['name']) && !empty($_GET['name'])) {
    $_SESSION['name']=$_GET['name']; //almacenamos el name en la sesiónç
    //accedemos a realizar la compra
    include 'realizarCompra.php';
} else {
    include 'index.html';
}

//PÁGINA DE REALIZAR COMPRA
if (isset($_POST['frutas']) && $_POST['cantidad'] && $_POST['boton']=='Anotar') {
    //almacenamos en la sesión el array de frutas y cantidades
    $_SESSION['frutas']=$_POST['frutas'];
    $_SESSION['cantidad']=$_POST['cantidad'];

    //almacenamos en un array el nombre de la fruta y la cantidad
    $frutas = array($_SESSION['frutas'] => $_SESSION['cantidad']);
    //si la fruta ya está en el array, se suma la cantidad
    if (array_key_exists($_SESSION['frutas'], $frutas)) {
        $frutas[$_SESSION['frutas']] += $_SESSION['cantidad'];
    }
    //volvemos a la página de realizar la compra
    include 'realizarCompra.php';
} else if (isset($_POST['boton']) && $_POST['boton']=='Terminar') {
    include 'terminar.php';
}

