<?php

include_once '../Business/InformationBusiness.php';
//Valores del formulario---------
$CA = $_POST['CA'];
$EC = $_POST['EC'];
$EA = $_POST['EA'];
$OR = $_POST['OR'];
//--------------------------------
/* * Se obtienen los datos de la base de datos, se realiza una consulta de todos los valores
 */
$information = new InformationBusiness();
$result = $information->getInformation();
/* * Se calcula la distancia que existe entre los puntos proporcionados por el usuario, se 
 * crean los siguientes puntos x(ec,ca) y(or,ea)
 */
$distance = sqrt(pow(($CA) - ($EC), 2) + pow(($EA) - ($OR), 2));
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
         * x(ec,ca) y(or,ea)
         */
        $currentDistance = sqrt(pow(($currentResult->getCA()) - ($currentResult->getEC()), 2) + pow(($currentResult->getEA()) - ($currentResult->getOR()), 2));
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






