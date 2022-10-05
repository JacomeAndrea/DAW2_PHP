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
<br>
<hr>
<br>
<h1>Ejercicio 6</h1>
<br>
<?php
include '06-07.php';
// Forma antigua de definir Array en PHP
$paises = array(
    'Francia' => array("Capital" => "París", "Poblacion" => "50000000"),
    'España' => array("Capital" => "Madrid", "Poblacion" => "42000000"),
    'Italia' => array("Capital" => "Roma", "Poblacion" => "46000000"),
    'Argentina' => array("Capital" => "Buenos Aires", "Poblacion" => "40000000"),
    'Colombia' => array("Capital" => "Bogotá", "Poblacion" => "36000000"),
    'Chile' => array("Capital" => "Santiago", "Poblacion" => "36000000"),
    'Suecia' => array("Capital" => "Estocolmo", "Poblacion" => "25000000"),
);

// Forma moderna, mas compacta
$ciudades = [
    'Francia' => ["París","Burdeos","Niza","Lille","Nantes"],
    'España' => ["Madrid", "Barcelona","León","Sevilla", "Valencia", "Málaga"],
    'Italia' => ["Roma", "Venecia","Florencia","Pisa", "Génova", "Milán", "Turín", "Nápoles"],
    'Argentina' => ["Buenos Aires", "Córdoba","Parana","Rosario"],
    'Colombia' => ["Bogotá", "Medellín","Cali","Barranquilla", "Bucaramanga"],
    'Chile' => ["Santiago", "Arica","Iquique","Osorno", "Viña del Mar"],
    'Suecia' => ["Estocolmo", "Upsala","Gotemburgo","Lund"],
];

paisConMasPoblacion($paises);
?>
<br>
<h2>Versión 2</h2>
<p>Ordenamos array de paises</p>
<br>
<?php
echo "El pais con mayor población es ".paisConMasPoblacion($paises);
echo " con ",obtenerNumeroHabitantes($paises)." habitantes.";
//ordenamos con la funcion uasort accediendo al método que compara las poblaciones de dos arrays
uasort($paises,'ordenaPaisPorPoblacion');?>
<br><br>
<p>Obtenemos ciudades: </p>

<table class="tablacCiudades">
    <tr>
        <?php
        echo obtenerCiudades($ciudades,$paises);
        ?>
    </tr>
</table>

<br>
<hr>
<br><br>
<h1>Ejercicio 7</h1>
<p>Elegimos dos países random y mostramos los datos</p>
<?php
echo mostrarDatos($paises,$ciudades);
?>
<br>
<hr>
<br>
<h1>Ejercicio 08</h1>
<br>
<p>Generamos tabla: </p>
<table class="tablaPaises">
    <tr>
        <th>País</th>
        <th>Capital</th>
        <th>Población</th>
        <th>Ciudades</th>
    </tr>
    <?php foreach ($paises as $clave => $valor) : ?>
    <tr>
        <td><?= $clave?></td>
        <td><?= $valor['Capital'] ?></td>
        <td><?= $valor['Poblacion']?></td>
        <td><?php foreach ($ciudades[$clave] as $ciudad) :?>
                <?= $ciudad . ", " ?>
            <?php endforeach; ?>
        </td>
        <?php endforeach; ?>
    </tr>
</table>
</body>
</html>
