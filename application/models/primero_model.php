<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Primero_Model extends CI_Model {

	public function get_local($codigo)
	{
		$this->db->where('codlocal',$codigo);
		$q = $this->db->get('rutas');
		return $q;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */