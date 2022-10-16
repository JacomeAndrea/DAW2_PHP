<?php
function upload_img ($file,$nombre="img", $ruta="",$max_size=2000000) {
    $archives_types=array("image/jpg", "image/png");

    if ($ruta=="") {
        $ruta= $_SERVER['DOCUMENT_ROOT']."/imgusers/";
    }
    if (!file_exists($ruta)) {
        if (!mkdir($ruta,0775,true)) {
            return"no se ha podido crear el directorio";
        }
    }

    $key_files=array_keys($file);
    $numero_de_archivos= count($file[$key_files[0]]['name']);
    $maxSize=209715.2; //200Kb
    if ($numero_de_archivos<1) {
        return 'No se ha cargado ningun archivo.';
    }
    if ( !is_array($file[$key_files[0]]['tmp_name']) ){
        return 'Se deben subir los archivos como un array.';
    }
    if ($numero_de_archivos>$max_size) {
        return 'Solo se pueden subir <b>'.$max_size.' archivos</b> a la vez.';
    }


}