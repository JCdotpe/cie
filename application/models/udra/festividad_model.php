<?php
class Festividad_model extends CI_MODEL{

 	 function insert_reg($req)
	{

		$this->db->insert('festividad', $req );
		return $this->db->insert_id();
	}

    function update_estado_festividad($req,$cod)
    {
        $this->db->where('cod_festividad', $cod );
        $this->db->update('festividad', $req );
        return $this->db->insert_id();
    }

    function Get_Resultados($code){

        $this->db->select('*');
        if ($code!="-1") {
            # code...
            $this->db->where('dni', $code );
        }
        $q = $this->db->get('v_festividad');
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

        $sql="SELECT  * FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM v_festividad ".$where.") AS v_festividad where estado=1 and  (v_festividad.RowNumber > $inicio  and v_festividad.RowNumber <= $final)";

        $q = $this->db->query($sql);
        return $q;
    }


}