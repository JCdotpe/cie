<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividadpresupuestal extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('administracion/actividad_presupuestal');
	}

	public function index()
	{
		show_404();
	}

	public function Find_actividad_presupuestal()
	{
		$data['datos'] = $this->actividad_presupuestal->Get_Actividad_Presupuestal();
		$cadena="<select>";
		$cadena.="<option value=>---</option>";
		foreach ($data['datos']->result() as $filas) {
			# code...
			$cadena.="<option value=".trim($filas->codigo_ap).">".trim(utf8_encode($filas->nombre_ap))."</option>";
		}
		$cadena.="</select>";
		echo $cadena;
	}

}