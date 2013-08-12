<?php
class Solicitud_presupuesto_vista extends CI_MODEL{


    public function Get_presupuesto_vista(){

 	    $this->db->select('*');
        $this->db->where('estado', '1' );
        $this->db->order_by('codigo_CredPresupuestario','asc');
        $q = $this->db->get('v_CredPresupuestario');
        return $q;
    }

    function mostrar_datos($inicio, $final, $sidx, $sord)
    {

        $sql="SELECT  * FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM v_CredPresupuestario where estado=1) AS seguimiento WHERE estado=1 and  (seguimiento.RowNumber > $inicio  and seguimiento.RowNumber <= $final)";

    	$q = $this->db->query($sql);
		return $q;
    }
}