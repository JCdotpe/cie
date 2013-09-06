<?php

class V_procesoseleccion_model extends CI_MODEL{
    
    function Get_Dni($codigo){

        $this->db->select('dni');
        $this->db->where('dni', $codigo );
        $this->db->where('estado', '8');
        $q = $this->db->get('v_procesoseleccion');
        return $q;
    }

}