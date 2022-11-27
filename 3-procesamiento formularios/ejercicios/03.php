<?php

//FORMAS DE VISUALIZAR LOS VALORES INTRODUCIDOS EN UN FORMULARIO0
echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";

print "<pre>";
print_r($_REQUEST);
print "</pre>";


foreach ($_REQUEST as $key => $value) {
    echo $key . " => " . $value;
    echo "<br>";
}