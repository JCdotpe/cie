<?php

class P624N_model extends CI_MODEL{
  
    public function insertBatch($data) {
            
        $q = $this->db->sql_batch('P6_2_4N',$data);
        return ($q);
    
    }

    public function getData($codigo_de_local){

        $this->db->select('*');
        $this->db->from('P6_2_4N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
        
    }

}

