<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 *
 * @author mm
 */
class Data {
        /* atributos */
    public $server;
    public $user;
    public $password;
    public $db;  
    
    /* constructor */
    public function Data(){        
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "datatestexpertos";
    }
        /* constructor */
//    public function Data(){        
//        $this->server = "localhost";
//        $this->user = "id1421239_expertos";
//        $this->password = "expertos";
//        $this->db = "id1421239_mmm";
//    }
}
