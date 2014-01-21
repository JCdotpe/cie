<?php 
class Resultados_model extends CI_MODEL{

    function Get_OpinionTecnica( $dpto, $prov, $dist, $tiparea, $ot)
    {
        $q = $this->db->query('PA_Resultado_Infra_OT ?,?,?,?,?', array($dpto,$prov,$dist,$tiparea,$ot));
        return $q;
    }

    function Get_OpinionTecnica_Lima( $dpto, $tiparea, $ot)
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

    function Get_DefensaCivil( $dpto, $prov, $dist, $tiparea, $df)
    {
        $q = $this->db->query('PA_Resultado_Defensa_Civil ?,?,?,?,?', array($dpto,$prov,$dist,$tiparea,$df));
        return $q;
    }

    function Get_DefensaCivil_Lima( $dpto, $tiparea, $df)
    {
        $q = $this->db->query('PA_Resultado_Defensa_Civil_Lima ?,?,?', array($dpto,$tiparea,$df));
        return $q;
    }

    function Get_AltoRiesgo( $dpto, $prov, $dist, $tiparea, $ar)
    {
        $q = $this->db->query('PA_Resultado_Alto_Riesgo ?,?,?,?,?', array($dpto,$prov,$dist,$tiparea,$ar));
        return $q;
    }

    function Get_AltoRiesgo_Lima( $dpto, $tiparea, $ar)
    {
        $q = $this->db->query('PA_Resultado_Alto_Riesgo_Lima ?,?,?', array($dpto,$tiparea,$ar));
        return $q;
    }

    function Get_PatrimCultural( $dpto, $prov, $dist, $tiparea, $pc)
    {
        $q = $this->db->query('PA_Resultado_Patrimonio_Cultural ?,?,?,?,?', array($dpto,$prov,$dist,$tiparea,$pc));
        return $q;
    }

    function Get_PatrimCultural_Lima( $dpto, $tiparea, $pc)
    {
        $q = $this->db->query('PA_Resultado_Patrimonio_Cultural_Lima ?,?,?', array($dpto,$tiparea,$pc));
        return $q;
    }

    function Get_ObrasEjecucion( $dpto, $prov, $dist, $tiparea, $oj)
    {
        $q = $this->db->query('PA_Resultado_Obras_Ejecucion ?,?,?,?,?', array($dpto,$prov,$dist,$tiparea,$oj));
        return $q;
    }

    function Get_ObrasEjecucion_Lima( $dpto, $tiparea, $oj)
    {
        $q = $this->db->query('PA_Resultado_Obras_Ejecucion_Lima ?,?,?', array($dpto,$tiparea,$oj));
        return $q;
    }

}

?>