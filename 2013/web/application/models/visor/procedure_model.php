<?php

class Procedure_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

     function Lista_IE($codigo_de_local,$predio){
       
        $q=$this->db->query("CAP01_Lista_IE ?,  ?", array($codigo_de_local,$predio)); 
        return $q;
    
    }

    function Lista_Predio($codigo_de_local){
       
        $q=$this->db->query("CAP01_Lista_Predio ?", array($codigo_de_local)); 
        return $q;
    
    }

    function Lista_Anexo($codigo_de_local){
       
        $q=$this->db->query("CAP01_Lista_Anexo ?", array($codigo_de_local)); 
        return $q;
    
    }

    function Anexo_Datos($codigo_de_local,$predio,$nmodulo,$nroie,$anexo){
       
        $q=$this->db->query("CAP01_C_Datos_Anexo ?, ?, ?, ?, ?", array($codigo_de_local,$predio,$nmodulo,$nroie,$anexo)); 
        return $q;
    
    }

    function Lista_CIE(){
       
        $q=$this->db->query("Lista_Locales_con_CIE"); 
        return $q;
    
    }

    function Lista_Last_Gps(){
       
        $q=$this->db->query("CAP03_Punto10"); 
        return $q;
    
    }

    function Lista_Last_Gps_by_sede($sede,$provincia,$periodo){
       
        $q=$this->db->query("CAP03_Punto10_xTerritorio ?,?,?",array($sede,$provincia,$periodo)); 
        return $q;
    
    }

    function query_by_Local($id_local){
       
        $q=$this->db->query("Vis_Locales_Estado_xCodLocal ?",array($id_local)); 
        return $q;
    
    }

    function querySede($sede,$provincia,$periodo){
       
        $q=$this->db->query("Vis_Locales_Estado_xTerrit ?,?,?",array($sede,$provincia,$periodo)); 
        return $q;
    
    }

}

?>