<?php

$conexion = new mysqli ("localhost", "root", "root", "CRUD_DB");

if ($conexion->connect_errno) {
    // Comprueba conexión
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}