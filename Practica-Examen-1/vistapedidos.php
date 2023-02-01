<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
    <style>
        * {
            color: #0000cc;
        }
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 2rem;
            padding: 0 2rem;
        }

        p {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
    $db->contadorVeces($usuario->cod_cliente, $usuario->veces);
?>
    <h1>Bienvenido usuario: <?= $usuario->nombre?>. Has entrado <?= $usuario->veces?> veces en nuestra web</h1>
    <?php if (count($arrayPedidos) == 0): ?>
        <h2>No existen pedidos para este cliente</h2>
    <?php else:

        $precioTotal=0;?>
<br>
    <p>Esta es su lista de pedidos del cliente con código <?= $usuario->cod_cliente?>:</p>
    <table>
        <?php
        foreach ($arrayPedidos as $pedido): ?>
        <tr>
            <td><?= $pedido->producto?></td>
            <td style="font-weight: bold"><?= $pedido->precio?></td>
        </tr>
        <?php
        $precioTotal=$precioTotal+$pedido->precio;
        endforeach ?>
        <tr><td>TOTAL PEDIDOS</td><td style="font-weight: bold"><?= $precioTotal;?></td></tr>
    </table>
    <?php endif ?>
</body>
</html>


