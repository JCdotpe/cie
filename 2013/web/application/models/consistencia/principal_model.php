<?php 
class Principal_model extends CI_MODEL{

	public function get_predios($id){
        $this->db->where('id_local',$id);
        $q = $this->db->get('P1_B_2A_N');
        return $q;
    }

 	public function get_fields($c){
        $q = $this->db->list_fields($c);
        return $q;
    }
}