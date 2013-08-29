<?php

/*
capitulo 5

*/
class m_tablet_model extends CI_MODEL{

    /*
        iNSERT.
    */
    function insert($req){

        $this->db->insert('m_tablet', $req );
        return $this->db->insert_id();
    }

    function count($codigo){

    	$sql = "SELECT count(*) as total FROM m_tablet where codigo_IMEI=?";
        $q=$this->db->query($sql,array($codigo));
        return $q;
    }

}