<?php 
class Cargo_funcional_vista extends CI_MODEL{

	public function Get_Cargo_vista(){
        
 	    $this->db->select('*');        
        $this->db->order_by('CargoFunciona','asc');
        $q = $this->db->get('v_convocatoria');
        return $q;
    }
}