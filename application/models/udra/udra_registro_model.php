<?php

class Udra_registro_model extends CI_MODEL
{

	function insert_reg($data)
	{
		$this->db->insert('udra_registro',$data);
		return $this->db->affected_rows();
	}

     function update($req,$cod)
    {
        $this->db->where('COD_UDRA_REGISTRO', $cod );
        $this->db->update('udra_registro', $req );
        return $this->db->insert_id();
    }

    function update_registro_udra_estado($req,$cod){
        $this->db->where('COD_UDRA_REGISTRO', $cod );
        $this->db->update('udra_registro', $req );
        return $this->db->insert_id();
    }

	 function contar_datos()
    {
        $sql = "SELECT id FROM v_udraRegistro where estado=1";
    	$q = $this->db->query($sql);
		return $q;
    }

    function Get_Resultados($code){

 	    $this->db->select('*');
        if ($code!="-1") {
            # code...
            $this->db->where('dni', $code );
        }
        $q = $this->db->get('v_udraRegistro');
        return $q;
    }

    function mostrar_datos($inicio, $final, $sidx, $sord, $code)
    {
    	if ($code!="-1") {
            # code...
           $where = " WHERE dni = '$code' and estado=1";
        }else{
           $where = " where estado=1";
        }

        $sql="SELECT  * FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM v_udraRegistro ".$where.") AS v_udraRegistro where estado=1 and  (v_udraRegistro.RowNumber > $inicio  and v_udraRegistro.RowNumber <= $final)";

    	$q = $this->db->query($sql);
		return $q;
    }
}


