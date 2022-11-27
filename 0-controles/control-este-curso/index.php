<?php
session_start();

if (!isset($_SESSION['fallos'])) {
    $_SESSION['fallos'] = 0;
}
include_once('app/funciones.php');

if ($_SESSION['fallos'] >= 5) {
    include_once 'app/accesobloqueado.php';
    die();
}

if (  !empty( $_GET['login']) && !empty($_GET['clave'])){
    if ( userOk($_GET['login'],$_GET['clave'])){ //si es correcto, se crea la sesión
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['rol'] = getUserRol($_GET['login']);
        if ($_SESSION['fallos']>0) { //se resetea a 0 cuando accedes a tu cuenta
            $_SESSION['fallos']=0;
        }
      if ( getUserRol($_GET['login']) == ROL_PROFESOR){ //si es profesor, se redirige a la página de notas de todos los alumnos
        $contenido = verNotaTodas($_GET['login']);
      } else { //si es alumno se redirige a la página de notas del alumno
        $contenido = verNotasAlumno($_GET['login']);
      }
      include_once ('app/resultado.php');
    }
    // userOK no es correcto
    else {
       $contenido = "El número de usuario y la contraseña no son válidos";
        $_SESSION['fallos']++;
       include_once('app/acceso.php');

    }
} else {
    $contenido = " Introduzca su número de usuario y su contraseña";
    include_once('app/acceso.php');
}



