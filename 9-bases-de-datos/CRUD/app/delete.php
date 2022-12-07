<?php
include "conexion.php";

//almacenamos en $id lo que nos llega por la URL
$id=$_REQUEST['Id'];

$consulta="DELETE FROM Clientes WHERE id=$id";


global $conexion;
mysqli_query($conexion, $consulta);


header("Location: ../index.php");
