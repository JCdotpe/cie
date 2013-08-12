<?php

class Transaccion_model extends CI_Model{

    function insert_transaccion($data){
    	$query = $this->db->insert('transaccion', $data);
		return $query;
    }

    function get_transaccion()
    {
        $query = $this->db->get('transaccion');
        return $query;
    }

}