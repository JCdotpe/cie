<?php

class P6110N_model extends CI_MODEL{

    
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P6_1_10N',$data);
        return ($q);
    
    }

}

