<?php
$password= ['usuario1' => 'password1', 'usuario2'=> 'password2', 'usuario3' => 'password3'];
$valida=false;

do {
    foreach ($password as $usuario => $contrasena) {
        if ($_POST['name'] == $usuario) { //si el name introducido coincide con $usuario
            if ($_POST['password'] == $password) {
                $valida = true;
                break;
            }
        }
    }
    if (empty($_REQUEST['password'])) { //otra forma de obligar a escribir un campo (required en html)
        echo " Debe introducir una contraseña <br>";
    } else if ($valida) {
        echo "Bienvenido " . $_REQUEST['name'] . ".";
    } else {
        $repetir=false;
        echo "Contraseña introducida inconrrecta, vuelva a intentarlo";
    }
} while ($repetir=false);


