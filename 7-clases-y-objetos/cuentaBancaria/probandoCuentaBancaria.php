<?php
include_once 'CuentaBancaria.php';
echo "<h2> PROBANDO </H2>";
$c1 = new CuentaBancaria(100);
$c2 = new CuentaBancaria(1900);
$c3 = new CuentaBancaria();
echo "abono de 20: ".$c1->abono(20);
echo "ingreso de 10:".$c1->ingreso(10);
echo "anoto gastos:".$c1->anotarGastos();
echo "<br> Cuenta c1 = " . $c1->consultarEstado();
$c2->ingreso(100);
$c2->anotarGastos();