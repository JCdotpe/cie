<?php
class Pais_model extends CI_MODEL{

	public function Get_Pais(){

 	    $this->db->select('codigo, detalle');
        $this->db->order_by('detalle','asc');
        $q = $this->db->get('pais');
        return $q;
    }
}