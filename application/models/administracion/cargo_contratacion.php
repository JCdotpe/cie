<?php 
class Cargo_Contratacion extends CI_MODEL{

	function Get_Cargo_Contratacion(){
    	$this->db->select('CODI_CARG, DESC_CARG, SUEL_CARG, COD_CATEG,SUEL_CARG_DIA');
    	$this->db->order_by('DESC_CARG','asc');
    	$q = $this->db->get('cargo_contratacion');
		return $q;
    }

}