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
                $color = '<span style="color:red"/>';

            } else if ($randomheader==2) {
                $color = '<span style="color:green"/>';
            } else if ($randomheader==3) {
                $color = '<span style="color:blue"/>';
            } else if ($randomheader==4) {
                $color = '<span style="color:white"/>';
            } else {
                $color = '<span style="color:black"/>';
            }

            echo "<th>" . $color."</th>";
        }

    echo "</tr>";

    echo "<tr>";
        for ($i=0; $i<40;$i++) { //tr
            $randombody = rand($min, $max);
            if ($randombody==1) {
                $color = '<span style="color:red"/>';

            } else if ($randombody==2) {
                $color = '<span style="color:green"/>';
            } else if ($randombody==3) {
                $color = '<span style="color:blue"/>';
            } else if ($randombody==4) {
                $color = '<span style="color:white"/>';
            } else {
                $color = '<span style="color:black"/>';
            }
            echo "<td>" . $color."</td>";
        }
    echo "</tr>";
echo "</table>";







