<?php
const DIRECTORIO_IMAGENES = '/imgusers/';
const TAMANO_MAXIMO_ARCHIVO = 200000;
const TAMANO_MAXIMO_ARCHIVOS = 300000;
const EXTENSIONES_PERMITIDAS = array('png', 'jpg');
define("DIRECTORIO_ACTUAL", getcwd());//se define de otra forma al llamar a una funcion -> asigna el directorio actual (pwd)

if($_FILES['archivos']['error'][0]===4) {
    echo "Debes de adjuntar algun archivo para subir";
    exit();
}
$archivos = $_FILES['archivos'];
$nombre_archivos = $_FILES['archivos']['name'];
$tipo_archivos = $_FILES['archivos']['type'];
$tamano_archivos = $_FILES['archivos']['size'];//tamaño en bytes
echo "Tamño array:". $tamano_archivos;
$tamano_total_archivos = 0; //inicializamos

function comprobarExtensiones($array_tipos): bool
{
    $tipos = [];
    //Separamos el tipo de la extensión
    foreach ($array_tipos as $tipo) {
        $extension = explode('/', $tipo)[1];
        $tipos[] = $extension; //array_push($tipos, $extension);
    }
    //Comprobamos que cada extensión está contenida en EXTENSIONES_PERMITIDAS
    $error_extension = false;
    foreach ($tipos as $tipo) {
        if (!in_array($tipo, EXTENSIONES_PERMITIDAS)) {
            $error_extension = true;
            break;
        }
    }
    return !$error_extension;
}


function archivosExisten($nombre_archivos): bool
{
    $error = false;
    foreach ($nombre_archivos as $nombre) {
        $ruta_completa = DIRECTORIO_ACTUAL . DIRECTORIO_IMAGENES . $nombre;
        if (file_exists($ruta_completa)) { //si el archivo existe
            $error = true;
            break;
        }
    }
    return !$error;
}


function tamanoArchivos($tamano_archivos): bool
{
    $error = false;
    foreach ($tamano_archivos as $tamano) {
        if ($tamano > TAMANO_MAXIMO_ARCHIVO) {
            $error = true;
            break;
        }
    }
    return !$error;
}

function tamanoTotalArchivos($tamano_archivos): bool
{
    $suma_tamanos = 0;
    foreach ($tamano_archivos as $tamano) {
        $suma_tamanos += $tamano;
    }
    if ($suma_tamanos > TAMANO_MAXIMO_ARCHIVOS) { //tamaño en bytes
        return false;
    }
    return true;
}

function escribirArchivos($archivos): bool
{
    $error=false;
    foreach ($archivos['name'] as $key => $name) {
        $file = $archivos['tmp_name'][$key];
        $copia_archivo = move_uploaded_file($file, DIRECTORIO_ACTUAL . DIRECTORIO_IMAGENES. $name);//funcion que almacena el file en un directorio
        if (!$copia_archivo){
            $error=true;
        }
    }
    return !$error;

}

$extensiones_ok = comprobarExtensiones($tipo_archivos);
$archivos_existen = archivosExisten($nombre_archivos);
$tamano_archivo_ok=tamanoArchivos($tamano_archivos);
$tamano_archivos_total_ok=tamanoTotalArchivos($tamano_archivos);

function mensajesErrores ($extensiones_ok, $tamano_archivo_ok, $tamano_archivos_total_ok, $archivos_existen) {
    if (!$extensiones_ok){
        echo "Uno de los archivos no tiene la extensión correcta";
    }
    if(!$tamano_archivos_total_ok){
        echo "Los archivos no se han podido subir al exceder el tamaño";
    }
    if (!$tamano_archivo_ok) {
        echo "El archivo no se ha podido subir al exceder el tamaño de 200Kb";
    }
    if ($archivos_existen) {
        echo "El archivo ya existe o contiene el mismo nombre que un archivo anteriormente seleccionado";
    }
}


if ($extensiones_ok && !$archivos_existen && $tamano_archivo_ok && $tamano_archivos_total_ok ){
    print_r($archivos);
    escribirArchivos($archivos);
} else {
    mensajesErrores($extensiones_ok, $tamano_archivo_ok, $tamano_archivos_total_ok, $archivos_existen);
}




