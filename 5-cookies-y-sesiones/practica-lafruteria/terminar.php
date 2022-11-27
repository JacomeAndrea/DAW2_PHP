<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terminar</title>
</head>
<body>
<h1>La Frutería del siglo XXI</h1>
<br>
<p>Este es su pedido:</p>
<br>
<?php
//mostramos el array de frutas y cantidades
foreach ($_SESSION['frutas'] as $fruta => $cantidad) {
    echo $fruta . ' ' . $cantidad . '<br>';
}
?>
</body>
</html>
<?php
