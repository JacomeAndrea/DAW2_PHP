<?php
include_once 'AccesoDatos.php';

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>consulta</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>BAJAR PRECIOS</h1>
<form method="post" action="consulta.php">
    <table>
        <th>
            <td>nª</td>
            <td>Descripción</td>
            <td>Stock</td>
            <td>Precio</td>
        </th>
        <?php
        $db = AccesoDatos::getModelo();
        $productos = $db->getProductosSinPedidos();

        foreach ($productos as $producto):
            ?>
            <tr>
                <td><input type="checkbox" name="productos[]" value="<?= $producto->PRODUCTO_NO?>"></td>
                <td><?= $producto->PRODUCTO_NO ?></td>
                <td><?= $producto->DESCRIPCION ?></td>
                <td><?= $producto->STOCK_DISPONIBLE ?></td>
                <td><?= $producto->PRECIO_ACTUAL ?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <input type="submit" value="Actualizar">
</form>
</body>
</html>
<?php

if (isset($_POST['productos'])) {
    $productos = $_POST['productos'];
    //definimos una cookie para guardar si se ha realizado la funcion de modificarPrecio
    if (!isset($_COOKIE['modificado'])) {
        $db->modificarPrecio($productos);
        //definimos una cookie para que el usuario no pueda volver a ejecutar la operación
        setcookie('modificado', 'true', time() + 3600);
        
    }else{
        echo "No puedes modificar otra vez en el mismo dia";
    }
}








