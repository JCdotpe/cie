<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operativa_Model extends CI_Model {

	function Get_SedeOpe()
	{
		$query="SELECT os.cod_sede_operativa, os.sede_operativa FROM user_ubigeo u left join operativa_sede os on u.cod_sede_operativa = os.cod_sede_operativa ORDER BY os.sede_operativa";
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

	function Get_Cedula()
	{
		$query="SELECT DISTINCT cedula FROM BPR_Capitulo ORDER BY cedula";
		$q = $this->db->query($query);
		return $q;
	}

	function Get_Capitulo($codced)
	{
		$query="SELECT cod_cap, descripcion FROM BPR_Capitulo WHERE cedula = '$codced' ORDER BY cod_cap";
		$q = $this->db->query($query);
		return $q;
	}

	function Get_Seccion($codcap)
	{
		$query="SELECT cod_sec, descripcion FROM BPR_Seccion WHERE cod_cap = '$codcap' ORDER BY cod_sec";
		$q = $this->db->query($query);
		return $q;
	}
	 
	function Get_Pregunta($codcap,$codsec)
	{
		$query="SELECT cod_cap, cod_sec, cod_preg, descripcion FROM BPR_Pregunta WHERE cod_cap = '$codcap' and cod_sec = '$codsec' ORDER BY cod_preg";
		$q = $this->db->query($query);
		return $q;
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */