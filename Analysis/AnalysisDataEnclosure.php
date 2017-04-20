<?php

include_once '../Business/InformationBusiness.php';

//----valores del formulario---//
$gender = $_POST['gender'];
$mean = $_POST['mean'];
$style = $_POST['style'];
//------------------------------
/* * Se obtienen los datos de la base de datos, se realiza una consulta donde solo
 * se van a contemplar los valores que cumplan con la característica de sexo y estilo
 */
$genderChar = convertValue($gender);
$information = new InformationBusiness();
$result = $information->getInformationEnclosure($genderChar, $style);
//-----------------------------------------------------------------------------------
//Variables para llevar el menor registro en memoria
$minDistance = 100;
$enclosure = "";
//-----------------------------------------------------------------------------------
//for que permite recorre todos los archivos que se obtienen de la base de datos
if ($result != 0) {
    foreach ($result as $currentResult) {

        $meanDB = str_replace(",", ".", $currentResult->getMean());

        /*         * Se calcula la distancia que existe entre los puntos que se generan con 
         * la información del usuario y los datos que se obtienen de la base de datos
         * se forman los siguientes puntos x(sexo,promedioIngresado), y(sexo,promedioDB)
         */
        $currentDistance = sqrt(pow(($mean) - ($gender), 2) + pow(($meanDB) - ($gender), 2));

        //Se verifica si la actual distancia calculada es menor a la anterior
        if ($minDistance > $currentDistance) {
            $minDistance = $currentDistance;
            $enclosure = $currentResult->getEnclosure();
        }//fin if
    }
} else {

    echo 'no se encontraron resultados en la base de datos';
}

//Retorno a la vista
echo $enclosure;

//funcion que permite convertir un valor
function convertValue($value) {
    $temp = '';
    switch ($value) {
        case 0 :$temp = 'F';
            break;
        case 1 :$temp = 'M';
            break;
    }
    return $temp;
}

//fin funcion



    