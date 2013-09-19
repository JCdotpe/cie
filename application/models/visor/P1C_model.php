<?php

class P1C_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P1_C',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local,$predio,$nmodulo,$nroie,$anexo){

        $this->db->select('*');
        $this->db->from('P1_C');
       $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $this->db->where('P1_A_2_NroIE',$nroie);
        $this->db->where('P1_A_2_9_NroCMod',$nmodulo);
        $this->db->where('P1_A_2_9_AnexNro',$anexo);
        $q = $this->db->get();
        return $q;
        
    }

}

