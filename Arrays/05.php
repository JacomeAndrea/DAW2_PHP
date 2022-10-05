<?php

function rellenoArrayConValores () {
    $arrayBonoloto = [];
    for ($i = 0; $i < 6; $i ++) {
        $random =rand(1,49);
        $arrayBonoloto[$i]=$random;
    }
    return $arrayBonoloto;
}

function quitarValoresRepetidos ($arrayBonoloto): array
{
    return array_unique($arrayBonoloto);
}



