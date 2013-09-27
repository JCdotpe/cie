<?php
class Dependencia extends CI_MODEL{

 	function Get_Dependencia(){
    	$this->db->select('codigo_dep, desc_depe_tde');
    	$this->db->where('codigo_sede_sed','0');
    	$this->db->where('flag','1');
    	$this->db->where('cod_ofi','0');
    	$this->db->order_by('codigo_dep','asc');
    	$q = $this->db->get('dependencias');
		return $q;
    }

}