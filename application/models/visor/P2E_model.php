<?php

class P2E_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_E',$data);
        return ($q);
    
    }

    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_E');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

