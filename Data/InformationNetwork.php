<?php
include_once '../Data/Data.php';
include_once '../Domain/NetworkInfo.php';

class InformationNetwork extends Data{
    
    
    //Función que obtiene los datos de la DB para calcular el area    
    public function getInformationNetwork() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select tb.r, tb.l, tb.ca, tb.co, tb.class from tbredes tb");
        $array = [];
        while ($row = mysqli_fetch_array($query)) {
            $currentInformation = new NetworkInfo($row['r'],
                    $row['l'],
                    $this->convertValue($row['ca']), 
                    $this->convertValue($row['co']),
                    $row['class']);
            array_push($array, $currentInformation);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
    }//fin getInformationNetwork

    //función que permite convertir valores
    private function convertValue($value) {
        $temp = 0;

        switch ($value) {
            case 'High':$temp = 1;
                break;
            case 'Medium':$temp = 2;
                break;
            case 'Low':$temp = 3;
                break;
        }

        return $temp;
    }//fin convertValue

}//fin clase
