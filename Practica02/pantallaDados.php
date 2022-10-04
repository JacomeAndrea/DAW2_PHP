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

    </style>
</head>
<body>
<h1>Juego de los cinco dados</h1>
<table>
    <tr>

    <?php
    include 'dados.php';
    $arrayDados = array(1 =>'#9856', 2=>'#985', 3=>'#9858', 4=>'#9859', 5=>'#9860', 6=>'9861');
    //Jugador 1
    $dadosJugador1 = generarCindoDados($arrayDados);
    $sumaJugador1 = sumaDeJugador1(generarCindoDados($arrayDados));
    //Jugador 2
    $dadosJugador2 = generarCindoDados($arrayDados);
    $sumaJugador2 = sumaDeJugador2(generarCindoDados($arrayDados));

    $ganador = resultadoGanador($sumaJugador1,$sumaJugador2);

    echo '<div class="jugador1">'."<h4>'Jugador 1'</h4>";
    foreach ($dadosJugador1 as $resu) { //impresión dados jugador 1
        echo '<span>'.$resu.'</span>';
    }
    echo "<h4>'Suma del Jugador 1: ".'</div>';

    echo '<div class="jugador2">'."<h4>'Jugador 2'</h4>";
    foreach ($dadosJugador2 as $resu) { //impresión dados jugador 2
        echo '<span>'.$resu.'</span>';
    }
    echo 'Suma jugador 2: '.$sumaJugador2;
    echo "<h4>'Suma del Jugador 2: ".'</div>';

    echo '
        <div class="footer">
        '.$ganador.'
        </div>';
    ?>
</body>
</html>



