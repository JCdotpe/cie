<?php 
class Reporte_model extends CI_MODEL{

    function get_avance_digitacion(){
        $q=$this->db->query("PA_Reporte_Digit_OTIN_Dpto");
		return $q;
    }

    function get_avance_digitacion_userdig(){
        $q=$this->db->query("PA_Reporte_Digit_OTIN_Digitador");
		return $q;
    }

}