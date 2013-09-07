<?php

class P5F_model extends CI_MODEL{

    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P5_F',$data);
        return ($q);
    
    }

}

