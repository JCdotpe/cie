<?php

class P4_model extends CI_MODEL{

    
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P4',$data);
        return ($q);
    
    }

}

