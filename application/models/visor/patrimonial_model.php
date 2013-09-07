<?php

class Patrimonial_model extends CI_MODEL{

	public function __construct() {
            parent::__construct();
            $this->load->database();
    }
    
    public function Get_Patrimonio($codigo){

        $this->db->select('cod_pat');
        $this->db->where('cod_pat', $codigo );
        $q = $this->db->get('patrimonial');
        return $q;
    }

}