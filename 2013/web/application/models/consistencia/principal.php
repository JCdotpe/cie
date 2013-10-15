<?php 
class Principal extends CI_MODEL{

	public function get_predios($id){
        $this->db->where('id_local',$id);
        $q = $this->db->get('P1_B_2A_N');
        return $q;
    }

    public function get_car($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('PCar');
        return $q;
    }

    public function Get_Dist_combo($departamento,$provincia){
        
 	   	$this->db->select('CCDI, Nombre');
 	    $this->db->where('CCDD', $departamento );
 	    $this->db->where('CCPP', $provincia);
        $this->db->order_by('Nombre','asc');
        $q = $this->db->get('DIST');
        return $q;
    }


}