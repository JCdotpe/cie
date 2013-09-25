<?php

class P42n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
    
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P4_2N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local){

        $this->db->select('*');
        $this->db->from('P4_2N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;

    }

}

