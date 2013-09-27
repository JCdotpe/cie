<?php 
class Presupuesto extends CI_MODEL{
	
 	function Get_Presupuesto(){
    	$this->db->select('codigo, desc_depe_tde');
    	$this->db->where('codi_sede_sed','000');
    	$this->db->where('flag','1');
    	$this->db->where('cod_of','0');
    	$this->db->order_by('codigo_ap','asc');
    	$q = $this->db->get('actividad_presupuestal');
		return $q;
    }

}
