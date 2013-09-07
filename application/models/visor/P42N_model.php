<?php

class P42N_model extends CI_MODEL{

    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P4_2N',$data);
        return ($q);
    
    }

}

