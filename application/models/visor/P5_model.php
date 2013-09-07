<?php

class P5_model extends CI_MODEL{

  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P5',$data);
        return ($q);
    
    }

}

