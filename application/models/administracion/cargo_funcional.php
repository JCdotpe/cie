<?php 
class Cargo_Funcional extends CI_MODEL{

	function Get_Cargo_Funcional(){
    	$this->db->select('codigo_cf, nombre_cf');
    	$this->db->order_by('nombre_cf','asc');
    	$q = $this->db->get('cargo_funcional');
		return $q;
    }

}