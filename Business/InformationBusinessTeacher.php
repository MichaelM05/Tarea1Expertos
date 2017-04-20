<?php

include_once '../Data/InformationTeacher.php';

class InformationBusinessTeacher {   
    
    private $teacherData;
    
    public function InformationBusinessTeacher(){
        $this->teacherData = new InformationTeacher();
    }    
    public function getInformationTeacher(){
        return $this->teacherData->getInformationTeacher();
    }
    
}
