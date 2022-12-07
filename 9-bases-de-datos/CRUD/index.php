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

//volcamos en la tabla la consulta


?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

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
        <td></td>
        <td><input type='number' name='Id' size='10' class='centrado'></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='email' name=' Em' size='10' class='centrado'></td>
        <td><input type='text' name='Gen' size='10' class='centrado'></td>
        <td><input type='number' name='Ip' size='10' class='centrado'></td>
        <td><input type='number' name='Tel' size='10' class='centrado'></td>

        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
</table>

<p>&nbsp;</p>
</body>
</html>
<?php

