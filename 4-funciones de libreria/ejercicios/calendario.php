<?php

if (isset($_POST)) {
    $mes=$_POST['mes'];
    $year=$_POST['year'];
    $dias=calcularDiasSegunMesyAgno($mes,$year);
    for ($i=0; $i<$dias; $i++) {
        echo '<td>';
    }
}



function calcularDiasSegunMesyAgno ($mes,$year) {
    $dias=cal_days_in_month(CAL_GREGORIAN,$mes,$year);
    return $dias;
}
