<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados</title>
    <style>

        h1 {
            text-align: center;
        }
        table,td,tr {
            border: 1px solid;
            border-collapse: collapse;
            text-align: center;
        }
        table {
            width: 50%;
            height: 10rem;
            margin-left: auto;
            margin-right: auto;
        }
        td {
            width: 10rem;
        }
        .footer {
            text-align: center;
            font-size: xx-large;
        }
        span {
            width: 3rem;
        }

    </style>
</head>
<body>
<h1>Juego de los cinco dados</h1>
<table>
    <tr>

    <?php
    include 'dados.php';

    $jugador1 = generarCindoDados();
    $jugador2 = generarCindoDados();

    $sumaJugador1 = sumaDeJugador($jugador1);
    $sumaJugador2 = sumaDeJugador($jugador2);

    $icon1=generarIconos($jugador1);
    $icon2=generarIconos($jugador2);

    echo '<td>'."Jugador 1 ".'</td>';

        foreach ($icon1 as $icon) {
            ?>

                <td><span><?php echo $icon; ?></span></td>
    <?php

        }
    echo '<td>'.$sumaJugador1." puntos".'</td>';
    ?>
    </tr>

    <tr>
    <?php
    echo '<td>'."Jugador 2 ".'</td>';

    foreach ($icon2 as $icon) {
            ?>

                <td><span><?php echo $icon; ?></span></td>

    <?php
        }
    echo '<td>'.$sumaJugador2." puntos".'</td>';

    echo '<br>';
    ?>
    </tr>

</table>
<br>
<br>
<div class="footer"><?php echo resultadoGanador($sumaJugador1,$sumaJugador2); ?></div>

</body>
</html>



