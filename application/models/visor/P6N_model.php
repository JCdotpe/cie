<?php

class P6N_model extends CI_MODEL{

 
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P6_N',$data);
        return ($q);
    
    }


}

