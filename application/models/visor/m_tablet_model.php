<?php

class m_tablet_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }
    
    public function insert($req){

		$this->db->insert('m_tablet', $req );
        return $this->db->insert_id();

    }


}