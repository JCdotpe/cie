<?php

/*
capitulo 5

*/
class P3_1_model extends CI_MODEL{

    /*
        iNSERT.
    */
         function insert($req)
    {

        $this->db->insert('P3_1', $req );
        return $this->db->insert_id();
    }

}