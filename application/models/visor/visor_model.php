<?php 

class Visor_model extends CI_MODEL{

    function Get_Resultados($cod_dpto,$cod_prov,$idruta){

        $this->db->select('*');
        $this->db->from('rutas r');
        $this->db->join('Padlocal PL','PL.codigo_de_local=r.codlocal','inner');
        $this->db->where('PL.cod_dpto',$cod_dpto);
        $this->db->where('PL.cod_prov',$cod_prov);
        $this->db->where('r.idruta',$idruta);

        $this->db->order_by('cod_dpto','asc');
        $this->db->order_by('cod_prov','asc');
        $this->db->order_by('cod_dist','asc');
        $this->db->order_by('centroPoblado','asc');
  
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


//=======CAP II===========

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
    

/*    

select  idruta from rutas where codlocal in (select codigo_de_local from padlocal where cod_dpto='01' and cod_prov='01')
group by idruta

SELECT * FROM rutas r
INNER JOIN Padlocal PL ON PL.codigo_de_local=r.codlocal
where PL.cod_dpto='01' and PL.cod_prov='01' and r.idruta='03'

*/

   /* function contar_datos()
    {
        $sql = "SELECT id FROM resultados where estado=1";
        $q = $this->db->query($sql);
        return $q;
    }
*/
    /*function mostrar_datos($inicio, $final, $sidx, $sord, $code)
    {
        if ($code!="-1") {
            # code...
           $where = " WHERE dni = '$code' and estado=1";
        }else{
           $where = " where estado=1";
        }

        $sql="SELECT  * FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM resultados ".$where.") AS resultados where estado=1 and  (resultados.RowNumber > $inicio  and resultados.RowNumber <= $final)";

        $q = $this->db->query($sql);
        return $q;
    }

}*/

}