<?php

/*
capitulo 5

*/
class P3_1_N_model extends CI_MODEL{

    /*
        iNSERT.
    */
         function insert($req)
    {

        $this->db->insert('P3_1_N', $req );
        return $this->db->insert_id();
    }

}