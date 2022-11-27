<?php
//información recogida por el formulario, añadiendo además la fecha y la hora, y la dirección IP del
//ordenador desde donde se envío la incidencia.

//Fichero: una incidencia por línea sepando valores por coma
//Ejemplo de fichero:
//Fecha y Hora, nombre del usuario, resumen de la incidencias, prioridad, dirección IP
//02:10:2020 21:52,Ana,Cambiar pantalla en A206,3,192.168.12.2

//Muestra dos posibles mensajes

if (isset($_POST['nombre']) && isset($_POST['resumen']) && isset($_POST['prioridad'])) { //si se ha enviado el formulario
    if (!empty($_POST['nombre']) && !empty($_POST['resumen']) && !empty($_POST['prioridad'])) { //si no están vacíos
        $nombre = $_POST['nombre'];
        $resumen = $_POST['resumen'];
        $prioridad = $_POST['prioridad'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $fecha = date('d-m-Y H:i');
        $fichero = fopen('incidencias.txt', 'a');

        //cookie de 2 minutos que impide realizar más de tres incidencias
        if (!isset($_COOKIE['incidencias'])) {
            setcookie('incidencias', 0, time() + 60 * 2);
        } else {
            if ($_COOKIE['incidencias'] > 3) {
                echo "Has enviado demasiadas incidencias";
                exit();
            } else {
                setcookie('incidencias', $_COOKIE['incidencias'] + 1, time() + 60 * 2);
            }
        }

        fwrite($fichero, $fecha . ',' . $nombre . ',' . $resumen . ',' . $prioridad . ',' . $ip . PHP_EOL);
        fclose($fichero);
        echo "Muchas gracias ".$_POST['nombre'].", se ha anotado su incidencia";
    } else {
        echo 'No se ha podido registrar la incidencia';
    }
} else {
    return "Error, no se ha podido anotar su incidencia";
}

