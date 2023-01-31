<?php
//Valida la dirección IPv4 excluyendo las IP privadas
 function validarIp($ip):bool{
    return filter_var($ip, FILTER_VALIDATE_IP);
}

//Comprueba si el teléfono tiene formato 999-999-9999
function validarTelefono($telefono): bool
{
    $formato = "/^\d{3}-\d{3}-\d{4}$/";
    return preg_match($formato, $telefono);
}
echo validarTelefono('999-999-999');