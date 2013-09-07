<?php

class P2D7N_model extends CI_MODEL{

  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_D_7N',$data);
        return ($q);
    
    }

}

