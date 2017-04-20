<?php


include_once '../Data/Information.php';

class InformationBusiness {
    
    private $information;
    
    public function InformationBusiness(){
        $this->information = new Information();
    }    
    public function getInformation(){        
        return $this->information->getInformationStyles();
    }
    public function getInformationEnclosure($gender,$style){        
        return $this->information->getInformationEnclosure($gender,$style);
    }
    public function getInformationGender($enclosure,$style){        
        return $this->information->getInformationGender($enclosure,$style);
    }
    public function getInformationStyle($enclosure,$gender){        
        return $this->information->getInformationStyle($enclosure,$gender);
    }

}
