<?php

class m_tablet_model extends CI_MODEL{

    function insert($req){

		$this->db->insert('m_tablet', $req );
        return $this->db->insert_id();

    }



}