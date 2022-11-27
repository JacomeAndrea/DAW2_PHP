<?php

function elegirDadosRandom(): int
{ //elige un dado random
    return rand(1,6);
}

function generarCindoDados (): array
{ //selecciona 5 dados
    $arrayDados = array();
    for ($i=0; $i<5; $i++) {
        $arrayDados [$i]=elegirDadosRandom();
    }
    return $arrayDados;
}


function sumaDeJugador ($jugador) { //Suma (menos el max y el min)
    $sum = array_sum($jugador);
    $min=min($jugador);
    $max=max($jugador);
    return $sum-($max+$min); //restamos al total el max y min porque así lo pide el ejercicio
}


function resultadoGanador ($sumaJugador1, $sumaJugador2): string
{
    if ($sumaJugador1===$sumaJugador2) {
        return "¡Empate!";
    } else if ($sumaJugador1>$sumaJugador2) {
        return "¡Gana el jugador 1 con ".$sumaJugador1." puntos!";
    } else if ($sumaJugador1<$sumaJugador2) {
        return "¡Gana el jugador 2 con " . $sumaJugador2 . " puntos!";
    }
    return "Lo sentimos, ha habido un error... Inténtelo de nuevo";
}
function generarIconos($tiradas): array
{
    $arrayIconos = array(1 =>'&#9856', 2=>'&#9857', 3=>'&#9858', 4=>'&#9859', 5=>'&#9860', 6=>'&#9861');
    $iconos = array();
    $size=sizeof($tiradas);
    for ($i=0; $i<$size;$i++){
        $iconos[$i]=$arrayIconos[$tiradas[$i]];
    }
    return $iconos;
}



