<?php

include_once '../Business/InformationBusinessNetwork.php';
//Valores del formulario---------
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$y1 = $_POST['y1'];
$y2 = $_POST['y2'];
//--------------------------------
/* * Se obtienen los datos de la base de datos, se realiza una consulta de todos los valores
 */
$information = new InformationBusinessNetwork();
$result = $information->getInformationNetwork();
/* * Se calcula la distancia que existe entre los puntos proporcionados por el usuario, se 
 * crean los siguientes puntos x(x1,x2) y(y1,y2), a los valores alfanuméricos se les
 * asigna un valor numérico para ser evaluados en la fórmula correspondiente.
 */
$distance = sqrt(pow(($x2) - ($x1), 2) + pow(($y2) - ($y1), 2));
//-------------------------------------------------------------------------------------
//Variables para mantener el menor resultado
$minDistance = 100;
$class = "";
//------------------------------------------------------------------------------------
//for que permite recorre todos los archivos que se obtienen de la base de datos
if ($result != 0) {
    foreach ($result as $currentResult) {
        //Valores para los puntos
        $p1 = $currentResult->getR();
        $p2 = $currentResult->getL();
        $k1 = $currentResult->getCa();
        $k2 = $currentResult->getCo();
        /*         * Se calcula la distancia que existe entre los puntos que se generan con 
         * la información de la base de datos  se forman los siguientes puntos
         * x(p1,p2), y(k1,k2)
         */
        $currentDistance = sqrt(pow(($p2) - ($p1), 2) + pow(($k2) - ($k1), 2));
        //Se realiza una resta de la distancia actual con la distancia del usuario ingresado, 
        //esto con el fin de identificar la menor distancia posible entre ambos puntos 
        $diffDistances = pow(($distance) - ($currentDistance), 2);
        //Verificar que siempre se mantenga el menor en memoria   
        if ($minDistance > $diffDistances) {
            $minDistance = $diffDistances;
            $class = $currentResult->getClass();
        }
    }
} else {

    echo 'no se encontraron resultados en la base de datos';
}
//Retorno a la vista
echo $class;
