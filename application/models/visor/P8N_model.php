<?php

class P8N_model extends CI_MODEL{

  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P8_N',$data);
        return ($q);
    
    }

}

