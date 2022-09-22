<?php

/*
 * 1.- Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma,
 * su resta, su división, su multiplicación, módulo y potencia (ciclo for)
 */
$min=1;
$max=10;
$random1=rand($min,$max);
$random2=rand($min,$max);

echo "Número 1: ".$random1;
echo "Número 2: ".$random2;

function operacionesBasicas ($random1, $random2) {
    $suma=$random1+$random2;
    $resta=$random1-$random2;
    $multiplicacion=$random1*$random2;
    $division=$random1/$random2;
    $elevado=$random1**$random2;

    echo $random1." + ".$random2." = ".$suma."<br>";
    echo $random1." - ".$random2." = ".$resta."<br>";
    echo $random1." x ".$random2." = ".$multiplicacion."<br>";
    echo $random1." / ".$random2." = ".$division."<br>";
    echo $random1." ** ".$random2." = ".$elevado."<br>";
}

operacionesBasicas($random1, $random2);





?>
