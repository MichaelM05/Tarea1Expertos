<?php

include_once '../Business/InformationBusiness.php';

//Valores del formulario---------
$enclosure = $_POST['enclosure'];
$mean = $_POST['mean'];
$style = $_POST['style'];
//-------------------------------
/* * Se obtienen los datos de la base de datos, se realiza una consulta donde solo
 * se van a contemplar los valores que cumplan con la característica de recinto y estilo
 */
$enclosureChar = convertValue($enclosure);
$styleNum = 1;
$information = new InformationBusiness();
$result = $information->getInformationGender($enclosureChar, $style);
//---------------------------------------------------------------------------------------
/* * Se calcula la distancia que existe entre los puntos proporcionados por el usuario, se 
 * crean los siguientes puntos x(estilo,promedio) y(recinto,promedio), a los valores alfanuméricos se les
 * asigna un valor numérico para ser evaluados en la fórmula correspondiente. El promedio se mantiene constante
 */
$distance = sqrt(pow(($mean) - ($styleNum), 2) + pow(($mean) - ($enclosure), 2));
//-------------------------------------------------------------------------------------
//Variables para mantener el menor resultado
$minDistance = 100;
$gender = "";
//-----------------------------------------------------------------------------------
//for que permite recorre todos los archivos que se obtienen de la base de datoss
if ($result != 0) {
    foreach ($result as $currentResult) {

        /*         * Se calcula la distancia que existe entre los puntos que se generan con 
         * la información de la base de datos  se forman los siguientes puntos
         * x(estilo,promedio), y(recinto,promedio)
         */
        $meanDB = str_replace(",", ".", $currentResult->getMean());
        $currentDistance = sqrt(pow(($meanDB) - ($styleNum), 2) + pow(($meanDB) - ($enclosure), 2));
        //Se realiza una resta de la distancia actual con la distancia del usuario ingresado, 
        //esto con el fin de identificar la menor distancia posible entre ambos puntos    
        $diffDistances = pow(($distance) - ($currentDistance), 2);
        //Verificar que siempre se mantenga el menor en memoria    
        if ($minDistance > $diffDistances) {
            $minDistance = $diffDistances;
            $gender = $currentResult->getGender();
        }
    }
} else {

    echo 'no se encontraron resultados en la base de datos';
}
//Retorno a la vista
echo convertValue($gender);

//funcion que permite convertir un valor
function convertValue($value) {
    $temp = '';
    switch ($value) {
        case 'F' :$temp = 'Femenino';
            break;
        case 'M' :$temp = 'Masculino';
            break;
        case 0 : $temp = 'Paraíso';
            break;
            ;
        case 1 :$temp = 'Turrialba';
            break;
    }
    return $temp;
}

//fin de la función
