<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forma de pago</title>
</head>
<body>
<div>

    <?php
    if (isset($_GET['nuevatarjeta'])) { //Si hay cambio de tarjeta
        setcookie("tipotarjeta", $_GET['nuevatarjeta'], time() + 7 * 24 * 3600); // Una semana
        echo "<br><h1> Cambiando su tipo de tarjeta...</h1> ";
        echo "<img src='imagenes/waiting.gif' alt='cambio de tarjeta'/>";
        header("Refresh:3; url=\"" . $_SERVER['PHP_SELF'] . "\""); //volvemos a la página
        exit();
    }

    if (isset($_COOKIE['tipotarjeta'])) {
        echo " <H2> SU FORMA DE PAGO ACTUAL ES</H2> <br> ";
        echo " <img src='imagenes/";
        echo $_COOKIE['tipotarjeta'];
            echo ".gif' alt='tarjeta actual'/>";
    } else {
        echo " <H2> NO TIENE FORMA DE PAGO ASIGNADA</H2> <br> ";
        echo "<br><br>";
    }
    ?>

    <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
    <a href="?nuevatarjeta=cashu"><img src='imagenes/cashu.gif' alt='cashu'/></a>&ensp;
    <a href="?nuevatarjeta=cirrus1"><img src='imagenes/cirrus1.gif' alt="cirrus"/></a>&ensp;
    <a href="?nuevatarjeta=dinersclub"><img src='imagenes/dinersclub.gif' alt='tarjeta actual'/></a>&ensp;
    <a href="?nuevatarjeta=mastercard1"><img src='imagenes/mastercard1.gif' alt='mastercard'/></a>&ensp;
    <a href="?nuevatarjeta=paypal"><img src='imagenes/paypal.gif' alt='paypal'/></a>&ensp;
    <a href="?nuevatarjeta=visa1"><img src='imagenes/visa1.gif' alt='visa'/></a>&ensp;
    <a href="?nuevatarjeta=visa_electron"><img src='imagenes/visa_electron.gif' alt='visa electron'/></a>
</div>
</body>
</html>
```