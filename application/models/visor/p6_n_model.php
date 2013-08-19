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


    /*store procedure*/
    function Get_Cap06($local,$predio){

        //$result=$this->db->query("exec CAP06_A_Lista_E @codigo_local=".$local.",@predio=".$predio );
        $q=$this->db->query("CAP06_A_Lista_E ?,  ?", array($local,$predio));
       // $out_param_query =$this->db->query('select @return_value as out_param;');

       //return $result;
        return $q;
    }

}