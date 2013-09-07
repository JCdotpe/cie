<?php

class P618N_model extends CI_MODEL{

  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P6_1_8N',$data);
        return ($q);
    
    }

}

