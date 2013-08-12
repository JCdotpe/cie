<?php
class Activos_model extends CI_MODEL{

	function Get_Activos(){
    	$this->db->select('codigo_act, nombre_act');
    	$this->db->order_by('nombre_act','asc');
    	$q = $this->db->get('activos');
		return $q;
    }

}