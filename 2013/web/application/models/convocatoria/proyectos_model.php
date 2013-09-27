<?php 
class Proyectos_model extends CI_MODEL{

	public function Get_Proyectos(){
        
 	    $this->db->select('codigo_Proyectos, DESC_PROYECTO');        
        $this->db->order_by('DESC_PROYECTO','asc');
        $q = $this->db->get('PROYECTOS_EXP');
        return $q;
    }  
}