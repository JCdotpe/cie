<?php

class P1A2N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_A_2N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local,$predio,$ie){

        $this->db->select('*');
        $this->db->from('P1_A_2N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $this->db->where('P1_A_2_NroIE',$ie);
        $q = $this->db->get();
        return $q;
        
    }

}

