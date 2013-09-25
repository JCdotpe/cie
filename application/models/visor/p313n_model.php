<?php

class P313n_model extends CI_MODEL{

	public function __construct() {
            parent::__construct();
            $this->load->database();
    }
    
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P3_1_3N',$data);        
        return ($q);
    }

     public function getData($id_local,$predio){

        $this->db->select('*');
        $this->db->from('P3_1_3N');
        $this->db->where('id_local',$id_local);
        $this->db->where('Nro_Pred',$predio);
        $q = $this->db->get();
        return $q;
        
    }

}