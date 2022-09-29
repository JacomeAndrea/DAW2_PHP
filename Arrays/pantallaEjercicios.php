<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizador de Ejercicios</title>

</head>
<body>
<h1>¡El juego de los Cinco dados!</h1>
<br>

<?php
include '01.php';

$jugador1 = array(generarCindoDados());

$jugador2 = array(generarCindoDados());

$sumaJugador1 = sumaDeJugador($jugador1);
$sumaJugador2 = sumaDeJugador($jugador2);


echo "<table>";
    echo "<tr>";
        echo "<th>" . "Actualice la página para mostrar una nueva tirada" . "</th>";
    echo "</tr>";
    echo "<tr>";
        foreach (generarIconos($sumaJugador1) as $icon) {
            echo '<td>' . $icon . '</td>';
        }
    echo "</tr>";
    echo "<tr>";
        foreach (generarIconos($sumaJugador2) as $icon) {
            echo '<td>' . $icon . '</td>';
        }
    echo "</tr>";
echo '</table>';

echo '<div class="footer">' . resultadoGanador($sumaJugador1, $sumaJugador2) . '</div>';
?>

</body>
</html>
