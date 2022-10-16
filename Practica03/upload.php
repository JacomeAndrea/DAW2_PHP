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
            $maxSize=209715.2; //200Kb por imagen
            $totalSizeImagenes=314572.8; //300Kb por subida
            $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
            $count_size=0;
            $uploadOk=1;

                if (count($arrayImagen)>0) {
                foreach ( $arrayImagen as $valorImagen ){
                    if (getimagesize($valorImagen)<$maxSize) {
                        $count_size+=getimagesize($valorImagen); //almacenamos en count el tamaño de cada img
                    } else {
                        $uploadOk = 0;
                        return "Debe elegir una imagen menor de 200Kb";
                    }
                    if ($count_size>$totalSizeImagenes) { //si supera los 300Kb
                        $uploadOk = 0;
                        return "El total de archivos subidos no puede superar los 300Kb";
                    }
                    if (file_exists($subir_archivo)) { //si el archivo existe (nombre repe)
                        echo "El archivo ya existe";
                        $uploadOk = 0;//si existe lanza un valor en 0
                    }
                }
                    if ($count_size>$totalSizeImagenes) { //si supera los 300Kb
                        $uploadOk = 0;
                        echo "El total de archivos subidos no puede superar los 300Kb";
                    }

                    foreach ( $arrayImagen as $claveImagen => $valorImagen ) {
                        if ($uploadOk == 0) {
                            echo "Perdon, pero el archivo no se subio";
                        } else { //si no hay error, se sube archivos
                            if (move_uploaded_file($_FILES[$claveImagen][$valorImagen], $subir_archivo)) {
                                echo "El archivo ". basename($_FILES[$claveImagen][$valorImagen]). " Se subio correctamente";
                                echo "<li style='display: flex'><img src='$valorImagen' width='250' height='250' alt=".'$subir_archivo'."></li>"; //mostramos imagen

                            } else {
                                echo "Error al cargar el archivo";
                            }
                        }
                    }


            }
        } else {
            echo "Error, el method debe ser GET o POST. Algo ha salido mal...";
            }
        ?>
        </script>
        <br>
        <h3><a href="cargar.html">Volver a cliente</a></h3>

    </main>
</body>
</html>