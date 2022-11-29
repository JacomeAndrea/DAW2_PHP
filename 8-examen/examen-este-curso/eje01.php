<?php
$nombres = ["Juan","Pedro","María","Elena","Luis"];

$notas = [7.5, 6.0, 7.8, 9.5, 3.5 ];

// Une los array en uno nuevo
$calificaciones = unir ($nombres, $notas);

// Creo un nuevo array

$datos = separar($calificaciones);

echo "<code><pre>";

echo "Arrar de calificaciones y notas unidas:"."<br>";
print_r($calificaciones);
echo "Array de datos separados: "."<br>";
print_r($datos);

echo "</pre></code>";

//FUNCIONES
function unir ($nombres, $notas){
    $calificaciones = [];
    foreach ($nombres as $key => $nombre) {
        $calificaciones[$nombre] = $notas[$key];
    }
    return $calificaciones;
}

function separar($calificaciones){
    $datos = [];
    foreach ($calificaciones as $nombre => $nota) {
        $datos["nombres"][] = $nombre;
        $datos["notas"][] = $nota;
    }
    return $datos;
}
