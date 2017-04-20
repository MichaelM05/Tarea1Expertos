<?php

include_once '../Data/InformationNetwork.php';

class InformationBusinessNetwork { 
    
    private $networkData;    
    
    public function InformationBusinessNetwork(){        
        $this->networkData = new InformationNetwork();
    }
    public function getInformationNetwork(){        
        return $this->networkData->getInformationNetwork();
    }
    
}
