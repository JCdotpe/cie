<?php

class Personal_Patrimonio_model extends CI_MODEL{


	function get_imei($codigo){
		$q=$this->db->query("select imei from Personal_Patrimonio where imei=?", array($codigo));
        return $q;
	}

	function get_token($token){
		$q=$this->db->query("select token from Personal_Patrimonio where token=?", array($token));
        return $q;
	}

	function insert_reg($req){

        $q= $this->db->insert('Personal_Patrimonio', $req );
        return $q;
    }

	function insertBatch($data) {
            
        $q = $this->db->sql_batch('Personal_Patrimonio',$data);
        
        return ($q);
    }




}