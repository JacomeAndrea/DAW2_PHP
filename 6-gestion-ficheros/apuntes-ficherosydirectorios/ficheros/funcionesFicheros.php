<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funciones</title>
</head>
<body>
<?php
//definimos fichero remoto y local
const FICHERO_REMOTO = "https://www.example.com/";
const FICHERO_LOCAL = "fichero_local.txt";

//abrimos ficheros con permisos de lectura y escritura
$fichero_remoto=@fopen(FICHERO_REMOTO, 'rw');
$fichero_local=@fopen(FICHERO_LOCAL,'rw');

function escribirDeUnFicheroAOtro ($fichero1, $fichero2):string {
    $contadorbytes=0;
    while ($linea=fgets($fichero1)) { //mientras que haya línea en el fichero del que queremos copiar el texto
        $nbytes=fwrite($fichero2,$linea); //escribimos línea
        $contadorbytes+=$nbytes; //nº bytes procesados
    }
    //cerramos los ficheros
    fclose($fichero1);
    fclose($fichero2);
    return "Datos de".$fichero1." a ".$fichero2." copiados con éxito. Total de bytes procesados: ".$contadorbytes;
}

echo escribirDeUnFicheroAOtro($fichero_remoto, $fichero_local);

 ?>
</body>
</html>
<?php
