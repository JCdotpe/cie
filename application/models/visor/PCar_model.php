<?php

class PCar_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('PCar',$data);
        return ($q);
    
    }

    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('PCar');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

