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

    function get_provsbyCode($code1,$code2){
        $this->db->select ('CCPP, Nombre');
        $this->db->where('CCDD',$code1);
        $this->db->where('CCPP',$code2);
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

    function get_provbysedeope($sedeope,$dpto)
    {
        $query="SELECT distinct c.CCDD, c.CCPP, p.Nombre as Nombre_Provincia FROM codigo_territorial c inner join prov p on c.CCDD=p.CCDD and c.CCPP=p.CCPP WHERE c.COD_SEDE_OPERATIVA = '$sedeope' and c.CCDD = '$dpto'";
        $q = $this->db->query($query);
        return $q;
    }
}