<?php

class P313N_model extends CI_MODEL{

	public function __construct() {
            parent::__construct();
            $this->load->database();
    }
    
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P3_1_3N',$data);        
        return ($q);
    }

     public function getData($id_local/*,$PC_F_1*/){

        $this->db->select('*');
        $this->db->from('P3_1_3N');
        $this->db->where('id_local',$id_local);
       /* $this->db->where('PC_F_1',$PC_F_1);*/
        $q = $this->db->get();
        return $q;
        
    }

}