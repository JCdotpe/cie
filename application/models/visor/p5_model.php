<?php

/*
capitulo 5

*/
class P5_model extends CI_MODEL{

    /*
        return: todos.
    */

    function Get_Resultados($cod_dpto,$cod_prov){

        $this->db->select('*');
        $this->db->order_by('codigo_de_local','asc');
        $q = $this->db->get('P5');
        return $q;
    }


    /*
        return: total de edificaciones.
    */

    function Get_Total_Edif($cod_edif){

        $this->db->select('P5_TOT_E');
        $this->db->where('codigo_de_local', $cod_edif );
        $q = $this->db->get('P5');
        return $q;
    }

}