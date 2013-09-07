<?php

class P62N_model extends CI_MODEL{

    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P6_2N',$data);
        return ($q);
    
    }

}

