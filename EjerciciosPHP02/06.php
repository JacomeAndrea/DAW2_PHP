<?php
$min=1;
$max=10;
$num=rand($min,$max);

echo "Número generado: ".$num."<br>";
for ($i=1; $i<=$num;$i++) {
    echo "**** ";
}
echo "<br>";
for ($i=1; $i<=$num;$i++) {
    echo "****&nbsp";
}
echo "<br>";
if ($num==1) {
    echo "****";
} else {
    for ($i=0; $i<$num;$i++) {
        echo "*****";
    }
}


