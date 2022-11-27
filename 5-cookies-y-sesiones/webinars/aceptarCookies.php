<?php
if (isset($_GET['aceptar'])) { //si se recibe el parámetro, se crea la cookie
    $caducidad=time()+(60*60*24*365);//1 año
    setcookie('micookie',1,$caducidad);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aceptar cookies</title>
</head>
<body>
<?php
if (!isset($_GET['aceptar']) && !isset($_COOKIE['micookie'])) { //si no se recibe ese parametro imprimimos enlace para aceptar y volver al if de arriba

    echo '<a href="?aceptar=1">Aceptar</a>';
}
?>
</body>
</html>
