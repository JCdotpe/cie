<?php 
/**
* 
*/
class Tabulados_model extends CI_MODEL
{


    //METADATA
    function get_metadata ($tipo,$preg){
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);
        $q = $this->db->get('metadata');
        return $q;   
    }   

    function insert_metadata($d)
    {     
        $q = $this->db->insert('metadata', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_metadata($tipo,$preg,$texto)
    {
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);        
        $this->db->update('metadata', $texto);
        return $this->db->affected_rows() > 0;
    }
    //METADATA


    //TEXTO COMENTARIOS
    function get_texto ($tipo,$preg){
        $this->db->select('texto,texto_2');
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);
        $q = $this->db->get('tabulados');
        return $q;   
    }   

    function insert_texto($d)
    {     
        $q = $this->db->insert('tabulados', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_texto($tipo,$preg,$texto)
    {
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);        
        $this->db->update('tabulados', $texto);
        return $this->db->affected_rows() > 0;
    }
    //TEXTO COMENTARIOS

    //NOMBRE GRAFICOS

    function get_nombre_mapa($cuadro)
    {
        $this->db->where('nu_tabulado',$cuadro);
        $q = $this->db->get('tabulados_nombre_mapa');
        return $q;
    }


    //NOMBRE GRAFICOS


function get_dptos (){
	$q = $this->db->query('
		select  distinct(DEPARTAMENTO), CCDD from departamentos_tab order by DEPARTAMENTO; 
    ');
    return $q;	 	
}   


    function get_nombre_tabulados()
    {
    $q = $this->db->query('
        select * from tabulados_nombre order by n; 
    ');
    return $q;
    }


function get_report29(){ 
    $q = $this->db->query('
        /* CAPITULO 7 - SEC B - 1*/
        select CCDD, Nombre AS DEPARTAMENTO, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as MANTENIMIENTO,COALESCE(C2.t,0) as REFORZAMIENTO,COALESCE(C3.t,0) as DEMOLICION,COALESCE(C4.t,0) as NEP  from DPTO
        left join (select cod_dpto, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 is not  null group by cod_dpto) as C0 on DPTO.CCDD = C0.cod_dpto
        left join (select cod_dpto, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 group by cod_dpto) as C1 on DPTO.CCDD = C1.cod_dpto
        left join (select cod_dpto, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 group by cod_dpto) as C2 on DPTO.CCDD = C2.cod_dpto
        left join (select cod_dpto, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 group by cod_dpto) as C3 on DPTO.CCDD = C3.cod_dpto
        left join (select cod_dpto, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 9 group by cod_dpto) as C4 on DPTO.CCDD = C4.cod_dpto
        ORDER BY CCDD; 
                    ');
    return $q;
}







}
?>