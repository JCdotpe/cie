<?php
class Resultados_model extends CI_MODEL{

	function Get_Resultados($code){

 	    $this->db->select('*');
        $this->db->order_by('dpto','asc');
        $this->db->order_by('prov','asc');
        $this->db->order_by('cargo','asc');
        $this->db->order_by('apellidos_nombres','asc');
        if ($code!="-1") {
            # code...
            $this->db->where('dni', $code );
        }
        $q = $this->db->get('resultados');
        return $q;
    }


    function contar_datos()
    {
        $sql = "SELECT id FROM resultados where estado=1";
    	$q = $this->db->query($sql);
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

        $sql="SELECT  * FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM resultados ".$where.") AS resultados where estado=1 and  (resultados.RowNumber > $inicio  and resultados.RowNumber <= $final)";

    	$q = $this->db->query($sql);
		return $q;
    }

}