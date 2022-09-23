<?php
$min = 1;
$max = 9;
$random = rand($min, $max);

function escaleraNumeros ($random) {
    for ($num2=1;$random>=$num2;$num2++) {
        for ($num3=1;$num3<=$num2;$num3++) {
            if ($num2%2==0) {
                echo '<span style="color:red">'.$num2.'</span>';

            } else {
                echo '<span style="color:blue">' . $num2 . '</span>';
            }
        }
        echo "<br>";

    }
}


echo "Número generado= " . $random . "<br>";

echo "ESCALERA DE NÚMEROS DE COLORES"."<br>";
echo "<br>"."Número aleatorio: ".$random."<br>";

escaleraNumeros($random);







