<style>
    img {
        width: 1px;
        height: 20px;
    }
    .contenedor {
        display: flex;
        flex-direction: column;
    }
    .blue, .green, .red {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

</style>

<?php

$min = 100;
$max = 500;
$random1 = rand($min, $max);
$random2 = rand($min, $max);
$random3 = rand($min, $max);


echo "Número 1: " . $random1."<br>";
echo "Número 2: " . $random2."<br>";
echo "Número 3: " . $random3."<br>";
echo "<br>";
echo "<div class='contenedor'>";
    for ($i=0; $i <=$random1 ; $i++) {
        echo "<div class='red'>". "<img src='red.png' alt='red'" ."</div>";
    }
    echo $random1."<br>";

    for ($i=0; $i <=$random2 ; $i++) {
        echo "<div class='green'>". "<img src='green.png' alt='green'" ."</div>";
    }
    echo $random2."<br>";
    for ($i=0; $i <=$random3 ; $i++) {
        echo "<div class='blue'>". "<img src='blue.png' alt='blue'" ."</div>";
    }
    echo $random3."<br>";
echo "</div>";
