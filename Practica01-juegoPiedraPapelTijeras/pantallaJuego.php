<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Piedra, papel, tijeras</title>
    <style>
        h1 {
            font-size: 50px;
            background-color: #b2b2b2;
            border: 2px solid gray;
            padding: 20px;
            border-radius: 25px;
            color: white;
        }
        h3 {
            background-color: #d2d2d2;
            padding: 10px;
        }
        .juego {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;

        }
        .jugadores{
            display: flex;
            flex-wrap: wrap;
            padding: 40px;
            border: solid black;
        }
        .emoji {
            font-size: 100px;
        }
        .encabezado {
            background-color: black;
            color: white;
            font-weight: bold;
            padding: 10px;
        }
        .jugador{
            text-align: center;
            font-size: 20px;
        }
        .resultado {
            margin: 50px;
            font-weight: bold;
            font-size: 30px;
        }
    </style>
</head>
<body>

<br>
<?php
include 'juego.php';
$jugador1 = generarJugada();
$jugador2 = generarJugada();
echo '
<div class="juego">
<h1>¡Piedra, papel, tijeras!</h1>
<h3>Actualice la página para mostrar otra partida</h3>
    <div class="jugadores">
        <div class="jugador">
            <p class="encabezado">Jugador 1</p>
            <p class="emoji">' . convertir_emoji($jugador1) . ' </p>
        </div>
        <div class="jugador">
            <p class="encabezado">Jugador 2</p>
            <p class="emoji">' . convertir_emoji($jugador2) . ' </p>
        </div>
    </div>
    <div class="resultado"> ' . calcularGanador($jugador1, $jugador2) . '</div>
</div>
'
?>

</body>
</html>
