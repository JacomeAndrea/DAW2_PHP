<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forma de pago</title>
</head>
<body>
<div style="text-align:center">
    <?php
    session_start();
    // Si hay cambio de tarjeta (se hace petición GET al hacer click en el enlace, y los parametros del get van en la URL)
    if (isset($_GET['nuevatarjeta'])) {
        $_SESSION['tipotarjeta'] = $_GET['nuevatarjeta'];
        echo "<br><h1> Cambiando su tipo de tarjeta...</h1> ";
        echo "<img src='imagenes/waiting.gif'/>";
        header("Refresh:3; url=\"" . $_SERVER['PHP_SELF'] . "\"");
        echo "
    </body>
</html>";
        exit();
    }

    //si se ha almacenado el tipo de tarjeta en la sesión
    if (isset($_SESSION['tipotarjeta'])) {
        echo " <H2> SU FORMA DE PAGO ACTUAL ES</H2> </br> ";
        //imprimimos la imagen
        echo " <img src='imagenes/";
        echo $_SESSION['tipotarjeta'];
            echo ".gif'/></a>";
    } else { //si no se ha almacenado el tipo de tarjet en la sesión
        echo " <H2> NO TIENE FORMA DE PAGO ASIGNADA</H2> </br> ";
        echo "<br><br>";
    }


    if (isset($_GET['terminar'])) {
        session_destroy();
        header("Refresh:3; url=\"" . $_SERVER['PHP_SELF'] . "\"");

    }

    ?>

    <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
    <!-- ?= parámetros de GET -->
    <a href="?nuevatarjeta=cashu"><img src='imagenes/cashu.gif'/></a>&ensp;
    <a href="?nuevatarjeta=cirrus1"><img src='imagenes/cirrus1.gif'/></a>&ensp;
    <a href="?nuevatarjeta=dinersclub"><img src='imagenes/dinersclub.gif'/></a>&ensp;
    <a href="?nuevatarjeta=mastercard1"><img src='imagenes/mastercard1.gif'/></a>&ensp;
    <a href="?nuevatarjeta=paypal"><img src='imagenes/paypal.gif'/></a>&ensp;
    <a href="?nuevatarjeta=visa1"><img src='imagenes/visa1.gif'/></a>&ensp;
    <a href="?nuevatarjeta=visa_electron"><img src='imagenes/visa_electron.gif'/></a>
    <a href="?terminar">Terminar</a>

</div>
</body>
</html>