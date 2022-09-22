<?php
$min = 1;
$max = 9;
$random = rand($min, $max);

function piramideAsteriscos($random)
{
$asterico = null;
for ($i = 1; $i <= $random; $i++) {
for ($x = $i; $x <= $i; $x++) {
}
echo $asterico .= "*";
echo "<br/>";
}
}

echo "PIRAMIDE DE ASTERICOS"."<br>";
echo "<br>"."Número aleatorio: ".$random."<br>";
echo "<br>"."<code>";
piramideAsteriscos($random);
echo "</code>";

?>