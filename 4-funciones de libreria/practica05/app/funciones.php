<?php
function usuarioOk($usuario, $contrasena): bool
{
    if (strlen($usuario)>=8 ) {
        $usuarioDelReves=strrev($usuario);
        if ($usuarioDelReves===$contrasena) {
            return true;
        }
    }
    return false;

}
