<?php

include_once '../Data/Data.php';
include_once '../Domain/TeacherInfo.php';

class InformationTeacher extends Data {

    //función que obtien los datos para calcular el tipo de profesor
    public function getInformationTeacher() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select tb.a, tb.b, tb.c, tb.d, tb.e, tb.f, "
                . "tb.g, tb.h, tb.class from tbprofesores tb");
        $array = [];
        while ($row = mysqli_fetch_array($query)) {
            $currentInformation = new TeacherInfo($row['a'],$this->convertGender($row['b']),
                    $this->convertSelfEvaluation($row['c']),$row['d'],  $this->convertDiscipline($row['e']),  $this->convertComputers($row['f']),
                    $this->convertWeb($row['g']),  $this->convertWeb($row['h']),$row['class']);
            array_push($array, $currentInformation);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
    }//fin getInformationTeacher
    //función que permite convertir valores
    private function convertGender($gender) {
        $temp = 0;

        switch ($gender) {
            case 'F':$temp = 1;
                break;
            case 'M':$temp = 2;
                break;
            case 'NA':$temp = 3;
                break;
        }

        return $temp;
    }//fin convertGender
    //función que permite convertir valores
    private function convertSelfEvaluation($evaluation) {
        $temp = 0;

        switch ($evaluation) {
            case 'B':$temp = 1;
                break;
            case 'I':$temp = 2;
                break;
            case 'A':$temp = 3;
                break;
        }

        return $temp;
    }//fin converSelfEvaluation
    //función que permite convertir valores
    private function convertDiscipline($discipline) {
        $temp = 0;

        switch ($discipline) {
            case 'DM':$temp = 1;
                break;
            case 'ND':$temp = 2;
                break;
            case 'O':$temp = 3;
                break;
        }

        return $temp;
    }//fin converDiscipline
    //función que permite convertir valores
    private function convertComputers($skillComputers) {
        $temp = 0;

        switch ($skillComputers) {
            case 'L':$temp = 1;
                break;
            case 'A':$temp = 2;
                break;
            case 'H':$temp = 3;
                break;
        }

        return $temp;
    }//fin convertComputers
    //función que permite convertir valores
    private function convertWeb($usingWeb) {
        $temp = 0;

        switch ($usingWeb) {
            case 'N':$temp = 1;
                break;
            case 'S':$temp = 2;
                break;
            case 'O':$temp = 3;
                break;
        }

        return $temp;
    }//fin convertWeb

}//fin clase
