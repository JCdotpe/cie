<?php

class P5N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P5_N',$data);
        return ($q);
    
    }

    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P5_N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

