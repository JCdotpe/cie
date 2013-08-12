<?php
class Convocatoria_model extends CI_MODEL{


    function Get_Convocatoria(){
    	$q = $this->db->query("select * from v_Convocatoria WHERE estado=1");

    	return $q;
    }

    function contar_datos($vista, $condicion1)
    {
        $sql = "SELECT count(codigo_adm) AS NroRegistros FROM $vista $condicion1";
    	//echo $sql;
        $q = $this->db->query($sql);
        foreach ($q->result() as $row)
        {
            $NroRegistros = $row->NroRegistros;
        }
		return $NroRegistros;
    }

    function mostrar_datos($ord, $ascdesc, $inicio, $final, $condicion1, $vista)
    {
        $sql = "SELECT codigo_adm, meta_insc, meta_capa, meta_con, inscritos, CV_calificado, CV_aprobado, Asistente_Capacitacion, Aprobado_Capacitacion, Titular, departamento, provincia, odei FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM $vista $condicion1) a WHERE (a.row > $inicio and a.row <= $final)";
        //echo $sql;
    	$q = $this->db->query($sql);
		return $q;
    }
}