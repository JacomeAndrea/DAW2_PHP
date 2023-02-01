<?php
class Cliente {

    private $id;
    private $first_name;
    private $last_name;	
    private $email;	
    private $gender;
    private $ip_address;
    private $telefono;
    private $foto;
    

    
    function __set($name, $value)
   {
    if ( property_exists($this,$name)){
        $this->$name = $value;
    }
   }

   function &__get($name)
   {
       if ( property_exists($this,$name)){
           return $this->$name;
       }
   }

    function getIp_address() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];
    }

    //FUNCIONES IMÁGENES
    function getFoto () {
        $foto = sprintf("%'.08d", $this->id);
        $directorio = "app" . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
        if (is_file($directorio . $foto . ".jpg")) {
            $foto=$directorio.$foto.".jpg";
        } else {
            $enlace = "https://robohash.org/";
            $foto=$enlace.$foto;
        }
        return $foto;
    }

    //devuelve el código del país
    function countryCode ($ip) {
        $solicitud=file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);
        $datosSolicitud=json_decode($solicitud);
        return $datosSolicitud->geoplugin_countryCode;
    }

}






