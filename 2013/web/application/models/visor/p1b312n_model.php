<?php

class P1b312n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_B_3_12N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local,$predio){

        $this->db->select('*');
        $this->db->from('P1_B_3_12N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $q = $this->db->get();
        return $q;
        
    }

}

