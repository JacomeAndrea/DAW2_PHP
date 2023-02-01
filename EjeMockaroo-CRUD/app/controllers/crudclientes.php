<?php

function crudBorrar ($id){    
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarCliente($id);
}

function crudTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}

function crudAlta(){
    $cli = new Cliente();
    $orden= "Nuevo";
    include_once "app/views/formulario.php";
}


function crudDetalles($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $maxId = $db->getUltimoId();
    if ($id == $maxId) {
        $cli = $db->getCliente($id);
    } else {
        $id++;
        if ($db->comprobarId($id) == false) {
            do {
                $id++;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    include_once "app/views/detalles.php";
}


function crudDetallesAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $minId = $db->getPrimerId();
    if ($id == $minId) {
        $cli = $db->getCliente($id);
    } else {
        $id--;
        if ($db->comprobarId($id) == false) {
            do {
                $id--;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    include_once "app/views/detalles.php";
}


function crudModificar($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden="Modificar";
    include_once "app/views/formulario.php";
}

function crudModificarSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $maxId = $db->getUltimoId();
    if ($id == $maxId) {
        $cli = $db->getCliente($id);
    } else {
        $id++;
        if ($db->comprobarId($id) == false) {
            do {
                $id++;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudModificarAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $minId = $db->getPrimerId();
    if ($id == $minId) {
        $cli = $db->getCliente($id);
    } else {
        $id--;
        if ($db->comprobarId($id) == false) {
            do {
                $id--;
            } while ($db->comprobarId($id) == false);
        }
        $cli = $db->getCliente($id);
    }
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta(){
    $db = AccesoDatos::getModelo();
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();
    //llamamos a las funciones que validan la ip, teléfono y email no repetido
     $formatoTelefonoOk = $db->validarTelefono($_POST['telefono']);
     $ipValida = $db->validarIp($_POST['ip_address']);
     $emailRepetido = $db->emailRepetido($_POST['email']);
    //si el telefono, la ip y el email son correctos, se inserta el cliente
    if ($formatoTelefonoOk && $ipValida && !$emailRepetido) {
        $cli->id = $_POST['id'];
        $cli->first_name = $_POST['first_name'];
        $cli->last_name = $_POST['last_name'];
        $cli->email = $_POST['email'];
        $cli->gender = $_POST['gender'];
        $cli->ip_address = $_POST['ip_address'];
        $cli->telefono = $_POST['telefono'];
        //creamos el cliente
        $db->addCliente($cli);
        //redirigimos a la página de inicio
        header("Location: index.php");
    }
    //si el telefono, la ip o el email no son correctos, se muestra un mensaje de error
    else {
        $error = "<h4>Ha habido un error al crear el cliente: </h4>".'<br>';
        if (!$formatoTelefonoOk) {
            $error .= " El formato del teléfono no es correcto, debe contener 9 números ".'<br>';
        }
        if (!$ipValida) {
            $error .= " La ip no es válida ".'<br>';
        }
        if ($emailRepetido) {
            $error .= " El email ya existe ".'<br>';
        }
        include_once "app/views/error.php";
    }
}

function crudPostModificar(){
    $db = AccesoDatos::getModelo();
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    //llamamos a las funciones que validan la ip, teléfono y email no repetido
    $formatoTelefonoOk = $db->validarTelefono($_POST['telefono']);
    $ipValida = $db->validarIp($_POST['ip_address']);
    $emailRepetido = $db->emailRepetido($_POST['email']);
    //si el telefono, la ip y el email son correctos, se inserta el cliente
    if ($formatoTelefonoOk && $ipValida && !$emailRepetido) {
        $cli->id = $_POST['id'];
        $cli->first_name = $_POST['first_name'];
        $cli->last_name = $_POST['last_name'];
        $cli->email = $_POST['email'];
        $cli->gender = $_POST['gender'];
        $cli->ip_address = $_POST['ip_address'];
        $cli->telefono = $_POST['telefono'];
        //creamos el cliente
        $db->modCliente($cli);
        //redirigimos a la página de inicio
        header("Location: index.php");
    }
    //si el telefono, la ip o el email no son correctos, se muestra un mensaje de error
    else {
        $error = "<h4>Ha habido un error al crear el cliente: </h4>".'<br>';
        if (!$formatoTelefonoOk) {
            $error .= " El formato del teléfono no es correcto, debe contener 9 números ".'<br>';
        }
        if (!$ipValida) {
            $error .= " La ip no es válida ".'<br>';
        }
        if ($emailRepetido) {
            $error .= " El email ya existe ".'<br>';
        }
        include_once "app/views/error.php";
    }
    
}

    //Descargar el archivo
    function crudDescargar ($id){
        $db = AccesoDatos::getModelo();
        $cli = $db->getCliente($id);
        include "app/views/pdf.php";
    }

    //funcion que permita al cliente subir una foto a uploads
   function crudSubirFoto($id)
    {
        $db = AccesoDatos::getModelo();
        $cli = $db->getCliente($id);
        $archivo = $_FILES['archivo']['name'];
         if (isset($archivo) && $archivo != "") {
                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];
                $temp = $_FILES['archivo']['tmp_name'];
               if (strpos($tipo, "jpg") || (strpos($tipo, "JPG")) && $tamano < 125000) {
                    //se cambia el nombre del archivo
                    $archivo = sprintf("%'.08d", $id);
                    $archivo .= '.jpg';
                    //comprobar si existe ya un archivo en el directorio llamado así
                    if (file_exists('app/uploads/'.$archivo)) {
                        //se borra
                        unlink("app/uploads/".$archivo);
                    }
                    //Se intenta subir al servidor
                    if (move_uploaded_file($temp, 'app/uploads/' . $archivo)) {
                        $cli->foto = $archivo;
                        $db->modCliente($cli);
                    }
                }
         }

    }

    function  logIn ($user, $password) {
    //comprobamos que el usuario y la contraseña son correctos
        $encryptPass = md5($password,false);
        $db = AccesoDatos::getModelo();
        if ($db->checkLogIn($user,$encryptPass)){
            return true;
        } else{
            return false;
        }
    }

    function obtenerUserName($user){
        $db = AccesoDatos::getModelo();
        $user = $db->getUser($user);
        $userName = $user->user;
        return $userName;
    }

    //Obtener el rol
    function obtenerRol($user){
        $db = AccesoDatos::getModelo();
        $user = $db->getUser($user);
        $rol = $user->rol;
        return $rol;
    }


