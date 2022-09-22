<?php

$min=1;
$max=10;
$num1=rand($min,$max);
$num2=rand($min,$max);

function suma ($num1,$num2) {
    $suma=$num1+$num2;
    return $suma;
}

function resta ($num1,$num2) {
    $resta=$num1-$num2;
    return $resta;
}

function multiplicacion ($num1,$num2) {
    $multiplicacion=$num1*$num2;
    return $multiplicacion;
}

function division ($num1,$num2) {
    $division=$num1/$num2;
    return $division;
}

function modulo ($num1,$num2) {
    $modulo=$num1%$num2;
    return $modulo;
}

function potencia ($num1,$num2) {
    $potencia=$num1**$num2;
    return $potencia;
}


echo "Número 1: ".$num1."<br>";
echo "Número 2: ".$num2;
echo "<br>"."<br>";
echo " Suma:".$num1." + " .$num2." = ".suma($num1, $num2)."<br>";
echo " Resta:".$num1." - " .$num2." = ".resta($num1, $num2)."<br>";
echo " Multiplicación:".$num1." x " .$num2." = ".multiplicacion($num1, $num2)."<br>";
echo " División:".$num1." / " .$num2." = ".division($num1, $num2)."<br>";
echo " División:".$num1." % " .$num2." = ".modulo($num1, $num2)."<br>";
echo " Potencia:".$num1." ** " .$num2." = ".potencia($num1, $num2)."<br>";
echo "<br>"."<br>";
echo "Fin del programa."



?>