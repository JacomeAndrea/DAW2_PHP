<?php
function generaRandom (): int
{
    return rand(1, 10);
}
$size=20;
function generarArrayRandomSize20 ($size): array
{
    $array= array ();
    for ($i=0; $i<=$size; $i++) {
        $array [$i] = generaRandom();
    }
    return $array;
}

function valorRepetido ($array) {
    // tabla: valores como clave y frecuencias como valor
    $valoresFrecuencia= array_count_values($array);
    // Devuelve la clave/posicion de valor con mayor frecuencia
    $moda = array_search(max($valoresFrecuencia), $valoresFrecuencia);
    return $moda;
}



