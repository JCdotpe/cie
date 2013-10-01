<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visor extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		//$this->load->model('convocatoria/Resultados_model');
		$this->load->model('visor/visor_model');
		$this->load->helper('my');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

	}

	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Seguimiento';
			$code="-1";
			//$data['datos']	= $this->Resultados_model->Get_Resultados($code);

			$this->load->model('convocatoria/Dpto_model');
			$data['depa'] = $this->Dpto_model->Get_Dpto();

			$data['main_content'] = 'visor/visor_view';
	        $this->load->view('backend/includes/template', $data);
	}

//=====================BASICAS==============================


	


	public function obtenerregion()
	{
		$this->load->model('visor/visor_model');
		$this->load->helper('form');
		$prov = $this->visor_model->Get_Ruta($_REQUEST['cod_dpto'],$_REQUEST['cod_prov']);
		$provArray = array();
		foreach($prov->result() as $filas)
		{
			$provArray[$filas->idruta]=utf8_encode(strtoupper($filas->idruta));
		}
		echo form_dropdown('region', $provArray, '#', 'id="region"');
	}

//===============UTILS====================




	public function get_PadLocal(){

		header_json();

		$data = $this->visor_model->Data_PadLocal(no_obfuscate($_REQUEST["cod_local"]));

		$jsonData = json_encode($data->result());

		prettyPrint($jsonData);

	}



}
?>