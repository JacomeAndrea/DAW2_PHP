<?php

$arrayDados = array(1 =>'#9856', 2=>'#985', 3=>'#9858', 4=>'#9859', 5=>'#9860', 6=>'9861');

function elegirDadosRandom(): int
{ //elige un dado random
    return rand(1,6);
}

function generarCindoDados ($arrayDados): array
{ //selecciona 5 dados
    for ($i=0; $i<5; $i++) {
        $resu [$i]=$arrayDados[elegirDadosRandom()];
    }
    return array($resu);
}

function sumaDeJugador1 ($jugador1) { //Suma (menos el max y el min)
    $sum = array_sum($jugador1);
    return $sum-((max(array ($jugador1))))-((min(array ($jugador1)))); //restamos al total el max y min
}

function sumaDeJugador2 ($jugador2) { //Suma (menos el max y el min)
    $sum = array_sum($jugador2);
    return $sum-((max(array ($jugador2))))-((min(array ($jugador2)))); //restamos al total el max y min
}

function resultadoGanador ($jugador1, $jugador2): string
{
    if (sumaDeJugador1($jugador1)==sumaDeJugador2($jugador2)) {
        return "¡Empate!";
    } else if (sumaDeJugador1($jugador1)>sumaDeJugador2($jugador2)) {
        return "¡Gana el jugador1 con ".sumaDeJugador1($jugador1)." puntos!";
    } else if (sumaDeJugador1($jugador1)<sumaDeJugador2($jugador2)) {
        return "¡Gana el jugador2 con " . sumaDeJugador2($jugador2) . " puntos!";
    }
    return "Lo sentimos, ha habido un error... Inténtelo de nuevo";
}

