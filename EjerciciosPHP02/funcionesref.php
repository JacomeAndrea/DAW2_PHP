<?php

$min=1;
$max=10;
$num1=rand($min,$max);
$num2=rand($min,$max);
$num3=rand($min,$max);

function suma ($num1,$num2,&$num3) {
    $suma=$num1+$num2+$num3;
    return $suma;
}

function resta ($num1,$num2,&$num3) {
    $resta=$num1-$num2-$num3;
    return $resta;
}

function multiplicacion ($num1,$num2,&$num3) {
    $multiplicacion=$num1*$num2*$num3;
    return $multiplicacion;
}

function division ($num1,$num2,&$num3) {
    $division=$num1/$num2/$num3;
    return $division;
}

function modulo ($num1,$num2,&$num3) {
    $modulo=$num1%$num2%$num3;
    return $modulo;
}

function potencia ($num1,$num2,&$num3) {
    $potencia=$num1**$num2**$num3;
    return $potencia;
}

echo " Número 1: ".$num1."<br>";
echo " Número 2: ".$num2."<br>";
echo " Número 3: ".$num3."<br>";
echo "<br>"."<br>";

echo " Suma: ".$num1." + ".$num2. " + ". $num3." = ".suma($num1,$num2,$num3)."<br>";
echo " Resta ".$num1." - ".$num2. " - ". $num3." = ".resta($num1,$num2,$num3)."<br>";
echo " Multiplicación ".$num1." x ".$num2. " x ". $num3." = ".multiplicacion($num1,$num2,$num3)."<br>";
echo " División".$num1." / ".$num2. " / ". $num3." = ".division($num1,$num2,$num3)."<br>";
echo " Módulo ".$num1." % ".$num2. " % ". $num3." = ".modulo($num1,$num2,$num3)."<br>";
echo " Potencia ".$num1." ** ".$num2. " ** ". $num3." = ".potencia($num1,$num2,$num3)."<br>";


?>
