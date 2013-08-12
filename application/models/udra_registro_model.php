<?php
class Udra_registro_model extends CI_Model{

    function get_udra_registro(){
    	$this->db->select('cod_udra_registro,cod_dpto,cod_prov,ambito_censal,cantidad_formularios');
    	$q = $this->db->get('udra_registro');
		return $q;
    }    

 }