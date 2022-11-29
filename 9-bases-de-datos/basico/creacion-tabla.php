<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación tabla mysql</title>
</head>
<body>
<?php
$server="localhost";
$user="root";
$password="root";
$conexion=mysqli_connect($server,$user,$password);

if (!$conexion) {
    echo "La conexión ha fallado";
} else {
    $sql="CREATE DATABASE usuarios";
    if (mysqli_query($conexion,$sql)) {
        echo "BBDD creada: ".$sql;
    } else {
        echo "Error: ".mysqli_error($conexion);
    }

    mysqli_select_db($conexion,"usuarios");
    $sql2="CREATE TABLE clientes(nombre VARCHAR(20))";
    if (mysqli_query($conexion,$sql2)) {
        echo "Tabla creada: ".$sql2;
    }
}
?>
</body>
</html>
