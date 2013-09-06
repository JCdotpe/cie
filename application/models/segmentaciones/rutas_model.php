<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rutas_Model extends CI_Model {

	public function get_local($codigo)
	{
		$sql = "SELECT idtabla FROM rutas WHERE codlocal = '$codigo'";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_direccion_local($codigo,$sede,$provope)
	{
		$sql = "SELECT pl.codigo_de_local, dp.Nombre as nombre_dpto, pr.Nombre as nombre_provincia, ds.Nombre as  nombre_distrito, pl.centropoblado FROM Padlocal pl inner join DPTO dp on pl.cod_dpto = dp.CCDD inner join PROV pr on pl.cod_dpto = pr.CCDD and pl.cod_prov = pr.CCPP inner join DIST ds on pl.cod_dpto = ds.CCDD and pl.cod_prov = ds.CCPP and pl.cod_dist = ds.CCDI inner join Codigo_territorial ct on pl.cod_ubigeo = ct.UBIGEO inner join Operativa_Sede os on ct.COD_SEDE_OPERATIVA = os.cod_sede_operativa inner join Operativa_Prov op on ct.COD_SEDE_OPERATIVA = op.cod_sede_operativa and ct.COD_PROV_OPERATIVA = op.cod_prov_operativa WHERE pl.codigo_de_local = '$codigo' and os.cod_sede_operativa = '$sede' and op.cod_prov_operativa = '$provope'";
        $q = $this->db->query($sql);
        return $q;
	}

	public function get_info_jefebrigada($codigo,$jefebrigada)
	{
		$sql = "SELECT codigo_de_local, nombre_dpto, nombre_provincia, nombre_distrito, centropoblado, fxinicio_jb, fxfinal_jb, traslado_jb, trabajo_supervisor_jb, retornosede_jb, gabinete_jb, descanso_jb, totaldias_jb, movilocal_ma_jb, gastooperativo_ma_jb, movilocal_af_jb, gastooperativo_af_jb, pasaje_jb, total_af_jb, observaciones_jb FROM v_info_jefebrigada WHERE codigo_de_local = '$codigo' AND cod_jefebrigada = '$jefebrigada'";
		$q = $this->db->query($sql);
		return $q;
	}

	function insert_reg($data){
		$this->db->insert('rutas', $data);
		return $this->db->affected_rows() > 0;
	}

	function insert_reg_jb($data)
	{
		$this->db->insert('rutas_jb', $data);
		return $this->db->affected_rows() > 0;	
	}

	function update_reg_jb($data)
	{
		$sql = "UPDATE rutas_jb SET periodo_jb = '".$data['periodo']."', fxinicio_jb = '".$data['fxinicio']."', fxfinal_jb = '".$data['fxfinal']."', traslado_jb = '".$data['traslado']."', trabajo_supervisor_jb = '".$data['trabajo_supervisor']."', retornosede_jb = '".$data['retornosede']."', gabinete_jb = '".$data['gabinete']."', descanso_jb = '".$data['descanso']."', totaldias_jb = '".$data['totaldias']."',movilocal_ma_jb = '".$data['movilocal_ma']."', gastooperativo_ma_jb = '".$data['gastooperativo_ma']."', movilocal_af_jb = '".$data['movilocal_af']."', gastooperativo_af_jb = '".$data['gastooperativo_af']."', pasaje_jb = '".$data['pasaje']."', total_af_jb = '".$data['total_af']."', observaciones_jb = '".str_replace("'", "''", $data['observaciones'])."' WHERE codlocal = '".$data['codlocal']."'";
		$this->db->query($sql);
		return $this->db->affected_rows() > 0;			
	}

	function delete_reg($codigo)
    {   
    	$sql = "DELETE FROM rutas_jb WHERE idruta = (SELECT idruta FROM rutas WHERE idtabla = '$codigo') AND codlocal = (SELECT codlocal FROM rutas WHERE idtabla = '$codigo')";
    	$this->db->query($sql);

    	$sql2 = "DELETE FROM rutas WHERE idtabla = '$codigo'";
    	$this->db->query($sql2);
		
		return $this->db->affected_rows() > 0;
    }

    function delete_reg_jb($codigo)
	{
		$sql = "UPDATE rutas_jb SET periodo_jb = null, fxinicio_jb = null, fxfinal_jb = null, traslado_jb = null, trabajo_supervisor_jb = null, retornosede_jb = null, gabinete_jb = null, descanso_jb = null, totaldias_jb = null,movilocal_ma_jb = null, gastooperativo_ma_jb = null, movilocal_af_jb = null, gastooperativo_af_jb = null, pasaje_jb = null, total_af_jb = null, observaciones_jb = null WHERE idtabla = '$codigo'";
		//echo $sql;
		$this->db->query($sql);
		return $this->db->affected_rows() > 0;	
	}

    function contar_datos($condicion1)
    {
    	$sql = "SELECT count(idtabla) AS NroRegistros FROM v_rutas_locales $condicion1";
    	$q = $this->db->query($sql);
    	foreach ($q->result() as $row)
		{
			$NroRegistros = $row->NroRegistros;			
		}
		return $NroRegistros;
    }

    function contar_datos_jb($condicion1)
    {
    	$sql = "SELECT count(idruta) AS NroRegistros FROM v_info_Jefebrigada $condicion1";
    	$q = $this->db->query($sql);
    	foreach ($q->result() as $row)
		{
			$NroRegistros = $row->NroRegistros;			
		}
		return $NroRegistros;
    }

    function mostrar_datos($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT idtabla as id, idruta, codlocal, centroPoblado, prov_operativa_ugel, periodo, fxinicio, fxfinal, traslado, trabajo_supervisor, recuperacion, retornosede, gabinete, descanso, totaldias, movilocal_ma, gastooperativo_ma, movilocal_af, gastooperativo_af, pasaje, total_af, observaciones FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_rutas_locales $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	//echo $sql;
    	$q = $this->db->query($sql);		
		return $q;
    }

    function mostrar_datos_jb($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT idtabla, idruta, codigo_de_local, centroPoblado, prov_operativa_ugel, periodo_jb, fxinicio_jb, fxfinal_jb, traslado_jb, trabajo_supervisor_jb, retornosede_jb, gabinete_jb, descanso_jb, totaldias_jb, movilocal_ma_jb, gastooperativo_ma_jb, movilocal_af_jb, gastooperativo_af_jb, pasaje_jb, total_af_jb, observaciones_jb FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_info_jefebrigada $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	//echo $sql;
    	$q = $this->db->query($sql);		
		return $q;
    }
	
	function report_evaluador($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT NomDept, NomProv, NomDist, centroPoblado, codlocal, sede_operativa, prov_operativa_ugel, cod_jefebrigada, periodo, fxinicio, fxfinal, rtrim(traslado) as traslado, rtrim(trabajo_supervisor) as trabajo_supervisor, rtrim(recuperacion) as recuperacion, rtrim(retornosede) as retornosede, rtrim(gabinete) as gabinete, rtrim(descanso) as descanso, rtrim(totaldias) as totaldias, rtrim(movilocal_ma) as movilocal_ma, rtrim(gastooperativo_ma) as gastooperativo_ma, rtrim(movilocal_af) as movilocal_af, rtrim(gastooperativo_af) as gastooperativo_af, rtrim(pasaje) as pasaje, rtrim(total_af) as total_af, observaciones, idruta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_rutas_locales $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	$q = $this->db->query($sql);
		return $q;
	}	    

	function report_jefebrigada($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT nombre_dpto, nombre_provincia, nombre_distrito, centroPoblado, codigo_de_local, sede_operativa, prov_operativa_ugel, cod_jefebrigada, periodo_jb, fxinicio_jb, fxfinal_jb, rtrim(traslado_jb) as traslado_jb, rtrim(trabajo_supervisor_jb) as trabajo_supervisor_jb, rtrim(retornosede_jb) as retornosede_jb, rtrim(gabinete_jb) as gabinete_jb, rtrim(descanso_jb) as descanso_jb, rtrim(totaldias_jb) as totaldias_jb, rtrim(movilocal_ma_jb) as movilocal_ma_jb, rtrim(gastooperativo_ma_jb) as gastooperativo_ma_jb, rtrim(movilocal_af_jb) as movilocal_af_jb, rtrim(gastooperativo_af_jb) as gastooperativo_af_jb, rtrim(pasaje_jb) as pasaje_jb, rtrim(total_af_jb) as total_af_jb, observaciones_jb, idruta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_info_jefebrigada $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	$q = $this->db->query($sql);
		return $q;
	}	    

	function listado_rutas($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT idruta, codlocal, cod_jefebrigada, NomDept, NomProv, NomDist, centroPoblado, nombres_IIEE, sede_operativa, prov_operativa_ugel, direccion, niveles_educativos, ugel, periodo, area FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_rutas_locales_nivelE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	$q = $this->db->query($sql);		
		return $q;
	}

	function local_sin_ruta($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT NomDept, NomProv, NomDist, centroPoblado, sede_operativa, prov_operativa_ugel, codigo_de_local, direccion FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_ruta_local_no_asignado $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	$q = $this->db->query($sql);		
		return $q;
	}

	function contar_datos_sinruta($condicion1)
    {
    	$sql = "SELECT codigo_de_local FROM v_ruta_local_no_asignado $condicion1";
    	$q = $this->db->query($sql);
		return $q;
    }

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */