<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Agenda App </title>
</head>
<body>
<form>
    <fieldset>
        <legend>Su agenda personal</legend>
        <form method="get" action="eje02.php">
            <label>Nombre:</label>
            <br>
            <label><input type='text' name='nombre' size=20 value="Ramón"></label>
            <input type='submit' name="orden" value="Consultar">
            <br>
            <label>Teléfono:</label>
            <br>
            <label><input type='tel' name='telefono' size=15 value="9394848"></label>
            <input type='submit' name="orden" value="Añadir">
        </form>
    </fieldset>
</form>
<p> Contacto anotado.</p>
</body>
</html>
<?php

const FICHERO="contactos.txt";

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre=$_GET['nombre'];
    if ((isset($_GET['orden']) && $_GET['orden'] == 'Añadir') && (isset($_GET['telefono']) && !empty($_GET['telefono']))) {
        $telefono=$_GET['telefono'];
        anotar($nombre,$telefono);
    } else if (isset($_GET['orden']) && $_GET['orden'] == 'Consultar') {
        consultar($nombre);
    } else {
        echo "Debe pulsar consultar o añadir";
        header("Location: eje02.php");
    }
} else {
    echo "No se ha recibido el nombre";
    header("Location: eje02.php");
}

//FUNCIONES
//Buscamos solamente en base al nombre
function consultar($nombre): string
{
    if (file_exists("contactos.txt")) {
        $arrayContactos = fopen(FICHERO, 'r');
        while (!feof($arrayContactos)) {
            $linea = fgets($arrayContactos);
            $datos = explode(',', $linea);
            for ($i = 0; $i < count($datos); $i++) {
                if ($datos[$i] == $nombre) {
                    return "El teléfono de $nombre es " . $datos[$i + 1];
                }
            }
        }
        fclose($arrayContactos);
        return "El nombre $nombre no se encuentra en la agenda";
    } else {
        return "No existe el file";
    }
}

//añade a contactos.txt el nombre y teléfono (no comprueba si ya existía)
function anotar($nombre,$telefono) {
    if (numeroTelefonoValido($telefono)) {
        if (file_exists(FICHERO)) {
            //añade a contactos.txt el $nombre y $teléfono
            $arrayContactos = fopen(FICHERO, "a+"); //abrimos fichero para añadir datos
            fwrite($arrayContactos, $nombre.",".$telefono."\n"); //añadimos datos introducidos
            fclose($arrayContactos);
        }
    } else {
        echo "El número de teléfono no es válido, debe constar con un total de 9 caracteres numéricos";
    }
}

function numeroTelefonoValido ($telefono): bool
{
    $valido = false;
    if (strlen($telefono) == 9 && is_numeric($telefono)) {
        $valido = true;
    }
    return $valido;
}




