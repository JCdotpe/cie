<?php

class P2F_model extends CI_MODEL{

    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_F',$data);
        return ($q);
    
    }


}

