<?php

class P624N_model extends CI_MODEL{

  
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P6_2_4N',$data);
        return ($q);
    
    }


}

