<?php
require_once ('dat/datos.php');
function userOk($login,$clave):bool {
    global $usuarios;
    //si el código del user y contraseña se encuentra en la tabla de usuarios
    if (isset($usuarios[$login]) && $usuarios[$login][1] == $clave){
        return true;
    } else {
        return false;
    }
}

function getUserRol($login){
    //devuelve el rol asociado al usuario
    global $usuarios;
    return $usuarios[$login][2];
}

function verNotasAlumno($codigo):String{
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    $msg .= " Bienvenido/a alumno/a: ".$usuarios[$codigo][0];
    $msg .= "<table>";

    //muestra las notas del alumno
    $msg .= "<tr><th>Asignatura</th><th>Nota</th></tr>";
    for ($i=0; $i<count($nombreModulos); $i++){
        $msg .= "<tr><td>".$nombreModulos[$i]."</td><td>".$notas[$codigo][$i]."</td></tr>";
    }
    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas ($codigo): String {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $msg .= " Bienvenido Profesor: ".$usuarios[$codigo][0];
    $msg .= "<table>";
    //muestra las notas de todos los alumnos
    $msg .= "<tr><th>Alumno</th>";
    for ($i=0; $i<count($nombreModulos); $i++){
        $msg .= "<th>".$nombreModulos[$i]."</th>";
    }
    $msg .= "</tr>";
    foreach ($notas as $codigo => $notasAlumno){
        $msg .= "<tr><td>".$usuarios[$codigo][0]."</td>";
        for ($i=0; $i<count($nombreModulos); $i++){
            $msg .= "<td>".$notasAlumno[$i]."</td>";
        }
        $msg .= "</tr>";
    }
    $msg .= "</table>";
    return $msg;
}