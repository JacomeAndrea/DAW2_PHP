<?php
session_start();
define ('FPAG',10); // Número de filas por página


require_once 'app/helpers/util.php';
require_once 'app/config/configDB.php';
require_once 'app/models/Cliente.php';
require_once 'app/models/AccesoDatos.php';
require_once 'app/controllers/crudclientes.php';



//---- PAGINACIÓN ----
$midb = AccesoDatos::getModelo();
$totalfilas = $midb->numClientes();
if ( $totalfilas % FPAG == 0){
    $posfin = $totalfilas - FPAG;
} else {
    $posfin = $totalfilas - $totalfilas % FPAG;
}

if ( !isset($_SESSION['posini']) ){
  $_SESSION['posini'] = 0;
}
$posAux = $_SESSION['posini'];
//------------

//SESION

if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}


if ($_SESSION['login'] == true) {

    ob_start(); // La salida se guarda en el bufer
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        // Proceso las ordenes de navegación
        if (isset($_GET['nav'])) {
            switch ($_GET['nav']) {
                case "Primero"  :
                    $posAux = 0;
                    break;
                case "Siguiente":
                    $posAux += FPAG;
                    if ($posAux > $posfin) $posAux = $posfin;
                    break;
                case "Anterior" :
                    $posAux -= FPAG;
                    if ($posAux < 0) $posAux = 0;
                    break;
                case "Ultimo"   :
                    $posAux = $posfin;
            }
            $_SESSION['posini'] = $posAux;
        }


        // Proceso las ordenes de navegación en detalles
        if (isset($_GET['nav-detalles']) && isset($_GET['id'])) {
            switch ($_GET['nav-detalles']) {
                case "Siguiente":
                    crudDetallesSiguiente($_GET['id']);
                    break;
                case "Anterior" :
                    crudDetallesAnterior($_GET['id']);
                    break;
                case "Descargar":
                    crudDescargar($_GET['id']);
                    break;
            }
        }

        // Proceso de ordenes de CRUD clientes
        if (isset($_GET['orden'])) {
            switch ($_GET['orden']) {
                case "Nuevo"    :
                    crudAlta();
                    break;
                case "Borrar"   :
                    crudBorrar($_GET['id']);
                    break;
                case "Modificar":
                    crudModificar($_GET['id']);
                    break;
                case "Detalles" :
                    crudDetalles($_GET['id']);
                    break;
                case "Terminar" :
                    crudTerminar();
                    break;
            }
        }
    } // POST Formulario de alta o de modificación
    else {
        if (isset($_POST['orden'])) {
            switch ($_POST['orden']) {
                case "Nuevo"    :
                    crudPostAlta();
                    break;
                case "Modificar":
                    crudPostModificar();
                    break;
                case "Detalles":
                    ; // No hago nada
                case "Siguiente":
                    crudModificarSiguiente($_POST['id']);
                    break;
                case "Anterior":
                    crudModificarAnterior($_POST['id']);
                    break;
                case "Subir imagen":
                    crudSubirFoto($_POST['id']);
                    break;
            }
        }
    }

// Si no hay nada en la buffer 
// Cargo genero la vista con la lista por defecto
    if (ob_get_length() == 0) {
        $db = AccesoDatos::getModelo();
        $posini = $_SESSION['posini'];
        $tvalores = $db->getClientes($posini, FPAG);
        require_once "app/views/list.php";
    }
} else {
    include_once 'app/views/login.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       if (logIn(limpiarEntrada($_POST['user']), limpiarEntrada($_POST['password']))) {
           $_SESSION['login'] = true;
           header("Location: index.php");
       } else {
           $_SESSION['intentos']++;
       }
    }
}



$contenido = ob_get_clean();

// Muestro la página principal con el contenido generado
require_once "app/views/principal.php";



