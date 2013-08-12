<?php
class Provincia_model extends CI_MODEL{

	public function Get_Provincia(){

 	    $this->db->select('CCDD, Nombre,CCPP,coddepe,detadepen');
        $this->db->order_by('Nombre','asc');
        $q = $this->db->get('PROV');
        return $q;
    }

    function get_provs($dpto){

		$this->db->select ('CCPP, Nombre');
		$this->db->where('CCDD',$dpto);
		$this->db->order_by('Nombre','asc');
		$q = $this->db->get('PROV');
		return $q;
    }

    public function Get_Odei(){

 	    $this->db->select('CCDD, Nombre,CCPP,coddepe,detadepen');
        $this->db->order_by('detadepen','asc');
        $q = $this->db->get('PROV');
        return $q;
    }

    function get_prov_odei($dpto){

        $this->db->select ('CCPP, Nombre');
        $this->db->where('coddepe',$dpto);
        $this->db->order_by('Nombre','asc');
        $q = $this->db->get('PROV');
        return $q;
    }
}