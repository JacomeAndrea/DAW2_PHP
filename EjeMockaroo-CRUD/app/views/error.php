<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD CLIENTES</title>
    <link href="web/css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>

        <?= $error ?>
        <br><br>
        <form   method="POST">
            <input type="submit" name="orden" 	value="Volver">
        </form>
        <br><br>
        <?php
        if (isset($_POST['orden']) && $_POST['orden'] == 'Volver') {
            include 'app/views/principal.php';
            exit();
        }
        ?>

</body>
</html>