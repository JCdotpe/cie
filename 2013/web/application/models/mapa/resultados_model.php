<?php 
class Resultados_model extends CI_MODEL{

    function Get_Busqueda( $dpto, $prov, $dist, $ot)
    {
        $q = $this->db->query('PA_Resultado_Infra_OT ?,?,?,?', array($dpto,$prov,$dist,$ot));
        return $q;
    }
}

?>