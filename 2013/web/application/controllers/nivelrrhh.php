<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nivelrrhh extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('administracion/nivel_rrhh');
	}

	public function index()
	{
		show_404();
	}

	public function Find_nivel_rrhh()
	{
		$data['datos'] = $this->nivel_rrhh->Get_Nivel_rrhh();
		$cadena="<select>";
		$cadena.="<option value=>---</option>";
		foreach ($data['datos']->result() as $filas) {
			# code...
			$cadena.="<option value=".trim($filas->codigo_nrrhh).">".trim(utf8_encode($filas->nombre_rrhh))."</option>";
		}
		$cadena.="</select>";
		echo $cadena;
	}

}