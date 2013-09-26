<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procesoseleccion_Model extends CI_MODEL{
	
    function contar_datos($condicion1)
    {
        $sql = "SELECT count(id) AS NroRegistros FROM v_procesoseleccion $condicion1";
    	$q = $this->db->query($sql);
		foreach ($q->result() as $row)
        {
            $NroRegistros = $row->NroRegistros;
        }
        return $NroRegistros;
    }

    function mostrar_datos($ord, $ascdesc, $inicio, $final, $condicion1)
    {
        $sql = "SELECT id, departamento, provincia, (ap_paterno+' '+ap_materno+' '+nombre1+' '+nombre2) as nombrecompleto, dni, ruc, nivel, profesion, convert(char,fecha_registro,103) as fecha_registro, estado, codigo_adm, CapaSistema FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_procesoseleccion $condicion1) a WHERE (a.row > $inicio  and a.row <= $final)";
        //echo $sql;
        $q = $this->db->query($sql);
		return $q;
    }

    function codigos_cargo($codigo)
    {
        $sql = "SELECT codigo_Convocatoria, codigo_CredPresupuestario, codigo_adm FROM v_convocatoria WHERE codigo_adm = $codigo";
        //echo $sql;
        $q = $this->db->query($sql);
        return $q;
    }

    function cambiar_cargo($adm, $cred, $convo, $user, $codigo)
    {
        $sql = "UPDATE registro SET codigo_adm = $adm, codigo_CredPresupuestario = $cred, codigo_Convocatoria = $convo, fecha_cambio_cargo = getdate(), usuario_cambio_cargo = $user WHERE id = $codigo";
         //echo $sql;
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function regs_aprobadoscv($codigo,$seleccion,$user)
    {
        $sql = "UPDATE registro SET estado = $seleccion, fecha_aprobcv = getdate(), usuario_aprobcv = $user WHERE id = $codigo";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function regs_capacitados($codigo,$seleccion,$user)
    {
        $sql = "UPDATE registro SET estado = $seleccion, fecha_capa = getdate(), usuario_capa = $user WHERE id = $codigo";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function regs_seleccionpea($codigo,$seleccion,$user)
    {
        $sql = "UPDATE registro SET estado = $seleccion, fecha_selecpea = getdate(), usuario_selecpea = $user WHERE id = $codigo";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function reporte_datos($ord, $ascdesc, $inicio, $final, $condicion1)
    {
        $sql = "SELECT ODEI, ruc, dni, ap_paterno, ap_materno, nombre1, nombre2, estadocivil, sexo, fechanacimiento, departamento_dom, provincia_dom, distrito_dom, direccion, nro_tel, nro_cel, grado, profesion, lugar_estudios, cargofuncional, NEstado FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_procesoseleccion $condicion1) a WHERE (a.row > $inicio and a.row <= $final)";
        $q = $this->db->query($sql);
        return $q;
    }
}