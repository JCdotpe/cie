<?php 
class Cargo_funcional_model extends CI_MODEL{

	public function Get_Cargo(){
        
 	    $this->db->select('codigo_cf, nombre_cf');        
        $this->db->order_by('nombre_cf','asc');
        $q = $this->db->get('cargo_funcional');
        return $q;
    }
}