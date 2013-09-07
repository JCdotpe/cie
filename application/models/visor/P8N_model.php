<?php

class P8N_model extends CI_MODEL{

  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P8_N',$data);
        return ($q);
    
    }

<<<<<<< HEAD
=======
    function getData($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P8_N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

>>>>>>> supercommit models and getToken
}

