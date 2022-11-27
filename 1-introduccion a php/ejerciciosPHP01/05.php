<style>
table {
    border-collapse: collapse;
}
table, td, th {
    border: 1px solid;
}

    th{
        color: #4444f8;
        background-color: #c9c5c5;
    }
    .izq {
        text-align: left;
    }
    .der {
        text-align: right;
    }
    .fondo-azul {
        background-color: #ceceff;
    }

</style>

<?php


/*
 * 1.- Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma,
 * su resta, su división, su multiplicación, módulo y potencia (ciclo for)
 */
$min = 1;
$max = 10;
$random1 = rand($min, $max);
$random2 = rand($min, $max);

echo "Número 1: " . $random1."<br>";
echo "Número 2: " . $random2."<br>";

function operacionesBasicas($random1, $random2)
{
    $suma = $random1 + $random2;
    $resta = $random1 - $random2;
    $multiplicacion = $random1 * $random2;
    $division = $random1 / $random2;
    $elevado = $random1 ** $random2;

    echo "<table>";
        echo "<tr>";
            echo "<th>Operación</th>";
            echo "<th>Resultado</th>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='izq'>".$random1 . " + " . $random2 . "</td> = ";
            echo "<td class='der'>". $suma . "</td>";
        echo "</tr>";
        echo "<tr class='fondo-azul'>";
            echo "<td class='izq'>".$random1 . " - " . $random2 . "</td> = ";
            echo "<td class='der'>". $resta . "</td>";
        echo "</tr>";
        echo "<tr >";
            echo "<td class='izq'>".$random1 . " x " . $random2 . "</td> = ";
            echo "<td class='der'>".$multiplicacion . "</td>";
        echo "</tr>";
        echo "<tr class='fondo-azul'>";
            echo "<td class='izq'>".$random1 . " / " . $random2 . "</td> = ";
            echo "<td class='der'>".$division . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='izq'>".$random1 . " ** " . $random2 . "</td> = ";
            echo "<td class='der'>".$elevado . "</td>";
        echo "</tr>";
    echo "</table>";

}

operacionesBasicas($random1, $random2);


?>
