<?php

class P2G2N_model extends CI_MODEL{
    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_G_2N',$data);
        return ($q);
    
    }

    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_G_2N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

