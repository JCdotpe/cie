<?php

class P5N_model extends CI_MODEL{
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P5_N',$data);
        return ($q);
    
    }

}

