<?php
class v_ambito_censal_model extends CI_MODEL{


    function Get_Ambitos(){

    	    $this->db->select('*');
            $this->db->order_by('Total_Formularios','desc');
            $q = $this->db->get('v_ambito_censal');
            return $q;
    }

}