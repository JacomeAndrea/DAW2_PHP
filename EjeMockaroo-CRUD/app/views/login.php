<?php

if ($_SESSION['intentos'] >= 2) {
    $error = "Ha superado el límite de intentos, cierre el navegador.".$_SESSION['intentos'];
    include_once "app/views/error.php";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web/css/default.css">
    <title>Log-in</title>
</head>

<body>
<div class="container">

    <h1>
        LOG IN
    </h1>
    <form method="POST">
        <div class="d-inline">
            <label>
                User: <input type="text" name="user">
            </label>
            <label>
                Password: <input type="password" name="password">
            </label>
            <input type="submit" value="Log-In" class="btn btn-outline-primary"></input>
        </div>

    </form>
</div>
</body>

</html>