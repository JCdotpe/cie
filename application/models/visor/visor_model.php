<?php 

//========================GENERAL1========================================

class Visor_model extends CI_MODEL{

    function Get_Resultados($cod_dpto,$cod_prov){

        $this->db->select('*');
        $this->db->from('Padlocal');
       // $this->db->join('Padlocal PL','PL.codigo_de_local=r.codlocal','inner');
        $this->db->where('cod_dpto',$cod_dpto);
        $this->db->where('cod_prov',$cod_prov);
        //$this->db->where('r.idruta',$idruta);

        $this->db->order_by('codigo_de_local','asc');
       /* $this->db->order_by('cod_dpto','asc');
        $this->db->order_by('cod_prov','asc');
        $this->db->order_by('cod_dist','asc');
        $this->db->order_by('centroPoblado','asc');*/
  
        $q = $this->db->get();
        return $q;
    }

    function Get_Ruta($cod_dpto,$cod_prov){
        $q=$this->db->query("select idruta from rutas where codlocal in (select codigo_de_local from padlocal where cod_dpto='".$cod_dpto."' and cod_prov='".$cod_prov."') group by idruta");
        return $q;
    }


    //===================================================================


    function Data_PadLocal($codigo_de_local){
        $this->db->select('*');
        $this->db->from('Padlocal');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_PCar($codigo_de_local){
        $this->db->select('*');
        $this->db->from('PCar');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_PCar_C_1N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('PCar_C_1N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

//========================FIN GENERAL1========================================

//========================CAPITULO1========================================


    function Data_P1_A($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_A');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

     function Data_P1_A_2N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_A_2N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P1_A_2_8N($codigo_de_local,$P1_A_2_NroIE){
        $this->db->select('*');
        $this->db->from('P1_A_2_8N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $this->db->where('P1_A_2_NroIE',$P1_A_2_NroIE);
        $q = $this->db->get();
        return $q;
    }

    function Data_P1_A_2_9N($codigo_de_local,$P1_A_2_NroIE,$P1_A_2_9_NroCMod){
        $this->db->select('*');
        $this->db->from('P1_A_2_9N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $this->db->where('P1_A_2_NroIE',$P1_A_2_NroIE);
        $this->db->where('P1_A_2_9_NroCMod',$P1_A_2_9_NroCMod);
        $q = $this->db->get();
        return $q;
    }

    function Data_P1_B($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_B');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P1_B_2A_N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_B_2A_N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P1_B_3N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P1_B_3N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    //STOREDS PROCEDURES
    

    function Data_SP_CAP01_B_3($codigo_de_local,$predio,$npredio){
        /*$q=$this->db->query("EXEC CAP01_B_3 '"+$codigo_de_local+"','"+$predio+"','"+$npredio+"'");
        return $q;
        */
        $q=$this->db->query("CAP01_B_3 ?,  ?, ?", array($codigo_de_local,$predio,$npredio)); 
        return $q;
    }


//========================CAPITULO2========================================

    function Data_P2_A($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_A');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P2_B($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_B');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P2_B_9N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_B_9N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P2_B_10N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_B_10N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P2_B_11N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_B_11N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    function Data_P2_B_12N($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_B_12N');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }

    //=============

    function Data_P2_C($codigo_de_local){
        $this->db->select('*');
        $this->db->from('P2_C');
        $this->db->where('codigo_de_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;
    }
    

//========================CAPITULO3========================================

//CIE01A

//========================GENERAL2========================================
//========================CAPITULO4========================================
//========================CAPITULO5========================================

//CIE01B

//========================GENERAL3========================================
//========================CAPITULO6========================================
//========================CAPITULO7========================================
//========================CAPITULO8========================================



    

}