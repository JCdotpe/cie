<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operativa_Model extends CI_Model {

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