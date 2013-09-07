<?php

class P313N_model extends CI_MODEL{
    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P3_1_3N',$data);
        
        return ($q);
    }

}