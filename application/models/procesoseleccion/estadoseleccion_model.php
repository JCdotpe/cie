<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadoseleccion_Model extends CI_MODEL{
	
    function contar_datos($condicion1)
    {
        $sql = "SELECT odei FROM v_estadoseleccion $condicion1";
    	$q = $this->db->query($sql);
		return $q;
    }

    function mostrar_datos($ord, $ascdesc, $inicio, $final, $condicion1, $condicion2)
    {
        $sql = "SELECT departamento, provincia, distrito, cargofuncional, (ap_paterno+' '+ap_materno+' '+nombre1+' '+nombre2) as nombrecompleto, dni, ruc, nro_tel, nro_cel, email, nivel, fecharegistro, nestado FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_estadoseleccion $condicion1) a WHERE $condicion2 (a.row > $inicio  and a.row <= $final)";
        //echo $sql;
        $q = $this->db->query($sql);
		return $q;
    }

    function reporte_datos($ord, $ascdesc, $inicio, $final, $condicion1, $condicion2)
    {
        $sql = "SELECT ODEI, ruc, dni, ap_paterno, ap_materno, nombre1, nombre2, estadocivil, sexo, fechanacimiento, departamento_dom, provincia_dom, distrito_dom, direccion, nro_tel, nro_cel, grado, profesion, lugar_estudios, cargofuncional, NEstado FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_estadoseleccion $condicion1) a WHERE $condicion2 (a.row > $inicio and a.row <= $final)";
        $q = $this->db->query($sql);
        return $q;
    }
}