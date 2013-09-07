<?php

class P2D5N_model extends CI_MODEL{
   
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_D_5N',$data);
        return ($q);
    
    }

}

