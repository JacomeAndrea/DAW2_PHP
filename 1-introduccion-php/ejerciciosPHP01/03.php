<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>
<h1>Ejercicio 3</h1>
<code>
<?php
$min = 1;
$max = 9;
$random = rand($min, $max);

    function piramideAsteriscos($random) {
    for ($i = 0; $i <= $random; $i++) {
        for ($j=1;$j<=$random-$i;$j++) {
            echo"&nbsp";
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
echo piramideAsteriscos($random);
?>


</code>

</body>
</html>

