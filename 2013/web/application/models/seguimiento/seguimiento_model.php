<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento_Model extends CI_Model {

	public function nro_locales_for_seguimiento($condicion1)
	{
		$sql = "SELECT count(codigo_de_local) as NroRegistros FROM v_Seguimiento_avance_CIE $condicion1";
    	$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	public function get_locales_for_seguimiento($ord, $ascdesc, $inicio, $final, $condicion1)
	{
		$sql="SELECT periodo, codigo_de_local, estado, entrada_informacion, datos_gps, foto_ruta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_Seguimiento_avance_CIE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_nro_visitas($codlocal)
	{
		$sql="SELECT isnull(max(nro_visita),0) + 1 as nro_visita FROM avance WHERE codlocal = '$codlocal'";
		$q=$this->db->query($sql);
		$row = $q->first_row();
		return $row->nro_visita;
	}

	public function insert_avance($data)
	{
		$sql="INSERT INTO avance (codlocal, nro_visita, fecha_visita, estado, especifique, usu_registra, fecha_registro) VALUES ('".$data['codlocal']."', ".$data['nro_visita'].", '".$data['fecha_visita']."', '".$data['estado']."', '".str_replace("'", "''",$data['especifique'])."', '".$data['usu_registra']."', getdate())";
		$this->db->query($sql);
		return $this->db->affected_rows() > 0;
	}

	public function get_nro_detalle($codlocal)
	{
		$sql="SELECT isnull(max(nro_det),0) + 1 as nro_det FROM avance_docuCIE WHERE codlocal = '$codlocal'";
		$q=$this->db->query($sql);
		$row = $q->first_row();
		return $row->nro_det;
	}

	public function insert_detalle($data)
	{
		$sql="INSERT INTO avance_docuCIE (codlocal, nro_det, cedula, cantidad, fecha_avance, usu_registra, fecha_registro) VALUES ('".$data['codlocal']."', ".$data['nro_det'].", '".$data['cedula']."', '".$data['cantidad']."', '".$data['fecha_avance']."', '".$data['usu_registra']."', getdate())";
		//echo $sql;
		$this->db->query($sql);
		return $this->db->affected_rows() > 0;
	}

	// public function repite_fecha_avance($local, $fecha_visita)
	// {
	// 	$sql = "SELECT COUNT(codlocal) as Cantidad_Registros FROM v_avance WHERE codlocal = '$local' and fecha_visita = convert(date,'$fecha_visita',103)";
 //    	$q = $this->db->query($sql);
 //    	$row = $q->first_row();
	// 	return $row->Cantidad_Registros;
	// }	

	public function cantidad_avances($condicion1)
	{
		$sql = "SELECT count(codlocal) as NroRegistros FROM v_avance $condicion1";
		$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	public function get_locales_for_avance($ord, $ascdesc, $inicio, $final, $condicion1)
	{
		$sql="SELECT codlocal, nro_visita, NEstado, convert(char,fecha_visita,103) as fecha_visita, convert(char,fecha_registro,103) as Fecha_Registro, convert(char,fecha_registro,108) as Hora_Registro FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_avance $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		$q=$this->db->query($sql);
		return $q;
	}

	public function cantidad_detalles($condicion1)
	{
		$sql = "SELECT count(codlocal) as NroRegistros FROM avance_docuCIE $condicion1";
		$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	public function get_locales_for_detalle($ord, $ascdesc, $inicio, $final, $condicion1)
	{
		$sql="SELECT codlocal, nro_det, cedula, cantidad, convert(char,fecha_avance,103) as fecha_avance, convert(char,fecha_registro,103) as Fecha_Registro, convert(char,fecha_registro,108) as Hora_Registro FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM avance_docuCIE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_cruce_odei($periodo)
	{
		$sql="SELECT detadepen, LocEscolares, LocEscolar_Censado, LocEscolar_Censado_Porc, Completa, Completa_Porc, Incompleta, Incompleta_Porc, Rechazo, Rechazo_Porc, Desocupada, Desocupada_Porc, Otro, Otro_Porc FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI WHERE periodo = $periodo ORDER BY detadepen";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_cruce_odei_total()
	{
		$sql="SELECT detadepen, LocEscolares, LocEscolar_Censado, LocEscolar_Censado_Porc, Completa, Completa_Porc, Incompleta, Incompleta_Porc, Rechazo, Rechazo_Porc, Desocupada, Desocupada_Porc, Otro, Otro_Porc FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI_TotPer ORDER BY detadepen";
		$q = $this->db->query($sql);
		return $q;
	}

	function get_existelocal($codigo_de_local)
	{
		$sql = "SELECT COUNT(id_local) as Cantidad_Registros FROM fotos_detalle_cie WHERE id_local = '$codigo_de_local'";

		$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->Cantidad_Registros;
	}

	function insert_detalle_foto($data)
	{
		if ($data['repositorio']==1)
		{
			$query="UPDATE fotos_detalle_cie set repositorio = '".$data['repositorio']."', observaciones = '".$data['observaciones']."', fecha_ftp = getdate() WHERE id_local = '".$data['id_local']."'";
		}else{
			$query="UPDATE fotos_detalle_cie set repositorio = '".$data['repositorio']."', observaciones = '".$data['observaciones']."', fecha_storage = getdate() WHERE id_local = '".$data['id_local']."'";
		}

		$this->db->query($query);
		return $this->db->affected_rows();
	}

	public function get_avance_odei($periodo)
	{
		$sql="SELECT detadepen, LocEscolares, LocEscolar_Censado, LocEscolar_Censado_Porc, Completa, Completa_Porc, Incompleta, Incompleta_Porc, Rechazo, Rechazo_Porc, Desocupada, Desocupada_Porc, Otro, Otro_Porc FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI_Avance WHERE periodo = $periodo ORDER BY detadepen";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_avance_odei_total()
	{
		$sql="SELECT detadepen, LocEscolares, LocEscolar_Censado, LocEscolar_Censado_Porc, Completa, Completa_Porc, Incompleta, Incompleta_Porc, Rechazo, Rechazo_Porc, Desocupada, Desocupada_Porc, Otro, Otro_Porc FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI_Avance_Tot ORDER BY detadepen";
		$q = $this->db->query($sql);

		return $q;
	}

	function get_avance_ubigeo($cod_depa,$cod_prov,$periodo1,$periodo2,$tipo)
	{
		$q=$this->db->query("Seguimiento_Ubigeo ?, ?, ?, ?, ?", array($cod_depa,$cod_prov,$periodo1,$periodo2,$tipo));
		return $q;
	}

	function get_ubigeo_cedula($cod_depa,$cod_prov,$periodo,$tipo)
	{
		$q=$this->db->query("Seguimiento_Ubigeo_Cedula ?, ?, ?, ?", array($cod_depa,$cod_prov,$periodo,$tipo));
		return $q;
	}
		function get_avance_odeiST($vsede,$cod_prov,$periodo,$periodo1,$periodo2)
	{
		$q=$this->db->query("sp_AvanceSedeProv ?, ?, ?, ?, ?", array($vsede,$cod_prov,$periodo,$periodo1,$periodo2));

		//echo $q;

		return $q;
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */