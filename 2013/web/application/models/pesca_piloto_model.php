<?php
class Pesca_piloto_model extends CI_Model{

    function get_cp_by_dpto($cod){
    	$this->db->like('CCPP', $cod, 'after');
    	$q = $this->db->get('pesca_piloto');
		return $q;
    }    

    function get_dptos(){
    	$this->db->distinct('UBIGEO');
    	$this->db->select('UBIGEO, DEPARTAMENTO');
    	$this->db->order_by('DEPARTAMENTO','asc');
    	$q = $this->db->get('pesca_piloto');
		return $q;
    }    

    function get_provs($dep){
    	$this->db->distinct('UBIGEO');
    	$this->db->select('UBIGEO, PROVINCIA');
    	$this->db->like('ubigeo',$dep,'after');
    	$this->db->order_by('PROVINCIA','asc');
    	$q = $this->db->get('pesca_piloto');
		return $q;
    }    
    function get_dist($prov,$dep){
    	$this->db->distinct('UBIGEO');
    	$this->db->select('UBIGEO, DISTRITO');
    	$this->db->like('UBIGEO',$dep.$prov,'after');
    	$this->db->order_by('DISTRITO','asc');
    	$q = $this->db->get('pesca_piloto');
		return $q;
    }    

   
	function get_ccpp($dpto,$prov,$dist)
	{

		$this->db->select('CODCCPP,CCPP,CENTRO_POBLADO');
		$this->db->like('CCPP',$dpto.$prov.$dist,'after');
		$this->db->order_by('CENTRO_POBLADO','asc');
		$q = $this->db->get('pesca_piloto');
		return $q;
	}

 }