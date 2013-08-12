<?php
class Seguimiento_adm_vista extends CI_MODEL{

	public function Get_Seguimento_vista(){

 	    $this->db->select('*');
        $this->db->where('estado', '1' );
        $this->db->order_by('codigo_adm','asc');
        $q = $this->db->get('v_seguimiento_adm');
        return $q;
    }

    function contar_datos($condicion1)
    {
        $sql = "SELECT codigo_adm FROM v_cobertura $condicion1";
    	$q = $this->db->query($sql);
		return $q;
    }

    function mostrar_datos($inicio, $final, $sidx, $sord)
    {

        $sql="SELECT  * FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM v_seguimiento_adm where estado=1) AS seguimiento WHERE estado=1 and (seguimiento.RowNumber > $inicio  and seguimiento.RowNumber <= $final)";

    	$q = $this->db->query($sql);
		return $q;
    }

}