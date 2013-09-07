<?php

class P2B10N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_B_10N',$data);
        return ($q);
    
    }

    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_B_10N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

