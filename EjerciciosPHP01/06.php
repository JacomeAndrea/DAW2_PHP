<style>
h1 {
    color: white;
    background-color: #4444f8;
    text-align: center;
    margin: 30px;
    padding: 80px;
    font-size:50px;
    text-shadow: 1px  0 0 black,
    0  1px 0 black,
    -1px  0 0 black,
    0 -1px 0 black;
}
table {
    border-collapse: collapse;
    margin-left: 40px;
    width: 50%;
}
table, td, th {
    border: 1px solid;
}
.izq {
    text-align: left;
    padding: 20px;
}
.der {
    text-align: center;
}
</style>

<?php
$min=1;
$max=10;
$random=rand($min,$max);

echo "<h1>TABLA DE MULTIPLICAR</h1>";
echo "<br>";

    echo "<table>";
    echo "<tr>";
        echo "<th>".'Tabla del '.$random.'</th>';
    for ($x=1; $x <=10 ; $x++){
        echo "<tr>";
            echo "<td class='izq'>".$random.' x '.$x.' = '."</td>";
            echo "<td class='der'>".$random*$x."</td>";
        echo "</tr>";
    }
    echo '</tr>';
    echo "</table>";

?>