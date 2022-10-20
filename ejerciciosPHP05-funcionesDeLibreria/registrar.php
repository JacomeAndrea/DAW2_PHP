<?php
$emailCorrecto=false;
$contrasenaValida=false;

function emailIncorrecto () {
    if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        return " No es un email correcto. <br>";
    }
    return $emailCorrecto=true;
}

function contrasenaNoValida () {
    if ($_POST['contraseña1'] != $_POST['contraseña2']){
        return "Las contraseñas deben ser iguales <br>";
    } else if (strlen($_POST['contraseña1']) < 8){
        return "El tamaño de la contraseña debe ser igual o superior a 8 caracteres en total <br>";
    } else if ( !hayMayusculas($_POST['contraseña1']) || !hayMinusculas($_POST['contraseña1'])){
        return "Debe haber mayúsculas y minúsculas.<br>";
    } else if ( !hayDigito($_POST['contraseña1'])){
        return "Debe haber algun dígito. <br>";
    } else if ( !hayNoAlfanumerico($_POST['contraseña1'])){
        return "No hay nigún caracter no alfanumérico <br>";
    }
    return $contrasenaValida=true;
}

//Funciones reglas contraseñas


function hayMayusculas ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( ctype_upper($valor[$i]) )
            return true;
    }
    return false;
}

function hayMinusculas ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( ctype_lower($valor[$i]))
            return true;
    }
    return false;
}

function hayDigito ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( ctype_digit($valor[$i]) )
            return true;
    }
    return false;
}

function hayNoAlfanumerico ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( !ctype_alnum($valor[$i]) )
            return true;
    }
    return false;
}


if ($emailCorrecto && $contrasenaValida)




