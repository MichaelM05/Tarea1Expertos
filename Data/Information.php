<?php

include_once '../Data/Data.php';
include_once '../Domain/Columns.php';
include_once '../Domain/EnclosureInfo.php';
include_once '../Domain/GenderInfo.php';
include_once '../Domain/StyleInfo.php';

class Information extends Data {

    
    //Función que obtiene los datos de la DB para calcular los estilos según CA,EC,EA,OR
    public function getInformationStyles() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select tb.ca, tb.ec, tb.ea, tb.or, "
                . "tb.estilo from tbrecintoestilo tb");
        $array = [];
        while ($row = mysqli_fetch_array($query)) {
            $currentInformation = new Columns(
                    $row['ca'], $row['ec'], $row['ea'], $row['or'], $row['estilo']);
            array_push($array, $currentInformation);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
    }//fin getInformationStyles

    //Función que obtiene los datos de la DB para calcular el recinto según sexo y estilo    
    public function getInformationEnclosure($gender, $style) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select tb.promedio, tb.recinto from tbestilosexopromediorecinto"
                . " tb where tb.sexo = '" . $gender . "' and tb.estilo = '" . $style . "'");
        $array = [];
        while ($row = mysqli_fetch_array($query)) {
            $currentInfo = new EnclosureInfo($row['promedio'], $row['recinto']);
            array_push($array, $currentInfo);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
    }//fin getInformationEnclosure

    //Función que obtiene los datos de la DB para calcular el sexo según recinto y estilo 
    public function getInformationGender($enclosure, $style) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select tb.promedio, tb.sexo from tbestilosexopromediorecinto "
                . "tb where tb.recinto = '" . $enclosure . "' and tb.estilo = '" . $style . "';");
        $array = [];
        while ($row = mysqli_fetch_array($query)) {
            $currentInfo = new GenderInfo($row['promedio'], $row['sexo']);
            array_push($array, $currentInfo);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
    }//fin getInformationGender
    
    //Función que obtiene los datos de la DB para calcular el estilo según recinto y sexo 
    public function getInformationStyle($enclosure, $gender) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select tb.promedio, tb.estilo from tbestilosexopromediorecinto "
                . "tb where tb.recinto = '" . $enclosure . "' and tb.sexo = '" . $gender . "';");
        $array = [];
        while ($row = mysqli_fetch_array($query)) {
            $currentInfo = new StyleInfo($row['promedio'], $row['estilo']);
            array_push($array, $currentInfo);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
    }//fin getInformationStyle

}//fin de la clase
