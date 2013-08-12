<?php
class Activo_model extends CI_MODEL{

 	 function insert($req)
	{

		$this->db->insert('activos', $req );
		return $this->db->insert_id();
	}
	function Get_Activos(){

 	    $this->db->select('*');
        $this->db->order_by('nombre_act','asc');
        $q = $this->db->get('activos');
        return $q;
    }

    function get_activos_ajax(){

        $this->db->select ('codigo_act, nombre_act');
        $this->db->order_by('nombre_act','asc');
        $q = $this->db->get('activos');
        return $q;
    }

}