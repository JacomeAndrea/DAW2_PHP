<style>
    table {
        border-collapse: collapse;
        margin-left: 40px;
        width: 50%;
    }
    table, td, th {
        border: 1px solid;
    }
    th {
        background-color: black;
        color: white;
    }
    .izq {
        text-align: left;
    }
    .der {
        text-align: center;
    }

</style>

<?php
//dos formas de declarar constantes:
define('MINRANDOM','1');
const MAXRANDOM = 100;
$media = 0;
$max = 0;
$min =100;

for ($i = 1; $i <= 50; $i++) {
    $num = rand(MINRANDOM, MAXRANDOM);
    $media += $num;
    if ($num > $max) {
        $max = $num;
    } else if ($num < $min) {
        $min = $num;
    }
}
$media/=50;

echo "<table>";
    echo "<tr>";
        echo "<th>Generación de 50 valores aleatorios</th>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='izq'>" . "Máximo" . "</td> = ";
        echo "<td class='der'>" . $max . "</td> = ";
    echo "</tr>";
        echo "<td class='izq'>" . "Mínimo" . "</td> = ";
        echo "<td class='der'>" . $min . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td class='izq'>" . "Media" . "</td> = ";
        echo "<td class='der'>" . $media . "</td>";
    echo "</tr>";
echo "</table>";


?>
