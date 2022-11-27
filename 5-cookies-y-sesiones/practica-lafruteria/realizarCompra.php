<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>La Frutería del siglo XXI</h1>
<br>
<p style="font-weight: bold">REALICE SU COMPRA <?php echo strtoupper($_SESSION['name'])?></p>
<form action="lafruteria.php" method="post">
    <label>Seleccione su fruta:
    <select name="frutas">
        <option value="plátanos">Plátanos</option>
        <option value="limones">Limones</option>
        <option value="naranjas">Naranjas</option>
        <option value="manzanas">Manzanas</option>
    </select>
    </label>
    <label>Cantidad: <input type="number" name="cantidad"></label>
    <label><input type="submit" value="Anotar" name="boton"></label>
    <label><input type="submit" value="Terminar" name="boton"></label>

</form>
</body>
</html>
<?php

