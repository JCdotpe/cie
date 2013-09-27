<?php 
class Actividad_presupuestal extends CI_MODEL{
	
 	function Get_Actividad_Presupuestal(){
    	$this->db->select('codigo_ap, nombre_ap');
    	$this->db->order_by('nombre_ap','asc');
    	$q = $this->db->get('actividad_presupuestal');
		return $q;
    }

}

