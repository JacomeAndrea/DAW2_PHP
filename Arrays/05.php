<?php
$arrayBonoloto = array();

function rellenoArrayConValores ($arrayBonoloto) { //del 1 al 49
    $array = [];
    for ($i = 1; $i <= 49; $i ++) {
        $array[] = $i;
    }
    return$array;
}
print_r(rellenoArrayConValores($arrayBonoloto));


$indices = array_rand($arrayBonoloto, 6);
print_r($indices);

