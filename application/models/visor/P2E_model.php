<?php

class P2E_model extends CI_MODEL{
     
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_E',$data);
        return ($q);
    
    }

}

