<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Pedidos</title>
</head>
<body>
<?php
require_once 'Cliente.php';
require_once 'Pedido.php';
?>
<h1>Lista de pedidos</h1>
<br><br>
<h3>Bienvenido usuario: <?= $cliente->nombre ?>. Has entrado <?=$cliente->veces ?> veces en nuetsra web</h3>
<p>Esta es su lista de pedidos del cliente con código <?= $cliente-> cod_cliente ?>:</p>
<?php
$totalPedidos=0;
if (count($pedidos) != 0) {
?>
<table border="1">

    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= $pedido->producto ?></td>
            <td><?= $pedido->precio ?></td>
        </tr>
    <?php $totalPedidos += $pedido->precio;
    endforeach; ?>
    <tr>
        <td>TOTAL PEDIDOS</td>
        <td><?= $totalPedidos?></td>
    </tr>
</table>
<?php
} else {
    echo "<p>No existen pedidos para este cliente</p>";
}
?>
</body>
</html>
