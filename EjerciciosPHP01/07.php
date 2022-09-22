
<?php
/*Elegir tres valores entre 100 y 500 y pintar tres barras de color rojo, verde y azul del tamaño indicado.

Pista: Utilizar 3 tablas con una fila del tamaño generado.
 * */



$min = 100;
$max = 500;
$random1 = rand($min, $max);
$random2 = rand($min, $max);
$random3 = rand($min, $max);


echo "Número 1: " . $random1."<br>";
echo "Número 2: " . $random2."<br>";
echo "Número 3: " . $random3."<br>";

echo "<table>";
echo "<tr>";
echo "</th>";


    echo "<tr>";
    for ($width1=0; $width1 <=$random1 ; $width1++) {
        echo "<td class='uno'>".$random1."</td>";
    }

    for ($width2=0; $width2 <=$random2 ; $width2++) {
    echo "<td class='dos'>".$random2."</td>";
    }

    for ($width3=0; $width3 <=$random3 ; $width3++) {
    echo "<td class='tres'>".$random3."</td>";
    }

echo '</tr>';
echo "</table>";

?>
