<?php 
class Resultados_model extends CI_MODEL{

    function Get_Busqueda( $dpto, $prov, $dist, $tiparea, $ot)
    {
        $q = $this->db->query('PA_Resultado_Infra_OT ?,?,?,?,?', array($dpto,$prov,$dist,$tiparea,$ot));
        return $q;
    }

    function Get_Busqueda_Lima( $dpto, $tiparea, $ot)
    {
        $q = $this->db->query('PA_Resultado_Infra_OT_LIMA ?,?,?', array($dpto,$tiparea,$ot));
        return $q;
    }

    function Get_Detalle_OT( $codigo )
    {
        $this->db->select('Nro_Pred, P5_Ed_Nro, Cant_Aula, P7_2_1');
        $this->db->where('id_local', $codigo);
        $this->db->order_by('Nro_Pred, P5_Ed_Nro', 'asc');
        $q = $this->db->get('v_Cantidad_Aulas');
        return $q;
    }
}

?>