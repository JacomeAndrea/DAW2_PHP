<?php

$min = 1;
$max = 10;
$contador = 0;
$generador = 0;
do {
    $random = rand($min, $max);
    if ($random === 6) {
        $contador++;
        if ($contador === 3) {
            $generador++;
            echo "Han salido tres 6 seguidos tras generar " . $generador . " números en ".microtime(true)." milisegundos";
            break;
        }
    } else {
        $contador = 0;
    }

    $generador++;
} while (TRUE);


?>
