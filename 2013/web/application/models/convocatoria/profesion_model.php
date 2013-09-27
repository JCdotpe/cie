<?php 
class Profesion_model extends CI_MODEL{

	public function Get_Profesion(){
        
 	    $this->db->select('id, detalle');        
        $this->db->order_by('detalle','asc');
        $q = $this->db->get('profesion');
        return $q;
    }
}