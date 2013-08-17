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
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */