<?php
class Udra_detalle_model extends CI_MODEL{

 	 function insert($req)
	{

		$this->db->insert('udra_detalle', $req );
		return $this->db->insert_id();
	}

	function Get_Udra_detalle(){

 	    $this->db->select('*');
        $this->db->order_by('nombre_act','asc');
        $q = $this->db->get('udra_detalle');
        return $q;
    }


    function Get_Count_detalle($codigo){

    	$sql = "SELECT count(codigo_udra) as codigo_udra FROM udra_detalle where codigo_udra=$codigo";
    	$q = $this->db->query($sql);
		return $q;
    }
    function Verify_codigo_patrimonial($codigo,$codigo_udra){

        $sql = "SELECT count(*) as total FROM udra_detalle where codigo_patrimonial='".$codigo."' and codigo_udra=$codigo_udra";
        $q = $this->db->query($sql);
        return $q;
    }

}