<?php

include_once '../Business/InformationBusiness.php';
//----valores del formulario---//
$enclosure = $_POST['enclosure'];
$mean = $_POST['mean'];
$gender = $_POST['gender'];
//------------------------------
/* * Se obtienen los datos de la base de datos, se realiza una consulta donde solo
 * se van a contemplar los valores que cumplan con la característica de sexo y recinto
 */
$enclosureChar = convertValueEnclosure($enclosure);
$genderChar = convertValue($gender);
$information = new InformationBusiness();
$result = $information->getInformationStyle($enclosureChar, $genderChar);
//----------------------------------------------------------------------------------
/* * Se calcula la distancia que existe entre los puntos proporcionados por el usuario, se 
 * crean los siguientes puntos x(recinto,promedio) y(sexo,promedio), a los valores alfanuméricos se les
 * asigna un valor numérico para ser evaluados en la fórmula correspondiente. El promedio se mantiene constante
 */
$distance = sqrt(pow(($mean) - ($enclosure), 2) + pow(($mean) - ($gender), 2));
//-------------------------------------------------------------------------------------
//Variables para mantener el menor resultado
$minDistance = 100;
$style = "";
//------------------------------------------------------------------------------------
//for que permite recorre todos los archivos que se obtienen de la base de datos
if ($result != 0) {
    foreach ($result as $currentResult) {
        /*         * Se calcula la distancia que existe entre los puntos que se generan con 
         * la información de la base de datos  se forman los siguientes puntos
         * x(recinto,promedioDB), y(sexo,promedio)
         */
        $meanDB = str_replace(",", ".", $currentResult->getMean());
        $currentDistance = sqrt(pow(($meanDB) - ($enclosure), 2) + pow(($meanDB) - ($gender), 2));
        //Se realiza una resta de la distancia actual con la distancia del usuario ingresado, 
        //esto con el fin de identificar la menor distancia posible entre ambos puntos
        $diffDistances = pow(($distance) - ($currentDistance), 2);
        //Verificar que siempre se mantenga el menor en memoria
        if ($minDistance > $diffDistances) {
            $minDistance = $diffDistances;
            $style = $currentResult->getStyle();
        }//fin if
    }
} else {
    echo 'no se encontraron resultados en la base de datos';
}
//Retorno a la vista
echo $style;

//funcion que permite convertir un valor
function convertValue($value) {
    $temp = '';
    switch ($value) {
        case 1 :$temp = 'M';
            break;
        case 2 :$temp = 'F';
            break;
    }
    return $temp;
}

//fin de la función

function convertValueEnclosure($value) {
    $temp = '';
    if($value == 2){
        $temp = 'Paraíso'; 
    }else {
        $temp = 'Turrialba';
    }
    return $temp;
}

//fin de la función