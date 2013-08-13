<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operativa_Model extends CI_Model {

	public function get_sede_operativa()
	{
		$sql = "SELECT cod_sede_operativa, sede_operativa FROM Operativa_Sede";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_provincia_operativa($codigo)
	{
		$sql = "SELECT cod_prov_operativa, prov_operativa_ugel FROM operativa_prov WHERE cod_sede_operativa='$codigo'";
		$q = $this->db->query($sql);
		return $q;
	}

	public function get_jefe_brigada($id_sedeope, $id_provope)
	{
		$sql = "SELECT cod_jefebrigada FROM v_sede_op_jefebrigada WHERE COD_SEDE_OPERATIVA = '$id_sedeope' AND COD_PROV_OPERATIVA = '$id_provope' ORDER BY cod_jefebrigada ASC";
		$q = $this->db->query($sql);
		return $q;
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */