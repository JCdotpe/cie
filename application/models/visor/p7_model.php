<?php

class P7_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P7',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local,$pc_f_1,$nro_ed){

        $this->db->select('*');
        $this->db->from('P7');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$pc_f_1);
        $this->db->where('Nro_Ed',$nro_ed);
        $q = $this->db->get();
        return $q;

    }

}

