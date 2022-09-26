
<style>
    .titulo {
        margin: 50px;
        padding: 50px;
        background-color: #4444f8;
        text-align: center;
        color: white;
    }
    table {
        border-collapse: collapse;
        margin-left: 40px;
        width: 50%;
    }
    table, td, th {
        border: 1px solid;
    }

</style>

<?php

$min=1;
$max=5;


echo "<h1 class='titulo'> Tablero de colores </h1>";
echo "<table>";
    echo "<tr>";
        for ($i=0; $i<10;$i++) { //th
            $randomheader = rand($min, $max);
            if ($randomheader==1) {
                $color = 'red';

            } else if ($randomheader==2) {
                $color = 'green';
            } else if ($randomheader==3) {
                $color = 'blue';
            } else if ($randomheader==4) {
                $color = 'white';
            } else {
                $color = 'black';
            }
            echo "<th style='background-color: . $color.'/>;
            

        }

    echo "</tr>";

    echo "<tr>";
        for ($i=0; $i<40;$i++) { //tr
            $randombody = rand($min, $max);
            if ($randombody==1) {
                $color = 'red';

            } else if ($randombody==2) {
                $color = 'green';
            } else if ($randombody==3) {
                $color = 'blue';
            } else if ($randombody==4) {
                $color = 'white';
            } else {
                $color = 'black';
            }
            ?>
        echo "<td style='background-color: .$color.'/>";

        }
    echo "</tr>";
echo "</table>";
                
?>