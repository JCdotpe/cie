<?php

class P31_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('p3_1',$data);
        return ($q);
    
    }

    function Data_P3_1($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P3_1');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

