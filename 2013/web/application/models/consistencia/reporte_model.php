<?php 
class Reporte_model extends CI_MODEL{
    //dni
    function get_avance_digitacion($dni){
        $this->db->where('dni',$dni);
        $q = $this->db->get('registro');
        return $q;
    }
}