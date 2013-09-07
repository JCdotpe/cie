<?php

class P2F_model extends CI_MODEL{
    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_F',$data);
        return ($q);
    
    }

    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_F');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

}

