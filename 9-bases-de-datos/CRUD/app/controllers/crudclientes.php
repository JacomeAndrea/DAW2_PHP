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

function crudDetallesSiguiente($id){
    //mostramos el siguiente
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    //si el siguiente no existe, mostramos el primero
    if ( $cli->id == $db->numClientes() ){
        $cli = $db->getCliente(1);
    } //si se ha borrado mostramos el siguiente
    else if ( $cli->id == 0 ){
        $cli = $db->getCliente($id+2);
    } else {
        $cli = $db->getCliente($id + 1);
    }
    include_once "app/views/detalles.php";
}

//funcion que imprima el actual
function ImprimirActual($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    //generar pdf con el cliente actual
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,$cli->nombre);
    $pdf->Output();
}



function crudDetallesAnterior($id){
    //mostramos el anterior
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    //si el anterior no existe, mostramos el último
    if ( $cli->id == 1 ){
        $cli = $db->getCliente($db->numClientes());
    } //si se ha borrado mostramos el anterior
    else if ( $cli->id == 0 ){
        $cli = $db->getCliente($id-2);
    } else {
        $cli = $db->getCliente($id - 1);
    }
    include_once "app/views/detalles.php";
}


function crudModificar($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden="Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();
    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->addCliente($cli);
    
}

function crudPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->modCliente($cli);
    
}
