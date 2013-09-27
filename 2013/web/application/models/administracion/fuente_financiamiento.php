<?php 
class Fuente_financiamiento extends CI_MODEL{

	function Get_Fuente_Financiamiento(){
    	$this->db->select('codigo_ff, descripcion_ff,nombre_ff');
    	$this->db->order_by('nombre_ff','asc');
    	$q = $this->db->get('fuente_financiamiento');
		return $q;
    }

}