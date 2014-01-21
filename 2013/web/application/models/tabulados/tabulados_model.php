<?php 
/**
* 
*/
class Tabulados_model extends CI_MODEL
{


    //METADATA
    function get_metadata ($cap,$preg){
        $this->db->where('no_capitulo', $cap);
        $this->db->where('no_pregunta', $preg);
        $q = $this->db->get('tabulados_metadata');
        return $q;   
    }   

    function insert_metadata($d)
    {     
        $q = $this->db->insert('tabulados_metadata', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_metadata($cap,$preg,$texto)
    {
        $this->db->where('no_capitulo', $cap);
        $this->db->where('no_pregunta', $preg);        
        $this->db->update('tabulados_metadata', $texto);
        return $this->db->affected_rows() > 0;
    }
    //METADATA


    //TEXTO COMENTARIOS
    function get_texto ($cap,$preg){
        $this->db->select('texto,texto_2');
        $this->db->where('no_capitulo', $cap);
        $this->db->where('no_pregunta', $preg);
        $q = $this->db->get('tabulados_comentarios');
        return $q;   
    }   

    function insert_texto($d)
    {     
        $q = $this->db->insert('tabulados_comentarios', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_texto($cap,$preg,$texto)
    {
        $this->db->where('no_capitulo', $cap);
        $this->db->where('no_pregunta', $preg);        
        $this->db->update('tabulados_comentarios', $texto);
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



function get_report_1(){ 
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


function get_report_2(){ 
    $q = $this->db->query("
        /* capitulo 6 - 6*/        
        SELECT * FROM (
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as 'SI',COALESCE(C2.t,0) as 'NO',COALESCE(C3.t,0) as NEP  from tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_6 is not  null group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_6 = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_6 = 2 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_6 = 9 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
            UNION
        SELECT CCDD, DEPARTAMENTO, AREA, SUM(LC0) AS TOTAL,SUM(LC1) AS RIO,SUM(LC2) AS FERREA,SUM(LC3) AS NEP FROM (   
        select REPLACE(replace(co_departamento,'07','15'),'15','LM') as CCDD, REPLACE(replace(no_departamento,'Callao','Lima'),'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3 
        from tabulados_dep TAB 
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_6 is not  null group by cod_dpto, des_area ) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_6 = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_6 = 2 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_6 = 9 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        WHERE co_departamento IN ('15','07') ) AS LIMA_METRO_CALLAO GROUP BY CCDD, DEPARTAMENTO, AREA
            UNION
        SELECT replace(co_departamento,'15','LP') as CCDD, replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as 'SI',COALESCE(C2.t,0) as 'NO',COALESCE(C3.t,0) as  NEP  FROM tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_6 is not  null group by cod_dpto, des_area ) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_6 = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_6 = 2 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_6 = 9 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        WHERE co_departamento='15') as table1
        order by CCDD, AREA desc;
                    ");
    return $q;
}

function get_report_3(){ 
    $q = $this->db->query("
        /* capitulo 6 - 7*/  
        SELECT * FROM (
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as 'SI',COALESCE(C2.t,0) as 'NO',COALESCE(C3.t,0) as NEP  from tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_7 is not  null group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_7 = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_7 = 2 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where P6_1_7 = 9 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
            UNION
        SELECT CCDD, DEPARTAMENTO, AREA, SUM(LC0) AS TOTAL,SUM(LC1) AS RIO,SUM(LC2) AS FERREA,SUM(LC3) AS NEP FROM (        
        select REPLACE(replace(co_departamento,'07','15'),'15','LM') as CCDD, REPLACE(replace(no_departamento,'Callao','Lima'),'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3 
        from tabulados_dep TAB 
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_7 is not  null group by cod_dpto, des_area ) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_7 = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_7 = 2 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P6_1_7 = 9 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        WHERE co_departamento IN ('15','07') ) AS LIMA_METRO_CALLAO GROUP BY CCDD, DEPARTAMENTO, AREA
            UNION
        select replace(co_departamento,'15','LP') as CCDD, replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as 'SI',COALESCE(C2.t,0) as 'NO',COALESCE(C3.t,0) as  NEP  FROM tabulados_dep TAB
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_7 is not  null group by cod_dpto, des_area ) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_7 = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_7 = 2 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1 p  inner join padlocal d on p.id_local = d.codigo_de_local 
        where cod_dpto  in ('15')  and cod_prov <> '01'  and P6_1_7 = 9 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        WHERE co_departamento='15') as table1
        order by CCDD, AREA desc;        
                    ");
    return $q;
}



function get_report_4(){ 
    $q = $this->db->query("
        /* capitulo 2 - 12*/  
        SELECT * FROM (
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as RIO,COALESCE(C2.t,0) as FERREA,COALESCE(C3.t,0) as BARRANCO,COALESCE(C4.t,0) as CUARTEL,COALESCE(C5.t,0) as LADERAS,COALESCE(C6.t,0) as OTRO,
        COALESCE(C7.t,0) as NINGUNO,COALESCE(C8.t,0) as NEP  from tabulados_dep TAB
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/7,1) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local  group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 1 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 2 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 3 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 4 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 5 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 6 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 7 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where  P2_B_12_Cod = 7 AND P2_B_12_Cod_e = 9 group by cod_dpto, des_area) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area          
            UNION  
        SELECT CCDD, DEPARTAMENTO, AREA, SUM(LC0) AS TOTAL,SUM(LC1) AS RIO,SUM(LC2) AS FERREA,SUM(LC3) AS BARRANCO ,SUM(LC4) AS CUARTEL,SUM(LC5) AS LADERA,SUM(LC6) AS OTRO,SUM(LC7) AS NINGUNO,SUM(LC8) AS NEP FROM (
        select REPLACE(replace(co_departamento,'07','15'),'15','LM') as CCDD, REPLACE(replace(no_departamento,'Callao','Lima'),'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,
        COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8  from tabulados_dep TAB        
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/7,1) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 1 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 2 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 3 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 4 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 5 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 6 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 7 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P2_B_12_Cod = 7 AND P2_B_12_Cod_e = 9 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area        
        WHERE co_departamento IN ('15','07') ) AS LIMA_METRO_CALLAO GROUP BY CCDD, DEPARTAMENTO, AREA
            UNION
        select replace(co_departamento,'15','LP') as CCDD, replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as RIO,COALESCE(C2.t,0) as FERREA,COALESCE(C3.t,0) as BARRANCO,COALESCE(C4.t,0) as CUARTEL,COALESCE(C5.t,0) as LADERAS,COALESCE(C6.t,0) as OTRO,
        COALESCE(C7.t,0) as NINGUNO,COALESCE(C8.t,0) as NEP  from tabulados_dep TAB 
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/7,1) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15') and cod_prov <> '01' group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 1 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 2 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 3 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 4 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 5 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 6 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 7 AND P2_B_12_Cod_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P2_B_12N p  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P2_B_12_Cod = 7 AND P2_B_12_Cod_e = 9 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area               
        WHERE co_departamento='15') as table1
        order by CCDD, AREA desc;        
                    ");
    return $q;
}


function get_report_5(){ 
    $q = $this->db->query("
  /* capitulo 6 - 12 - niveles segun OT*/ 
        SELECT * FROM (  
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as CUNA,COALESCE(C2.t,0) as JARDIN,COALESCE(C3.t,0) as CUNA_JARDIN,COALESCE(C4.t,0) as PRIMARIA, COALESCE(C5.t,0) as SECUNDARIA,COALESCE(C6.t,0) as EBA,COALESCE(C7.t,0) as EBE,COALESCE(C8.t,0) as ESFA,COALESCE(C9.t,0) as IST,COALESCE(C10.t,0) as ISP,
        COALESCE(C11.t,0) as CETPRO,COALESCE(C12.t,0) as PRONOEI,COALESCE(C13.t,0) as E_TEMPRANA, COALESCE(C14.t,0) as LUDOTECA,COALESCE(C15.t,0) as NEP from tabulados_dep TAB
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area         
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 1 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
            UNION  
        SELECT CCDD, DEPARTAMENTO, AREA, SUM(LC0) AS TOTAL,SUM(LC1) AS CUNA,SUM(LC2) AS JARDIN,SUM(LC3) AS CUNA_JARDIN ,SUM(LC4) AS PRIMARIA,SUM(LC5) AS SECUNDARIA,SUM(LC6) AS EBA,SUM(LC7) AS EBE,SUM(LC8) AS ESFA,SUM(LC9) AS IST,SUM(LC10) AS ISP,SUM(LC11) AS CETPRO,SUM(LC12) AS PRONOEI,SUM(LC13) AS E_TEMPRANA,SUM(LC14) AS LUDOTECA,SUM(LC15) AS NEP FROM (
        select REPLACE(replace(co_departamento,'07','15'),'15','LM') as CCDD, REPLACE(replace(no_departamento,'Callao','Lima'),'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8,COALESCE(C9.t,0) as LC9,COALESCE(C10.t,0) as LC10,
        COALESCE(C11.t,0) as LC11,COALESCE(C12.t,0) as LC12,COALESCE(C13.t,0) as LC13,COALESCE(C14.t,0) as LC14,COALESCE(C15.t,0) as LC15  from tabulados_dep TAB               
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local  where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 1 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area ) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
        WHERE co_departamento IN ('15','07') ) AS LIMA_METRO_CALLAO GROUP BY CCDD, DEPARTAMENTO, AREA 
            UNION
        select replace(co_departamento,'15','LP')as CCDD,replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8,COALESCE(C9.t,0) as LC9,COALESCE(C10.t,0) as LC10,
        COALESCE(C11.t,0) as LC11,COALESCE(C12.t,0) as LC12,COALESCE(C13.t,0) as LC13,COALESCE(C14.t,0) as LC14,COALESCE(C15.t,0) as LC15  from tabulados_dep TAB               
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local  where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 1 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area ) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
        where co_departamento = '15' ) as table1  
        order by CCDD, AREA desc;           
                    ");
    return $q;
}

function get_report_6(){ 
    $q = $this->db->query("
        /* capitulo 6 - 12 - niveles segun OT - REFORZAMIENTO*/ 
        SELECT * FROM (  
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as CUNA,COALESCE(C2.t,0) as JARDIN,COALESCE(C3.t,0) as CUNA_JARDIN,COALESCE(C4.t,0) as PRIMARIA, COALESCE(C5.t,0) as SECUNDARIA,COALESCE(C6.t,0) as EBA,COALESCE(C7.t,0) as EBE,COALESCE(C8.t,0) as ESFA,COALESCE(C9.t,0) as IST,COALESCE(C10.t,0) as ISP,
        COALESCE(C11.t,0) as CETPRO,COALESCE(C12.t,0) as PRONOEI,COALESCE(C13.t,0) as E_TEMPRANA, COALESCE(C14.t,0) as LUDOTECA,COALESCE(C15.t,0) as NEP from tabulados_dep TAB
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area         
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 2 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
            UNION  
        SELECT CCDD, DEPARTAMENTO, AREA, SUM(LC0) AS TOTAL,SUM(LC1) AS CUNA,SUM(LC2) AS JARDIN,SUM(LC3) AS CUNA_JARDIN ,SUM(LC4) AS PRIMARIA,SUM(LC5) AS SECUNDARIA,SUM(LC6) AS EBA,SUM(LC7) AS EBE,SUM(LC8) AS ESFA,SUM(LC9) AS IST,SUM(LC10) AS ISP,SUM(LC11) AS CETPRO,SUM(LC12) AS PRONOEI,SUM(LC13) AS E_TEMPRANA,SUM(LC14) AS LUDOTECA,SUM(LC15) AS NEP FROM (
        select REPLACE(replace(co_departamento,'07','15'),'15','LM') as CCDD, REPLACE(replace(no_departamento,'Callao','Lima'),'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8,COALESCE(C9.t,0) as LC9,COALESCE(C10.t,0) as LC10,
        COALESCE(C11.t,0) as LC11,COALESCE(C12.t,0) as LC12,COALESCE(C13.t,0) as LC13,COALESCE(C14.t,0) as LC14,COALESCE(C15.t,0) as LC15  from tabulados_dep TAB               
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local  where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 2 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area ) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
        WHERE co_departamento IN ('15','07') ) AS LIMA_METRO_CALLAO GROUP BY CCDD, DEPARTAMENTO, AREA 
            UNION
        select replace(co_departamento,'15','LP')as CCDD,replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8,COALESCE(C9.t,0) as LC9,COALESCE(C10.t,0) as LC10,
        COALESCE(C11.t,0) as LC11,COALESCE(C12.t,0) as LC12,COALESCE(C13.t,0) as LC13,COALESCE(C14.t,0) as LC14,COALESCE(C15.t,0) as LC15  from tabulados_dep TAB               
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local  where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 2 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area ) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
        where co_departamento = '15' ) as table1  
        order by CCDD, AREA desc;                          
                    ");
    return $q;
}

function get_report_7(){ 
    $q = $this->db->query("
        /* capitulo 6 - 12 - niveles segun OT - DEMOLICION*/ 
        SELECT * FROM (  
        select co_departamento as CCDD, no_departamento AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as TOTAL,COALESCE(C1.t,0) as CUNA,COALESCE(C2.t,0) as JARDIN,COALESCE(C3.t,0) as CUNA_JARDIN,COALESCE(C4.t,0) as PRIMARIA, COALESCE(C5.t,0) as SECUNDARIA,COALESCE(C6.t,0) as EBA,COALESCE(C7.t,0) as EBE,COALESCE(C8.t,0) as ESFA,COALESCE(C9.t,0) as IST,COALESCE(C10.t,0) as ISP,
        COALESCE(C11.t,0) as CETPRO,COALESCE(C12.t,0) as PRONOEI,COALESCE(C13.t,0) as E_TEMPRANA, COALESCE(C14.t,0) as LUDOTECA,COALESCE(C15.t,0) as NEP from tabulados_dep TAB
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area         
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where P7_2_1 = 3 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
            UNION  
        SELECT CCDD, DEPARTAMENTO, AREA, SUM(LC0) AS TOTAL,SUM(LC1) AS CUNA,SUM(LC2) AS JARDIN,SUM(LC3) AS CUNA_JARDIN ,SUM(LC4) AS PRIMARIA,SUM(LC5) AS SECUNDARIA,SUM(LC6) AS EBA,SUM(LC7) AS EBE,SUM(LC8) AS ESFA,SUM(LC9) AS IST,SUM(LC10) AS ISP,SUM(LC11) AS CETPRO,SUM(LC12) AS PRONOEI,SUM(LC13) AS E_TEMPRANA,SUM(LC14) AS LUDOTECA,SUM(LC15) AS NEP FROM (
        select REPLACE(replace(co_departamento,'07','15'),'15','LM') as CCDD, REPLACE(replace(no_departamento,'Callao','Lima'),'LIMA','LIMA METROPOLITANA') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8,COALESCE(C9.t,0) as LC9,COALESCE(C10.t,0) as LC10,
        COALESCE(C11.t,0) as LC11,COALESCE(C12.t,0) as LC12,COALESCE(C13.t,0) as LC13,COALESCE(C14.t,0) as LC14,COALESCE(C15.t,0) as LC15  from tabulados_dep TAB               
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local  where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15','07')  and cod_prov = '01'  and P7_2_1 = 3 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area ) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
        WHERE co_departamento IN ('15','07') ) AS LIMA_METRO_CALLAO GROUP BY CCDD, DEPARTAMENTO, AREA 
            UNION
        select replace(co_departamento,'15','LP')as CCDD,replace(no_departamento,'LIMA','LIMA PROVINCIAS') AS DEPARTAMENTO,fl_area as AREA, COALESCE(C0.t,0) as LC0,COALESCE(C1.t,0) as LC1,COALESCE(C2.t,0) as LC2,COALESCE(C3.t,0) as LC3,COALESCE(C4.t,0) as LC4,COALESCE(C5.t,0) as LC5,COALESCE(C6.t,0) as LC6,COALESCE(C7.t,0) as LC7,COALESCE(C8.t,0) as LC8,COALESCE(C9.t,0) as LC9,COALESCE(C10.t,0) as LC10,
        COALESCE(C11.t,0) as LC11,COALESCE(C12.t,0) as LC12,COALESCE(C13.t,0) as LC13,COALESCE(C14.t,0) as LC14,COALESCE(C15.t,0) as LC15  from tabulados_dep TAB               
        left join (select cod_dpto, des_area, ROUND(COUNT(*)/14,0) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local  where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 group by cod_dpto, des_area) as C0 on TAB.co_departamento = C0.cod_dpto and TAB.fl_area = C0.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 1 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C1 on TAB.co_departamento = C1.cod_dpto and TAB.fl_area = C1.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 2 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C2 on TAB.co_departamento = C2.cod_dpto and TAB.fl_area = C2.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 3 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C3 on TAB.co_departamento = C3.cod_dpto and TAB.fl_area = C3.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 4 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C4 on TAB.co_departamento = C4.cod_dpto and TAB.fl_area = C4.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 5 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C5 on TAB.co_departamento = C5.cod_dpto and TAB.fl_area = C5.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 6 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C6 on TAB.co_departamento = C6.cod_dpto and TAB.fl_area = C6.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 7 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C7 on TAB.co_departamento = C7.cod_dpto and TAB.fl_area = C7.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 8 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C8 on TAB.co_departamento = C8.cod_dpto and TAB.fl_area = C8.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 9 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C9 on TAB.co_departamento = C9.cod_dpto and TAB.fl_area = C9.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 10 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C10 on TAB.co_departamento = C10.cod_dpto and TAB.fl_area = C10.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 11 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C11 on TAB.co_departamento = C11.cod_dpto and TAB.fl_area = C11.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 12 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C12 on TAB.co_departamento = C12.cod_dpto and TAB.fl_area = C12.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 13 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C13 on TAB.co_departamento = C13.cod_dpto and TAB.fl_area = C13.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 14 and P6_1_10_e = 1 group by cod_dpto, des_area ) as C14 on TAB.co_departamento = C14.cod_dpto and TAB.fl_area = C14.des_area
        left join (select cod_dpto, des_area, COUNT(*) t from P6_1_10N p  inner join P7 on p.id_local = P7.id_local and p.Nro_Pred = P7.Nro_Pred and p.Nro_Ed = P7.Nro_Ed  inner join padlocal d on p.id_local = d.codigo_de_local where cod_dpto  in ('15')  and cod_prov <> '01'  and P7_2_1 = 3 and P6_1_10 = 14 and P6_1_10_e = 9 group by cod_dpto, des_area ) as C15 on TAB.co_departamento = C15.cod_dpto and TAB.fl_area = C15.des_area        
        where co_departamento = '15' ) as table1  
        order by CCDD, AREA desc;                 
                    ");
    return $q;
}


function get_report_8(){ 
    $q = $this->db->query("
                    ");
    return $q;
}


function get_report_9(){ 
    $q = $this->db->query("
                    ");
    return $q;
}


function get_report_10(){ 
    $q = $this->db->query("
                    ");
    return $q;
}


function get_report_11(){ 
    $q = $this->db->query("
                    ");
    return $q;
}



}
?>