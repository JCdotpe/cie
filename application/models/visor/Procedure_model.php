<?php

class Procedure_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

     function Lista_IE($codigo_de_local,$predio){
       
        $q=$this->db->query("CAP01_Lista_IE ?,  ?", array($codigo_de_local,$predio)); 
        return $q;
    
    }

    function Lista_Predio($codigo_de_local){
       
        $q=$this->db->query("CAP01_Lista_Predio ?", array($codigo_de_local)); 
        return $q;
    
    }

}

?>