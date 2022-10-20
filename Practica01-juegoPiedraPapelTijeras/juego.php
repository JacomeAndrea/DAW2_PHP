<?php
function generarJugada() {
    return rand(1,3);
}

const PIEDRA=1;
const PAPEL=2;
const TIJERAS= 3;


function calcularGanador ($jugador1, $jugador2) {
    if ($jugador1===$jugador2) {
        return "¡Empate!";
    }
    if ($jugador1===PIEDRA && $jugador2===PAPEL) {
        return "¡Gana el jugador 2!";
    }
    if ($jugador1===PAPEL && $jugador2===PIEDRA) {
        return "¡Gana el jugador 1!";
    }
    if ($jugador1===PIEDRA && $jugador2===TIJERAS) {
        return "¡Gana el jugador 1!";
    }
    if ($jugador1===TIJERAS && $jugador2===PIEDRA) {
        return "¡Gana el jugador 2!";
    }
    if ($jugador1===PAPEL && $jugador2===TIJERAS) {
        return "¡Gana el jugador 2!";
    }
    if ($jugador1===TIJERAS && $jugador2=PAPEL) {
        return "¡Gana el jugador 1!";
    }
    return "Lo sentimos, ha habido un error... Inténtelo de nuevo";
}

function convertir_emoji($option)
{
    switch ($option) {
        case PIEDRA:
            return "🪨";
        case PAPEL:
            return "📃";
        case TIJERAS:
            return "✂️";
        default:
            return "Lo sentimos, ha habido un error... Inténtelo de nuevo";
    }
}
