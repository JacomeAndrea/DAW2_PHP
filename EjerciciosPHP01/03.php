<?php
$min = 1;
$max = 9;
$random = rand($min, $max);

function piramideAsteriscos($random) {
    for ($i = 0; $i <= $random; $i++) {
        for ($j=1;$j<=$random-$i;$j++) {
            echo" ";
        }
        for ($j=1; $j<=2*$i-1;$j++) {
            echo "*";
        }
        echo "<br>";

    }
}

echo "PIRAMIDE DE ASTERICOS"."<br>";
echo "<br>"."Número aleatorio: ".$random."<br>";
echo "<br>";
echo "<style fontFamily='monospace' > " . piramideAsteriscos($random) ."</style>";
