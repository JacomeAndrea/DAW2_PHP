<?php
//mostrar: cuántas veces se a accedido a la pagina y cuántas veces desde un mismo navegador ->en accesos.txt y con valor cookie de 3 meses


//definimos constante
const FICHERO = 'acceso.txt';

 //si existe el archivo
if (file_exists(FICHERO)) { //si existe el fichero

    //COOKIE-contador
    setcookie('micookie',1,time()+(60*60*24*90));
    $numerocookie=0;
    $numeroFichero=0;
    if (isset($_COOKIE['micookie'])) { //si existe la cookie
        $numerocookie = $_COOKIE['micookie'];
        $numerocookie++; //sumamos cada vez que accedamos
    }

    //FICHERO
    $contenidoFichero=@file_get_contents(FICHERO);
    if ($contenidoFichero) { //si se obtiene info del fichero sumamos +1 acceso
        $numeroFichero++;
    }

    file_put_contents(FICHERO, $contenidoFichero);

    echo "<br> Número de accesos desde este navegador = ".$numerocookie;
    echo "<br> Número de accesos Totales = ".$numeroFichero;
} else {
    echo "<br> No existe el fichero";
}
