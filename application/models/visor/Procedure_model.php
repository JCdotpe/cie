<?php

class Procedure_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

     function CAP01_Lista_IE($codigo_de_local,$predio,$npredio){
        /*$q=$this->db->query("EXEC CAP01_B_3 '"+$codigo_de_local+"','"+$predio+"','"+$npredio+"'");
        return $q;
        */
        $q=$this->db->query("CAP01_Lista_IE ?,  ?, ?", array($codigo_de_local,$predio,$npredio)); 
        return $q;
    }

}

?>