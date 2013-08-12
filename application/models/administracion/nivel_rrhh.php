<?php 
class Nivel_rrhh extends CI_MODEL{

	function Get_Nivel_rrhh(){
    	$this->db->select('codigo_nrrhh, nombre_rrhh');
    	$this->db->order_by('nombre_rrhh','asc');
    	$q = $this->db->get('nivel_rrhh');
		return $q;
    }
}