<?php

class P1a28n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_A_2_8N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local,$predio){

        $this->db->select('*');
        $this->db->from('P1_A_2_8N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $q = $this->db->get();
        return $q;
        
    }

     function Data_P1_A_2_8N($codigo_de_local,$predio,$P1_A_2_NroIE){
        $this->db->select('*');
        $this->db->from('P1_A_2_8N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $this->db->where('P1_A_2_NroIE',$P1_A_2_NroIE);
        $q = $this->db->get();
        return $q;
    }

    function Data_P1_A_2_9N($codigo_de_local,$predio,$P1_A_2_NroIE,$P1_A_2_9_NroCMod){
        $this->db->select('*');
        $this->db->from('P1_A_2_9N');
        $this->db->where('id_local ',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $this->db->where('P1_A_2_NroIE',$P1_A_2_NroIE);
        $this->db->where('P1_A_2_9_NroCMod',$P1_A_2_9_NroCMod);
        $q = $this->db->get();
        return $q;
    }

}

