<?php

class P2B9N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_B_9N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local){

        $this->db->select('*');
        $this->db->from('P2_B_9N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
        
    }

}

