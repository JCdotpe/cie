<?php

/*
capitulo 6

*/
class p6_n_model extends CI_MODEL{

    /*
        return: All by codigo local.
    */

    function Get_All_by_local($codigo_de_local){

        $this->db->select('*');
        $this->db->where('codigo_de_local', $codigo_de_local );
        $this->db->order_by('codigo_de_local','asc');
        $q = $this->db->get('P6_N');
        return $q;
    }

}