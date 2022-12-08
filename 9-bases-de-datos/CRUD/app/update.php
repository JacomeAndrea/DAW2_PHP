<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Datos</title>
    <link rel="stylesheet" type="text/css" href="../web/style.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php
include "../app/conexion.php";
//para que no vuelva a leer los datos: si no has pulsado el botón de actualizar
if (!isset($_POST["bot_actualizar"])) {
    //almacenamos lo que nos llega por la URL
    $id=$_GET['Id'];
    $nombre=$_GET['nom'];
    $apellido=$_GET['ape'];
    $email=$_GET['em'];
    $genero=$_GET['gen'];
    $ip=$_GET['ip'];
    $telefono=$_GET['tel'];
} else { //almacenamos los datos del formulario por POST
    $id=$_POST['Id'];
    $nombre=$_POST['nom'];
    $apellido=$_POST['ape'];
    $email=$_POST['em'];
    $genero=$_POST['gen'];
    $ip=$_POST['ip'];
    $telefono=$_POST['tel'];

    //actualizamos los datos
    $consulta="UPDATE Clientes SET first_name='$nombre', last_name='$apellido', email='$email', gender='$genero', ip_address='$ip', telefono='$telefono' WHERE id='$id'";
    global $conexion;
    $arrayResultado=mysqli_query($conexion,$consulta);

    header("location:../index.php");
}

?>
<p>

</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];//envía los datos a la misma página?>">
    <table width="25%" border="0" align="center">
        <tr>
            <td></td>
            <td><label for="id"></label>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><label for="nom"></label>
                <input type="text" name="nom" id="nom" value="<?php echo $nombre?>"></td>
        </tr>
        <tr>
            <td>Apellido</td>
            <td><label for="ape"></label>
                <input type="text" name="ape" id="ape" value="<?php echo $apellido?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><label for="em"></label>
                <input type="email" name="em" id="em" value="<?php echo $email?>"></td>
        </tr>
        <tr>
            <td>Género</td>
            <td><label for="gen"></label>
                <input type="text" name="gen" id="gen" value="<?php echo $genero?>"></td>
        </tr>
        <tr>
            <td>Ip</td>
            <td><label for="ip"></label>
                <input type="text" name="ip" id="ip" value="<?php echo $ip?>"></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><label for="tel"></label>
                <input type="text" name="tel" id="tel" value="<?php echo $telefono ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>
</body>
</html>