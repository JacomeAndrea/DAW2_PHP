<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizador de Ejercicios de Arrays</title>
    <style>
        .arrayBonoloto, .Deportes, td, tr {
            border-collapse: collapse;
            border: 0.1rem solid;
            padding: 0.2rem;
        }
    </style>
</head>
<body>
<hr>
<h1>Ejercicio 1</h1>
<br>
<?php
include '01.php';
print_r($array20 = generarArrayRandomSize20(20));
echo '<br><br>'."Valor repetido: ".valorRepetido($array20);
?>
<hr>
<br>
<br>
<h1>Ejercicio 2</h1>
<br>
<?php
$periodicos = [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es", "El Diario" => "https://www.eldiario.es/", "La Razon" => "https://www.larazon.es/", "El Español" => "https://www.elespanol.com/"];
?>
<ul>
    <?php
    foreach ($periodicos as $clave => $valor) {
        echo "<li> <a href=\"$valor\">$clave</a></li>";
    }
    ?>
</ul>
<br>
<hr>
<br>
<h1>Ejercicio 3</h1>
<br>
<?php
//clave aleatoria
$aleatorio = array_rand($periodicos);
?>
<p>El periódico recomendado es: </p> <?php echo '<a href="\"'.$periodicos[$aleatorio].'"\">'.$aleatorio.'</a></p>';?>
<br>
<hr>
<br>
<h1>Ejercicio 4</h1>
<br>
<?php
$arrayFotos = ["Badminton" => "img/badminton.jpg", "Baloncesto" => "img/baloncesto.jpg", "Baseball" => "img/baseball.jpg", "Golf" => "img/golf.png", "Tenis" => "img/tenis.jpg"];
?>
<table class="Deportes">
    <?php
    foreach ($arrayFotos as $nombre => $foto) {
        echo "<tr>";
        echo "<td>".$nombre."</td>";
        echo '<td><img src="img/'.$foto.' alt=".$nombre."></img></td>';
        echo "</tr>";
    }
    ?>

</table>
<br>
<hr>
<br>
<h1>Ejercicio 5</h1>
<br>
<?php
include '05.php';
echo "Generamos array ordenado: ".'<br>';
$arrayBonoloto=quitarValoresRepetidos(rellenoArrayConValores());
asort($arrayBonoloto);
print_r($arrayBonoloto);
?>
<br>
<br>
<br>
<p>Quitamos valores repetidos: </p>
<br>
<?php
$arrayBonoloto=quitarValoresRepetidos($arrayBonoloto);

?>
<table class="arrayBonoloto">
<tr>
    <?php

    foreach ($arrayBonoloto as $claveBonoloto => $valorBonoloto) {

        if ($valorBonoloto==max($arrayBonoloto)) {
            echo '<td><p>',$valorBonoloto.'Complementario</p></td>';
        } else {
            echo '<td>',$valorBonoloto.'</td>';
        }
    }
    ?>
</tr>
</table>



</body>
</html>
