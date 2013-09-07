<?php

class P7_model extends CI_MODEL{

 
  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P7',$data);
        return ($q);
    
    }

}

