<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar fichero de texto plano</title>
</head>
<body>
<form method="POST" action="verfichero.php">
    <label><input type="file" name="fichero" value="Subir fichero"></label>
</form>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $fichero=@fopen(FICHERO_DATOS,'r');

    $num_lineas=0;
    $num_caracteres=0;
    while ($linea=fgets($fichero)) { //cada vez que haya línea
        $lineaLimpia=explode("|", trim($linea)); //limpiamos la línea
        $num_caracteres+=count_chars($lineaLimpia); //almacenamos nº caracteres
        echo "<tr><td>$lineaLimpia[0]</td><td>$lineaLimpia[1]</td></tr>"; //imprimimos lineaLimpia
        $num_lineas++; //contamos nº líneas
    }
    fclose($fichero);
}
?>
</body>
</html>




