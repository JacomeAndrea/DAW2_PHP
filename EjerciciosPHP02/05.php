<?php
function generarHTMLTable ( $filas, $columnas, $borde,$contenido){

    echo "<table>";
        echo "<tr>";

        for ($i=0; $i<$columnas; $i++) {
            echo "<th>".$contenido."</th>";
        }
        echo "</tr>";
        echo "<tr>";
        for ($i=0; $i<$filas; $i++) {
            echo "<td>".$contenido."</td>";
        }
        echo "</tr>";

    echo "</table>";
}

echo "Se va a crear una tabla HTML. "."<br>"."<br>";

$filas=readline(" Escribe el número de filas:");
echo "<br>";
$columnas=readline("Escribe el número de columnas");
echo "<br>";
$contenido=readline("Escribe un texto");
echo "<br>";
$borde = '1px solid';
echo "<style border-style: dotted>".$borde."</style>";

generarHTMLTable($filas, $contenido, $borde, $columnas);