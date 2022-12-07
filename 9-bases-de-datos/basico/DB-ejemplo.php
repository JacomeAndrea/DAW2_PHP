<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos personales</title>
</head>
<body>

<form id="nombre-y-dni" action="DB-ejemplo.php" method="post">
    <label>Nombre: <input type="text" name="name" required></label>
    <label>DNI: <input type="number" name="dni" required></label>
    <br>
    <label><input type="submit" value="Enviar"></label>
</form>
</body>
</html>
<?php
//Variables
$server="localhost";
$user="root";
$password="root";
$conexion=mysqli_connect($server,$user,$password) or die("Error de conexión");

//CREACIÓN DE BBDD y TABLE 'ejemplo'
//Base de datos
function createDB () {
    global $conexion;

    $sql="CREATE DATABASE PHP_DB";

    if (mysqli_query($conexion,$sql)) {
        echo "BBDD creada: ".$sql;
    } else {
        echo "Error: ".mysqli_error($conexion);
    }
}

//Tabla
function createTable () {
    global $conexion;

    mysqli_select_db($conexion,"PHP_DB");
    $sql2="CREATE TABLE tabla1(nombre VARCHAR(20))";
    if (mysqli_query($conexion,$sql2)) {
        echo "Tabla creada: ".$sql2;
    }
}


//INSERCIÓN DE DATOS EN TABLA

//datos introducidos en el formulario
$name=$_POST['nombre'];
$dni=$_POST['dni'];


function insertarNombre ($name) {
    global $conexion;

    mysqli_select_db($conexion,"PHP_DB");
    $insert="INSERT tabla1 (Nombre) VALUES ('$name')";
    mysqli_query($conexion,$insert);
}

function insertarDNI ($dni) {
    global $conexion;

    mysqli_select_db($conexion,"PHP_DB");
    $insert="INSERT tabla1 (DNI) VALUES ('$dni')";
    mysqli_query($conexion,$insert);
}

//llamamos a las funciones
insertarNombre($name);


