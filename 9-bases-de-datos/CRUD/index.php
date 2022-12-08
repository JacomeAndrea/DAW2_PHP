<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="web/style.css">
    <title>CRUD</title>
</head>

<body>
<?php
include "app/conexion.php";

$consulta="SELECT * FROM Clientes";
//almacenamos en $arrayResultado la consulta
global $conexion;
$arrayResultado=mysqli_query($conexion,$consulta);

//Para la inserción de datos
if (isset($_POST['cr'])) {
    $nombre=$_POST['Nom'];
    $apellido=$_POST['Ape'];
    $email=$_POST['Em'];
    $genero=$_POST['Gen'];
    $ip=$_POST['Ip'];
    $telefono=$_POST['Tel'];

    $consulta="INSERT INTO Clientes (first_name, last_name, email, gender, ip_address, telefono) VALUES ('$nombre','$apellido','$email','$genero','$ip','$telefono')";
    global $conexion;
    mysqli_query($conexion,$consulta);
    header("Location: index.php");
}

?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table width="50%" border="0" align="center">
    <tr >
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Email</td>
        <td class="primera_fila">Género</td>
        <td class="primera_fila">IP</td>
        <td class="primera_fila">Teléfono</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
    </tr>

    <?php //fila por cada cliente
    foreach ($arrayResultado as $fila) :
    ?>
    <tr>
        <td><?php echo $fila['id']?></td>
        <td><?php echo $fila['first_name']?></td>
        <td><?php echo $fila['last_name']?></td>
        <td><?php echo $fila['email']?></td>
        <td><?php echo $fila['gender']?></td>
        <td><?php echo $fila['ip_address']?></td>
        <td><?php echo $fila['telefono']?></td>


        <td class="bot"><a href="app/delete.php?Id=<?php echo $fila['id'] ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
        <td class='bot'><a href="app/update.php?Id=<?php echo $fila['id']?>& nom=<?php echo $fila['first_name']?>& ape=<?php echo $fila['last_name']?>& em=<?php echo $fila['email']?>& gen=<?php echo $fila['gender']?>& ip=<?php echo $fila['ip_address']?>& tel=<?php echo $fila['telefono']?>"> <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>
    <?php
    endforeach;
    ?>


    <tr>
        <td><?php echo $fila['id']?></td> <!--id-->
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='email' name=' Em' size='10' class='centrado'></td>
        <td><input type='text' name='Gen' size='10' class='centrado'></td>
        <td><input type='number' name='Ip' size='10' class='centrado'></td>
        <td><input type='number' name='Tel' size='10' class='centrado'></td>

        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
</table>
</form>

<p>&nbsp;</p>
</body>
</html>
<?php

