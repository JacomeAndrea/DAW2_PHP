<?php


if (isset($numero1) && isset($numero2) && isset($_POST['operacion'])) {
    //Declaración de variables
    $numero1 = $_GET['n1'];
    $numero2 = $_GET['n2'];
    $operacion = $_GET['operacion'];
    $borrar = $_GET['borrar'];
    $formato = $_GET['formato'];

    operar($numero1, $numero2, $operacion);

    //Errores: no número
    $error = false;
    if (!is_numeric($numero1) || !is_numeric($numero2)) {
        $error = true;
        $msg = " Error: los valores introducidos no son numéricos.";
    }

    if (($numero2 == 0) && ($operacion == '/')) {
        $error = true;
        $msg = " Error: División por cero";
    }

    if (!$error) { //Si no existe error
        $resultado = operar($numero1, $numero2, $operacion);
        $msg = "El resultado es " . formato($formato, $resultado);
    }

    if ($borrar) {
        $numero1='';
        $numero2='';
    }

}



//Funciones
    function operar($numero1, $numero2, $operacion) {
        switch ($operacion) {
            case '+':
                $resultado=$numero1+$numero2;
                echo $numero1.' + '.$numero2.' = '. $resultado;
                break;

            case '-':
                $resultado=$numero1-$numero2;
                echo $numero1.' - '.$numero2.' = '. $resultado;
                break;

            case '*':
                $resultado=$numero1*$numero2;
                echo $numero1.' x '.$numero2.' = '. $resultado;
                break;

            case '/':
                $resultado=$numero1/$numero2;
                echo $numero1.' / '.$numero2.' = '. $resultado;
                break;

            default:
                echo "Error en la operación, recargue la página";
        }
    }

    function formato ($formato, $resultado) {
        switch ($formato) {
            case 'decimal':
                echo $resultado;
            case  'binario':
                $resultado = dechex($resultado);
                echo $resultado;
            case 'hexadecimal':
                $resultado = decbin($resultado);
                echo $resultado;
            default:
                echo "Error en el formato, recargue la página";
        }
    }

