<?php

class p1a_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_A',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local,$Nro_Pred){

        $this->db->select('*');
        $this->db->from('P1_A');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$Nro_Pred);
        $q = $this->db->get();
        return $q;
        
    }

}

