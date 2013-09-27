<?php 


class Contacto_model extends CI_MODEL
{
	
	function insert_contacto($data)
	{
		$this->db->insert('contacto',$data);
		return $this->db->affected_rows();
	}
}