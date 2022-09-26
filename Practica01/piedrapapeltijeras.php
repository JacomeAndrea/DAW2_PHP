<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Piedra, papel o tijeras</title>
    <style>
        /*CSS*/
    </style>
</head>
<body>
    <h1>¡Piedra, papel, tijeras!</h1>
    <h3>Actualice la página para mostrar otra partida</h3>
    <br>
    <table class="tabla">
        <tr>
            <th>Jugador 1</th>
            <th>Jugador 2</th></tr>
        <tr>
            <td><?php
                $min=1;
                $max=3;
                $random1=rand($min,$max);
                $random2=rand($min,$max);
                echo convertidorConstaImg($random1,$random2) ?></td>
            <td><?php echo convertidorConstaImg($random1,$random2) ?></td>
        </tr>
    </table>
    <h3><?php jugada($random1,$random2); ?></h3>

    <?php show_source(__FILE__); ?>
    <hr>
</body>
</html>

<?php

const PIEDRA1 = "&#x1F91C;";
const PIEDRA2 = "&#x1F91B;";
const TIJERAS = "&#x1F596;";
const PAPEL = "&#x1F91A;";

function jugador1($random1): string
{
    if ($random1===1) {
        return PIEDRA1;
    } else if ($random1===2) {
        return TIJERAS;
    } else {
        return PAPEL;
    }
}


function jugador2($random2) : string
{
    if ($random2===1) {
        return PIEDRA2;
    } else if ($random2===2) {
        return TIJERAS;
    } else {
        return PAPEL;
    }
}


function convertidorConstaImg ($random1, $random2): string
{
    if ($random1===PIEDRA1) {
        return PIEDRA1;
    } elseif ($random2===PIEDRA2) {
        return PIEDRA2;
    } elseif ($random1===PAPEL || $random2===PAPEL) {
        return PAPEL;
    } else {
        return TIJERAS;
    }
}


function jugada($random1,$random2): string
{
    if (jugador2($random2)===PIEDRA2) {
        if (jugador1($random1)===PIEDRA1) {
            return empate();
        } elseif (jugador1($random1)===PAPEL) {
            return ganador1();
        } else {
            return ganador2();
        }
    } elseif (jugador2($random2)===PAPEL) {
        if (jugador1($random1)===PIEDRA1) {
            return ganador2();
        } elseif (jugador1($random1)===PAPEL) {
            return empate();
        } else {
            return ganador1();
        }
    }
    elseif (jugador2($random2)===TIJERAS) {
        if (jugador1($random1)===PIEDRA1) {
            return ganador1();
        } elseif (jugador1($random1)===PAPEL) {
            return ganador2();
        } else {
            return empate();
        }
    }
    return error();
}

function error() : string
{
    return "¡Vaya! Aldo ha salido mal";
}
function empate (): string
{
    return "¡Habéis empatado!";
}
function ganador1(): string
{
    return "¡Ha ganado el jugador 1!";
}
function ganador2(): string
{
    return "¡Ha ganado el jugador 2!";
}

?>

