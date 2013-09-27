<?php 
class Universidad_model extends CI_MODEL{

	public function Get_Universidad(){
        
 	    $this->db->select('id_universidad, detalle');        
        $this->db->order_by('detalle','asc');
        $q = $this->db->get('universidad');
        return $q;
    }
}