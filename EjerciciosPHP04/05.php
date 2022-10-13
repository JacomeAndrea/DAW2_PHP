<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>05</title>
    <style>
        label>input, p, input {
            margin: 1rem;
        }
    </style>
</head>
<body>


<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    ?> <!--si es GET lo pasamos a POST-->
    <h1>Datos personales</h1>
    <form method="post" name="05.php">
        <label>Nombre:&nbsp;<input name="name" size="15"></label>
        <br>
        <label>Apellidos:&nbsp;<input name="surname" size="30"></label>
        <br>
        <label>Edad:&nbsp;
            <select name="age">
                <option value='1'>Menor de 18</option>
                <option value='2'>Entre 18 a 30</option>
                <option value='3'>Entre 30 a 55</option>
                <option value='4'>Mayor de 55</option>
            </select>
        </label>
        <p>Sexo:</p>
        <label><input type="radio" name="sex" value="woman" checked="checked">Mujer&nbsp;</label>
        <label><input type="radio" name="sex" value="man">Hombre&nbsp;</label>

        <p>Hobbies:</p>
        <label><input type="checkbox" value="lectura" name="hobbies[]">&nbsp;Lectura</label>
        <label><input type="checkbox" value="tele" name="hobbies[]">&nbsp;Ver televisión</label>
        <label><input type="checkbox" value="deporte" name="hobbies[]">&nbsp;Hacer deporte</label>
        <label><input type="checkbox" value="marcha" name="hobbies[]">&nbsp;Salir de marcha</label>
        <br><br>
        <input type="submit" value="Enviar formulario al servidor" />

    </form>
    <script>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == "POST") { /*si es POST*/
    $nombre = limpiarEntrada($_POST["nombre"]);
    $apellidos = limpiarEntrada($_POST["apellidos"]);
    $msgSexo = ($_POST['sexo'] == "hombre" )?"Bienvenido":"Bienvenida";
    $edad = $_POST['edad'];
    $arrayHobbies=$_POST['hobbies[]'];
    $arrayHobbies = limpiarArrayEntrada($_POST["hobbies[]"]);


    /*Se indicará Bienvenida o Bienvenido en función del sexo.*/
    echo $msgSexo."&nbsp;";
    /*Se añadirá Dña. o D. si tiene más de 55 años*/
    if ($_POST['edad'] == 4 ) {
        if ($_POST['sexo'] == "hombre") {
            echo "Don";
        } else {
            echo "Doña";
        }
    }
    echo '&nbsp;'.$nombre.'&nbsp;'.$apellidos.'.';

    /*La lista de hobbies se mostrará tratando los casos cuando
    no se ha seleccionado ningún hobby o cuando se ha seleccionado uno solo.*/

    if (count($arrayHobbies)==1) { //un hobbie
        echo '$valor';
    }
    else if ( count($arrayHobbies) > 1){ //más de 1 hobbie
            foreach ( $arrayHobbies as $valor ){
                echo "$valor,";
            }
        }
        else { //ningún hobbie
            echo " ninguno. ";
        }
}
/*Filtrar las entradas con datos que se van a mostrar para evitar los ataques
de inyección de código*/

    //limpia el valor de la variable introducida para evitar inyección de código
    function limpiarEntrada(string $entrada):string{
        $salida = trim($entrada); // Elimina espacios antes y después de los datos
        $salida = stripslashes($salida); // Elimina backslashes \
        $salida = htmlspecialchars($salida); // Traduce caracteres especiales en entidades HTML
        return $salida;
    }

    // Limpia todos elementos de un array
    function limpiarArrayEntrada(array $entrada):array{
        $tsalida=[];
        foreach ($entrada as $key => $value ) {
            $tsalida[$key] = limpiarEntrada($value);
        }
        return $tsalida;
    }
?>
    </script>
</body>
</html>