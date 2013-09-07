<?php

class P2G_model extends CI_MODEL{

    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_G',$data);
        return ($q);
    
    }

}

