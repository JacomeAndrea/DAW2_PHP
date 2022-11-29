<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
const FICHERO_DATOS='usuarios.txt';

//SI EL MÉTODO ES GET: 1.lee fichero, 2.muestra datos, 3.formulario que permita añadir nuevos usuarios
if (($_SERVER['REQUEST_METHOD']=='GET') || empty($_POST['user'])) { //si el método es get o falta el nombre de user -> mostramps datos
    $fichero=@fopen(FICHERO_DATOS,'r');
    //generamos formulario
    echo "<table align='center' boder='1'><br>";
    echo "<tr><th>usuario</th><th>password</th></tr><br>";

    while ($linea=fgets($fichero)) { //mientras que haya línea
        $lineaLimpia=explode("|", trim($linea)); //limpiamos la línea
        echo "<tr><td>$lineaLimpia[0]</td><td>$lineaLimpia[1]</td></tr>"; //escribimos lineaLimpia
    }
    fclose($fichero);
    echo "</table><br>";
    ?>
    <form name="formulario" action="añadirDatosFichero.php" method="POST">
        <label>Usuario: <input type="text" name="user" size="10"></label>
        <label>Palabra clave: <input type="password" name="contrasena" size="10"></label>
        <br>
        <label><input type="submit" value="Enviar"></label>
    </form>
<?php
} else { //SI EL MÉTODO ES POST: 1.se reciben datos, 2.se añaden datos al final del fichero
$fichero=@fopen(FICHERO_DATOS, 'a'); //abrimos fichero para añadir al final
$string=$_POST['user']."|".$_POST['contrasena']."<br>"; //almacenamos en string la cadena a grabar con un salto de línea
$ok=fwrite($fichero,$string); //escribimos string y almacenamos en variable ok
echo ($ok)?"Datos añadidos al fichero":"Error al añadir datos";
fclose($fichero);
echo "<br>Pulsa <a href='añadirDatosFichero.php'>aquí</a> para continuar";

}

?>
</body>
</html>
