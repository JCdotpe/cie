<?php

class P2G2N_model extends CI_MODEL{

    
    function insertBatch($data) {
            
        $q = $this->db->sql_batch('P2_G_2N',$data);
        return ($q);
    
    }


}

