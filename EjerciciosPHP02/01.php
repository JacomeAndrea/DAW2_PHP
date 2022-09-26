<?php

function elMayor ($a,$b,&$c) {
    if ($a>$b) {
        $c=$a;
    } else if ($b>$a){
        $c=$b;
    } else {
        $c=0;
    }
}
$resu=34;
elMayor(100,10,$resu);
echo $resu;

?>