<?php

class P313N_model extends CI_MODEL{
    
    function insert_reg($req){

        $this->db->insert('p3_1_3n', $req );
        return $this->db->insert_id();
    }
    function insert_batch($req){

        $this->db->insert_batch('p3_1_3n', $req );
        return $this->db->insert_id();
    }
    function lt_query(){        
        print_r($this->db->last_query());
    }

    function insertBatch($data) {
            
        $q = $this->db->sql_batch('p3_1_3n',$data);
        
        return ($q);
    }


}