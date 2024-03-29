<?php 
class Dist_model extends CI_MODEL{

	public function Get_Dist(){
 	    $this->db->select('CCDD, Nombre');        
        $this->db->order_by('Nombre','asc');
        $q = $this->db->get('DIST');
        return $q;
    }

    public function Get_DistbyCode($code1,$code2,$code3){
        $this->db->select('CCDI, Nombre');        
        $this->db->where('CCDD', $code1 );
        $this->db->where('CCPP', $code2 );
        $this->db->where('CCDI', $code3 );
        $q = $this->db->get('DIST');
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