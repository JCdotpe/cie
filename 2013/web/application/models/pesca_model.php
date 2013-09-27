<?php
class Pesca_model extends CI_Model{

    function get_cp_by_dpto($cod){
    	$this->db->like('CCPP', $cod, 'after');
    	$q = $this->db->get('pesca');
		return $q;
    }    

    function get_cp_piloto(){
    	$q = $this->db->get('pesca_piloto');
		return $q;
    } 
	
	function get_ccpp($dpto,$prov,$dist)
	{
		$this->db->select('CODCCPP,CENTRO_POBLADO');
		$this->db->like ('CCPP',($dpto.$prov.$dist),'after');
		$q = $this->db->get('pesca');
		return $q;
	}	
 }