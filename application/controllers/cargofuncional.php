<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargofuncional extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('administracion/cargo_funcional');
	}

	public function index()
	{
		show_404();
	}

	public function Find_cargo_funcional()
	{
		$data['datos'] = $this->cargo_funcional->Get_Cargo_Funcional();
		$cadena="<select>";
		$cadena.="<option value=>---</option>";
		foreach ($data['datos']->result() as $filas) {
			# code...
			$cadena.="<option value=".trim($filas->codigo_cf).">".trim(utf8_encode($filas->nombre_cf))."</option>";
		}
		$cadena.="</select>";
		echo $cadena;
	}

}