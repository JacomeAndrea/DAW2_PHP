<?php


//una vez procesada la operación en minibancopro.php
//$msg = " Operación realizada.";
//header("Location: minibanco.php?msg=".urlencode($msg));


session_start();
if (isset($_POST['importe'])) { //si se envia el formulario por POST
    //almacenamos en la sesión el importe
    $_SESSION['importe']=$_POST['importe'];
    $orden=$_POST['Orden'];
    ordenEscogida($orden);
} else { //volvemos a la página de inicio
    header("Location: minibanco.php");
}


function ordenEscogida ($orden) {
    switch ($orden) {
        case $orden == "Ingreso":
            realizarIngreso($_SESSION['importe']);
            break;
        case $orden == "Reintegro":
            realizarReintegro($_SESSION['importe']);
            break;
        case $orden == "Ver saldo":
            verSaldo();
            break;
        case $orden == "Terminar":
            terminar();
    }
}

function realizarIngreso ($importe) {
    if ($_SESSION['importe']>0) {
        $_SESSION['saldo'] += $_SESSION['importe'];
        $msg = " Operación realizada. Saldo actual: ".$_SESSION['saldo']."€";
        header("Location: minibanco.php?msg=".urlencode($msg));
    } else {
        $msg = " El importe debe ser mayor que 0.";
        header("Location: minibanco.php?msg=".urlencode($msg));
    }
    return $msg;
}

function realizarReintegro ($importe) {
    if ($_SESSION['importe']>0) {
        if ($_SESSION['importe']<=$_SESSION['saldo']) {
            $_SESSION['saldo'] -= $_SESSION['importe'];
            $msg = " Operación realizada. Saldo actual: ".$_SESSION['saldo']."€";
            header("Location: minibanco.php?msg=".urlencode($msg));
        } else {
            $msg = " El importe debe ser menor que el saldo actual.";
            header("Location: minibanco.php?msg=".urlencode($msg));
        }
    } else {
        $msg = " El importe debe ser positivo.";
        header("Location: minibanco.php?msg=".urlencode($msg));
    }
    return $msg;
}

function verSaldo () {
    $msg = " Saldo actual: ".$_SESSION['saldo']."€";
    header("Location: minibanco.php?msg=".urlencode($msg));
    return $msg;
}

function terminar () {
    $msg = " Operación terminada.";
    session_destroy();
    header("Location: minibanco.php?msg=".urlencode($msg));
    return $msg;
}