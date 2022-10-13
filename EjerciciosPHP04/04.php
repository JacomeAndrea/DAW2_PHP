<?php

//Declaro variables vacías
$nombre= '';
$password= '';
$color= '';
$publicidad= '';
$arrayIdiomas= [];
$estudios= '';
$arrayCiudades= '';
$comentarios= '';

//Compruebo que haya valores introducidos
if (isset($_REQUEST['name'])) {
    $nombre= $_REQUEST['name'];
}
if (isset($_REQUEST['password'])) {
    $password= $_REQUEST['password'];
}
if (isset($_REQUEST['color'])) {
    $color= $_REQUEST['color'];
}
    // Boton de checkbox
    if (isset($_REQUEST['publicidad'])) {
        $publicidad= 'SI publicidad';
    } else {
        $publicidad= 'NO publicidad';
    }

// Array de checkbox
if (isset($_REQUEST['idioma'])) {
    $arrayIdiomas = $_REQUEST['idioma'];

}
if (isset($_REQUEST['estudios'])) {
    $estudios= $_REQUEST['estudios'];
}

if (isset($_REQUEST['ciudades'])) {
    foreach ($_REQUEST['ciudades'] as $arrayCiudades) {
        $arrayCiudades.= $arrayCiudades . ' ';
    }
}

if (!empty($_REQUEST['textarea'])) {
    $comentarios= $_REQUEST['textarea'];
}

?>
<h1>Resultados</h1>
<p>Nombre: </p><br>
<?php echo $nombre?>
<p>Contraseña: </p><br>
<?php echo $password?>
<p>Color: </p><br>
<?php echo $color?>
<p>Publicidad: </p><br>
<?php echo $publicidad?>
<p>Idiomas: </p><br>
<?php
    if ( count($arrayIdiomas) > 0){
        foreach ( $arrayIdiomas as $valor ){
            echo "$valor,";
        }
    }
    else {
        echo " Sin conocimiento de Idiomas ";
    }
?>
<p>Año fin de estudios: </p><br>
<?php echo $estudios?>
<p>Lista de los códigos postales de las provincias: </p><br>
<?php echo $arrayCiudades?>
<p>Comentarios: </p><br>
<?php echo $comentarios?>
