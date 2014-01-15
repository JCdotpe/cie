<?php 
class Ubigeo_model extends CI_MODEL{

    function Get_Dpto()
    {
        $this->db->select('CCDD, Nombre');              
        $q = $this->db->get('DPTO');
        return $q;
    }

    function Get_Prov($ccdd)
    {
        $this->db->select('CCPP, Nombre');              
        $this->db->where('CCDD', $ccdd);
        $this->db->order_by('Nombre', 'asc');
        $q = $this->db->get('PROV');
        return $q;
    }

    function Get_Busqueda( $dpto, $prov, $ot)
    {
        $q = $this->db->query('PA_Resultado_Infra_OT ?,?,?', array($dpto,$prov,$ot));
        return $q;
    }
}

?>