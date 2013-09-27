<?php 
class Odei_model extends CI_MODEL{

 	function Get_Odei(){

 		$this->db->select('ccdd,ccpp,coddepe, detadepen,deta_convo, direccion');              
        $q = $this->db->get('odei');
        return $q;
    }

	function Get_odei_combo($departamento,$provincia){
		$this->db->select('ccdd,ccpp,coddepe, detadepen,deta_convo, direccion');
		$this->db->where('ccdd', $departamento );
 	    $this->db->where('ccpp', $provincia);          
        $q = $this->db->get('odei');
        return $q;
	}


}

?>