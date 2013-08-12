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
        //echo $sql;
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

	function delete_reg($codigo)
    {   
    	$sql = "DELETE FROM rutas_jb WHERE idruta = (SELECT idruta FROM rutas WHERE idtabla = '$codigo') AND codlocal = (SELECT codlocal FROM rutas WHERE idtabla = '$codigo')";
    	$this->db->query($sql);

    	$sql2 = "DELETE FROM rutas WHERE idtabla = '$codigo'";
    	$this->db->query($sql2);
		
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

    function mostrar_datos($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT idtabla as id, idruta, codlocal, centroPoblado, prov_operativa_ugel, fxinicio, fxfinal, traslado, trabajo_supervisor, recuperacion, retornosede, gabinete, descanso, totaldias, movilocal_ma, gastooperativo_ma, movilocal_af, gastooperativo_af, pasaje, total_af, observaciones FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_rutas_locales $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	//echo $sql;
    	$q = $this->db->query($sql);		
		return $q;
    }
	
	function report_rutasprovincia($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT NomDept, NomProv, NomDist, centroPoblado, codlocal, sede_operativa, prov_operativa_ugel, fxinicio, fxfinal, traslado, trabajo_supervisor, recuperacion, retornosede, gabinete, descanso, totaldias, movilocal_ma, gastooperativo_ma, movilocal_af, gastooperativo_af, pasaje, total_af, observaciones, idruta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_rutas_locales $condicion1) a WHERE a.row > $inicio and a.row <= $final";
    	$q = $this->db->query($sql);
		return $q;
	}	    

	function listado_rutas($ord, $ascdesc, $inicio, $final, $condicion1)
    {
    	$sql = "SELECT idruta, codlocal, NomDept, NomProv, NomDist, centroPoblado, sede_operativa, prov_operativa_ugel, direccion, Nivel_Educativo, ugel, area FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_rutas_locales_nivelE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
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