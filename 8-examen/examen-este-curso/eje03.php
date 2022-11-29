<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Las frutas</title>
</head>
<body>
<form method="post" action="eje03.php">
    <fieldset>
        <legend>Sus frutas preferidas</legend>
        <label for="nombre">Lista de frutas:</label>
        <br>
        <label>
            <select name="listafrutas[]" multiple>
                <option value="Platano">Platano</option>
                <option value="fresa">fresa</option>
                <option value="Naranja">Naranja</option>
                <option value="Melón">Melón</option>
                <option value="Manzana">Manzana</option>
            </select>
        </label>
        <input type="submit" name="boton" value=" Cambiar "></fieldset>
</form>
</body>
</html>

<?php


if (isset($_POST['listafrutas']) && $_POST['boton'] == ' Cambiar ') {
    $frutas = $_POST['listafrutas'];
    //definimos cookie
    setcookie('galletadefrutas', serialize($_POST['listafrutas']), time() + 3600);
    echo "Sus frutas preferidas son: ";
    //mostramos las fruta seleccionadas
    foreach ($frutas as $fruta) {
        if (isset($fruta)) {
            echo $fruta . " ";
        }
    }

} else {
    echo "No ha seleccionado ninguna fruta";
}
