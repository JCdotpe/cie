<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operativa_Model extends CI_Model {

	function Get_DptobyUser($user_id)
	{
		$query="SELECT os.cod_sede_operativa, os.sede_operativa FROM user_ubigeo u left join operativa_sede os on u.cod_sede_operativa = os.cod_sede_operativa WHERE u.id = $user_id ORDER BY os.sede_operativa";
		$q = $this->db->query($query);
		return $q;
	}

	function Get_ProvbySedeOpe($codsede_ope)
	{
		$query="SELECT cod_prov_operativa, prov_operativa_ugel FROM operativa_prov WHERE cod_sede_operativa = '$codsede_ope'";
		$q = $this->db->query($query);
		return $q;
	}

	function Get_DistbySedeProv_Ope($codsede_ope,$codprov_ope)
	{
		$query="SELECT d.CCDI, d.Nombre FROM codigo_territorial ct left join DIST d on ct.CCDD=d.CCDD and ct.CCPP=d.CCPP and ct.CCDI=d.CCDI where cod_sede_operativa = '$codsede_ope' and cod_prov_operativa = '$codprov_ope'";
		$q = $this->db->query($query);
		return $q;
	}

	function get_centro_poblado($codsede_ope, $codprov_ope, $coddist)
	{
		$sql = "SELECT cp.codccpp, cp.nomccpp FROM CCPP_CIE cp inner join codigo_territorial ct on cp.ccdd=ct.CCDD and cp.ccpp=ct.CCPP and cp.ccdi=ct.CCDI WHERE ct.cod_sede_operativa = '$codsede_ope' and ct.cod_prov_operativa = '$codprov_ope' and cp.ccdi='$coddist' ORDER BY cp.nomccpp";
		$q = $this->db->query($sql);
		return $q;
	}

	function get_rutas($centrop)
	{
		$sql = "SELECT DISTINCT r.idruta FROM rutas r inner join Padlocal pl on r.codlocal=pl.codigo_de_local inner join CCPP_CIE cp on pl.CCPP_CIE=cp.codccpp WHERE cp.codccpp = '$centrop' ORDER BY r.idruta";
		$q = $this->db->query($sql);
		return $q;
	}

	function get_periodo($centrop, $ruta)
	{
		$sql = "SELECT distinct r.periodo FROM rutas r inner join Padlocal pl on r.codlocal=pl.codigo_de_local inner join CCPP_CIE cp on pl.CCPP_CIE=cp.codccpp WHERE cp.codccpp = '$centrop' and r.idruta = '$ruta' order by r.periodo";
		$q = $this->db->query($sql);
		return $q;
	}

	function get_odei()
	{
		$sql="SELECT DISTINCT coddepe, detadepen FROM v_Seguimiento_Rpt_ResAvance_CIE_xODEI ORDER BY coddepe, detadepen";
		$q = $this->db->query($sql);
		return $q;
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */