<?php
//pasados 4 segundos rediccionará a acceso.html
header('Refresh: 4; URL=acceso.html')
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Error</title>
    <style>
        *{
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
<?= $mensaje ?>
</body>
</html>
<?php
