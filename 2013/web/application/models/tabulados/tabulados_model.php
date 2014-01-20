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

    //NOMBRE MAPA  - GRAFICOS
    function get_nombre_mapa($num)
    {
        $this->db->where('nu_tabulado',$num);
        $q = $this->db->get('tabulados_nombre_mapa');
        return $q;
    }

    //NOMBRE CUADRO
    function get_nombre_cuadro($num)
    {
        $this->db->where('nu_tabulado',$num);
        $q = $this->db->get('tabulados_nombre_cuadro');
        return $q;
    }




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
        // select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as MANTENIMIENTO,COALESCE(C2.t,0) as REFORZAMIENTO,COALESCE(C3.t,0) as DEMOLICION,COALESCE(C4.t,0) as NEP  from tabulados_dep TAB
        // left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 is not  null group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        // left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        // left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        // left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        // left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 9 group by cod_dpto, des_area) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        // ORDER BY co_departamento asc,fl_area desc;
    $q = $this->db->query("
        /* CAPITULO 7 - SEC B - 1*/
        SELECT * FROM (
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as MANTENIMIENTO,COALESCE(C2.t,0) as REFORZAMIENTO,COALESCE(C3.t,0) as DEMOLICION,COALESCE(C4.t,0) as NEP  from tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 is not  null group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 9 group by cod_dpto, des_area) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        UNION
        SELECT replace(co_departamento,'15','LM') as CCDD, replace(no_departamento,'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as MANTENIMIENTO,COALESCE(C2.t,0) as REFORZAMIENTO,COALESCE(C3.t,0) as DEMOLICION,COALESCE(C4.t,0) as NEP  FROM tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 is not  null group by cod_dpto, des_area ) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 9 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        WHERE co_departamento='15'
        UNION
        SELECT replace(co_departamento,'15','LP') as CCDD, replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as MANTENIMIENTO,COALESCE(C2.t,0) as REFORZAMIENTO,COALESCE(C3.t,0) as DEMOLICION,COALESCE(C4.t,0) as NEP  FROM tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 is not  null group by cod_dpto, des_area ) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P7 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 9 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        WHERE co_departamento='15') as table1
        order by CCDD, AREA desc;
                    ");
    return $q;
}







}
?>