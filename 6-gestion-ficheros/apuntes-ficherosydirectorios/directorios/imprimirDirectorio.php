<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funciones directorios</title>
</head>
<body>
<?php
    define("DIRECTORIO_ACTUAL", getcwd());
    const DIRECTORIO= "/PHP-5.0.4";
    const DIRECTORIOCOMPLETO = DIRECTORIO_ACTUAL.DIRECTORIO;

    //comprobamos si el directorio existe

    function existeDirectorio ($directorio) {
        if (!is_dir($directorio)) {
        die("No existe en el directorio ".$directorio);
        return false;
        }
        return true;
    }

    if (existeDirectorio(DIRECTORIOCOMPLETO)) {
        //lo abrimos
        $directorio_abierto=@opendir(DIRECTORIOCOMPLETO);
        if (die()) {
            echo "Error al abrir el directorio";
        }
        echo "<pre>";
        $entradaTexto=readdir($directorio_abierto);//lee la primera entrada de texto
        while ($entradaTexto!==false) { //mientras haya más entrada de texto
            echo $entradaTexto."<br>";
            $entradaTexto=readdir($directorio_abierto); //leemos la siguiente
        }
        echo "</pre>";
        closedir($directorio_abierto);
    }


    ?>
</body>
</html>
<?php
