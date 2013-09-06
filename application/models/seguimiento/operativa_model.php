<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operativa_Model extends CI_Model {

	public function get_centro_poblado($depa, $prov, $dist)
	{
		$sql = "SELECT cp.codccpp, cp.nomccpp FROM CCPP_CIE cp WHERE cp.ccdd='$depa' and cp.ccpp='$prov' and cp.ccdi='$dist' ORDER BY cp.nomccpp";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_rutas($centrop)
	{
		$sql = "SELECT DISTINCT r.idruta FROM rutas r inner join Padlocal pl on r.codlocal=pl.codigo_de_local inner join CCPP_CIE cp on pl.CCPP_CIE=cp.codccpp WHERE cp.codccpp = '$centrop' ORDER BY r.idruta";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_periodo($centrop, $ruta)
	{
		$sql = "SELECT distinct r.periodo FROM rutas r inner join Padlocal pl on r.codlocal=pl.codigo_de_local inner join CCPP_CIE cp on pl.CCPP_CIE=cp.codccpp WHERE cp.codccpp = '$centrop' and r.idruta = '$ruta' order by r.periodo";
		echo $sql;
		$q = $this->db->query($sql);
		return $q;
	}

	public function nro_locales_for_seguimiento($condicion1)
	{
		$sql = "SELECT count(codigo_de_local) as NroRegistros FROM v_Seguimiento_avance_CIE $condicion1";
    	$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	public function get_locales_for_seguimiento($ord, $ascdesc, $inicio, $final, $condicion1)
	{
		$sql="SELECT codigo_de_local, estado, entrada_informacion, datos_gps, fotos FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_Seguimiento_avance_CIE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
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
/*
	public function get_avance($data)
	{
		$sql="SELECT nro_visita, convert(char,fecha_visita,103) as fecha_visita, estado, especifique FROM avance WHERE codlocal = '".$data['codlocal']."' and nro_visita = ".$data['nro_visita']."";
		$q = $this->db->query($sql);
		return $q;
	}

	public function del_avance($data)
	{
		$sql="DELETE FROM avance WHERE codlocal = '".$data['codlocal']."' and nro_visita = ".$data['nro_visita']."";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
*/
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */