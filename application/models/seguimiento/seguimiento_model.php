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
		$sql="SELECT periodo, codigo_de_local, estado, entrada_informacion, datos_gps, fotos, foto_ruta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_Seguimiento_avance_CIE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
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
		$sql="INSERT INTO avance (codlocal, nro_visita, fecha_visita, estado, especifique, usu_registra, fecha_registro) VALUES ('".$data['codlocal']."', ".$data['nro_visita'].", '".$data['fecha_visita']."', '".$data['estado']."', '".$data['especifique']."', '".$data['usu_registra']."', getdate())";
		$this->db->query($sql);
		return $this->db->affected_rows() > 0;
	}

	public function cantidad_avances($condicion1)
	{
		$sql = "SELECT count(codlocal) as NroRegistros FROM v_avance $condicion1";
    	$q = $this->db->query($sql);
    	$row = $q->first_row();
		return $row->NroRegistros;
	}

	public function repite_fecha_avance($local, $fecha_visita)
	{
		$sql = "SELECT COUNT(codlocal) as Cantidad_Registros FROM v_avance WHERE codlocal = '$local' and fecha_visita = '$fecha_visita'";
    	$q = $this->db->query($sql);
    	$row = $q->first_row();
		return $row->Cantidad_Registros;
	}	

	public function get_locales_for_avance($ord, $ascdesc, $inicio, $final, $condicion1)
	{
		$sql="SELECT codlocal, nro_visita, NEstado, convert(char,fecha_visita,103) as fecha_visita FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_avance $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		$q=$this->db->query($sql);
		return $q; 
	}

	public function get_cantidad_for_odei($condicion1, $todos)
	{
		if ($todos == "SI")
		{
			$sql = "SELECT COUNT(detadepen) as Cantidad_Registros FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI_TotPer";
		}else{
			$sql = "SELECT COUNT(detadepen) as Cantidad_Registros FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI $condicion1";
		}
    	$q = $this->db->query($sql);
    	$row = $q->first_row();
		return $row->Cantidad_Registros;
	}

	public function get_seguimiento_for_odei($ord, $ascdesc, $inicio, $final, $condicion1, $todos)
	{
		if ($todos == "SI")
		{
			$sql="SELECT detadepen, LocEscolares, LocEscolar_Censado, LocEscolar_Censado_Porc, Completa, Completa_Porc, Incompleta, Incompleta_Porc, Rechazo, Rechazo_Porc, Desocupada, Desocupada_Porc, Otro, Otro_Porc FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI_TotPer) a WHERE a.row > $inicio and a.row <= $final";
		}else{
			$sql="SELECT detadepen, LocEscolares, LocEscolar_Censado, LocEscolar_Censado_Porc, Completa, Completa_Porc, Incompleta, Incompleta_Porc, Rechazo, Rechazo_Porc, Desocupada, Desocupada_Porc, Otro, Otro_Porc FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		}
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

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */