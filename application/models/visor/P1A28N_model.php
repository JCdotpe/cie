<?php

class P1A28N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_A_2_8N',$data);
        return ($q);
    
    }

    function Data_P1_A_2_8N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_A_2_8N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

