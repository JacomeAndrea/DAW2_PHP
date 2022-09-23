<?php

$min=1;
$max=10;
$num=rand($min,$max);
$img="<img src='dango.png' alt='dango' class='img' width='25px' height='25px'>";



echo "Número generado: ".$num."<br>";
for ($i=1; $i<=$num;$i++) {
    echo $img.$img.$img.$img."      ";
}
echo "<br>";
for ($i=1; $i<=$num;$i++) {
    echo $img.$img.$img.$img."      ";
}
echo "<br>";
if ($num==1) {
    echo $img.$img.$img.$img;
} else {
    for ($i=0; $i<$num;$i++) {
        echo $img.$img.$img.$img.$img;
    }
}