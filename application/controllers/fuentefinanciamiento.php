<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuentefinanciamiento extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('administracion/fuente_financiamiento');
	}

	public function index()
	{
		show_404();
	}

	public function Find_fuente_financiamiento()
	{
		$data['datos'] = $this->fuente_financiamiento->Get_Fuente_Financiamiento();
		$cadena="<select>";
		$cadena.="<option value=>---</option>";
		foreach ($data['datos']->result() as $filas) {
			# code...
			$cadena.="<option value=".trim($filas->codigo_ff).">".trim(utf8_encode($filas->nombre_ff))."</option>";
		}
		$cadena.="</select>";
		echo $cadena;
	}

}