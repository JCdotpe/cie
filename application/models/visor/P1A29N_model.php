<?php

class P1A29N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_A_2_9N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local){
        
        $this->db->select('*');
        $this->db->from('P1_A_2_9N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

