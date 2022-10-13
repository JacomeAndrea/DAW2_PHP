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
    <main>

    <h1>Subir archivo con PHP:</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "GET") {?>
        <form  method="post"  action="upload.php">
            <fieldset>
                <legend>Subir múltiples imágenes</legend>
                <label>Elija las imagenes que quieres subir:</label>
                <!--  200Kbytes -->
                <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                <input name="archivos[]" type="file" accept="image/png, image/jpeg" multiple> <br />
                    <input type="submit" value=" Subir archivos " />
                    <input type="reset"  value=" Borrar selección ">
            </fieldset>
        </form>
        <script>

            <?php
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $directorio= 'imgusers/';
            $arrayImagen =$_POST['archivos[]'];
            $maxSize=209715.2; //200Kb
            $totalSizeImagenes=0;
            $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);

                if (count($arrayImagen)>0) {
                foreach ( $arrayImagen as $valorImagen ){
                    if (getimagesize($valorImagen)<$maxSize) {
                        echo "$valorImagen";
                    } else {
                        echo "Debe elegir una imagen menor de 200Kb";
                        break;

                        /*Falta: Si el nombre se repite??*/
                    }
                    $totalSizeImagenes=$totalSizeImagenes+getimagesize($valorImagen);
                }
                if ($totalSizeImagenes<314572.8) { //300Kb
                    var_dump($_POST);
                } else {
                    echo "Los archivos de subida no pueden superar los 300Kb.";
                }
            }

            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
                echo "El archivo es válido y se cargó correctamente.<br><br>";
                echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' alt='imagen' width='150'></a>";
            } else {
                echo "La subida ha fallado";
            }
        } else {
            echo "Error, el method debe ser GET o POST. Algo ha salido mal...";
            }
        ?>
        </script>
        <br>
        <h3><a href="cargar.html">Volver </a></h3>

    </main>
</body>
</html>