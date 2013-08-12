<?php 
class Dpto_model extends CI_MODEL{

 	function Get_Dpto(){

 		$this->db->select('CCDD, Nombre');              
        $q = $this->db->get('DPTO');
        return $q;
    }



}

?>