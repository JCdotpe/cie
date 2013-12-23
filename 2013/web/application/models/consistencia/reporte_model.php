<?php 
class Reporte_model extends CI_MODEL{

    function get_avance_digitacion($fecha){
        $q=$this->db->query("PA_Reporte_Digit_OTIN ?", array($fecha));
		return $q;
    }
}