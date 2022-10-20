<?php
$arrayNumeros = [];

function calcularNIF ($numerosDNI): string
{
    $arrayLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F,'];
    return $arrayLetras[$numerosDNI % 23];
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    ?>
    <form method='POST'>
        <label>DNI: <input type='text' name='dni'></label>
        <label><input type='submit' value='Enviar' /></label>
    </form>
    <?php
} else {
    if (!empty($_POST["dni"]) && ctype_digit($_POST["dni"]) ) { //si no se ha ejecutado y solo admite números
        $numerosDNI = $_POST["dni"];
        $letradni = calcularNIF($numerosDNI);
        echo "La letra del DNI es: $letradni <br>";
        echo "Su NIF completo sería: $numerosDNI-$letradni";
    } else {
        echo "El valor del DNI:".htmlspecialchars($_POST["dni"])."</b> no es valor numérico";
    }
}