<?php

include_once 'app/funciones.php';
include_once 'app/acciones.php';


// Div con contenido
$contenido="";
if ($_SERVER['REQUEST_METHOD'] == "GET" ){

    if ($_GET['pin'] == "12345"){
        session_start();
        include_once "app/layout/principal.php";
    }
    //si la sesion lleva 5 minutos la cerramos
    if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 300)) {
        session_destroy();
        header("Refresh:0 url='app/layout/pin.php'");
    }

    
    if ( isset($_GET['orden'])){
        switch ($_GET['orden']) {
            case "Nuevo"    : accionAlta(); break;
            case "Borrar"   : accionBorrar   ($_GET['id']); break;
            case "Modificar": accionModificar($_GET['id']); break;
            case "Detalles" : accionDetalles ($_GET['id']);break;
            case "Terminar" : accionTerminar(); break;
            case "Incrementar saldo" : accionIncrementarSaldo($_GET['checkAll']); break;
            case "Actualizar" : accionBloqueo($_GET['checkAll']); break;
        }
    }



} 
// POST Formulario de alta o de modificación
else {
    if (  isset($_POST['orden'])){
         switch($_POST['orden']) {
             case "Nuevo"    : accionPostAlta(); break;
             case "Modificar": accionPostModificar(); break;
             case "Detalles":; // No hago nada
         }
    }
}
$contenido .= mostrarDatos();
// Muestro la página principal
include_once "app/layout/principal.php";




