<?php

// Forma antigua de definir Array en PHP
$paises = array(
    'Francia' => array("Capital" => "París", "Poblacion" => "50000000"),
    'España' => array("Capital" => "Madrid", "Poblacion" => "42000000"),
    'Italia' => array("Capital" => "Roma", "Poblacion" => "46000000"),
    'Argentina' => array("Capital" => "Buenos Aires", "Poblacion" => "40000000"),
    'Colombia' => array("Capital" => "Bogotá", "Poblacion" => "36000000"),
    'Chile' => array("Capital" => "Santiago", "Poblacion" => "36000000"),
    'Suecia' => array("Capital" => "Estocolmo", "Poblacion" => "25000000"),
);

// Forma moderna, mas compacta
$ciudades = [
    'Francia' => ["París","Burdeos","Niza","Lille","Nantes"],
    'España' => ["Madrid", "Barcelona","León","Sevilla", "Valencia", "Málaga"],
    'Italia' => ["Roma", "Venecia","Florencia","Pisa", "Génova", "Milán", "Turín", "Nápoles"],
    'Argentina' => ["Buenos Aires", "Córdoba","Parana","Rosario"],
    'Colombia' => ["Bogotá", "Medellín","Cali","Barranquilla", "Bucaramanga"],
    'Chile' => ["Santiago", "Arica","Iquique","Osorno", "Viña del Mar"],
    'Suecia' => ["Estocolmo", "Upsala","Gotemburgo","Lund"],
];

/*echo $paises["España"]["Capital"]; // Muestra Madrid*/


function paisConMasPoblacion ($paises): string
{
    $max=0;
    $pais_max="";
    foreach ($paises as $clavePais => $valorPais) {
        if ($valorPais['Poblacion']>$max) {
            $pais_max=$clavePais; //nombre (clave)
            $max=$valorPais['Poblacion']; //habitantes (valor)
        }
    }
    return $pais_max;
}

function obtenerNumeroHabitantes ($paises): string
{
    $max=0;
    foreach ($paises as $valorPais) {
        if ($valorPais['Poblacion']>$max) {
            $max=$valorPais['Poblacion']; //habitantes (valor)
        }
    } return number_format($max, 0, ',', '.');
}

function ordenaPaisPorPoblacion($pais1, $pais2){

    return ( $pais1['Poblacion'] - $pais2['Poblacion']);

}

function obtenerCiudades ($ciudades,$paises) { //enseñando desde el maximo (ultima posicón porque esta ordenado de menor a mayor)
    $arrayCiudades = $ciudades[paisConMasPoblacion($paises)];
    foreach($arrayCiudades as $ciudad){
        echo "<td> $ciudad </td>";
    }
}

function paisRandom ($paises) { //2 paises aleatorios
    return array_rand($paises,2);
}

function mostrarDatos ($paises,$ciudades) {
    foreach (paisRandom($paises) as $pais){
        echo " País : ".$pais." , con ".number_format($paises[$pais]['Poblacion'], 0, ',', '.'). " habitantes <br/>";
        echo "<br>";
        echo "Lista de Ciudades: ";
        foreach($ciudades[$pais] as $ciudad){
            echo $ciudad.", ";
        }
        echo '<br/>Enlace a google maps: ';
        echo '<a href="https://www.google.es/maps/place/'.$pais.">Maps</a><br>";
    }


}
?>
}