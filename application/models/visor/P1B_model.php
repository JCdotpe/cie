<?php

class P1B_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_B',$data);
        return ($q);
    
    }

    function Data_P1_B($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_B');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

