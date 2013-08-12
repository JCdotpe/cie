<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convocatoria extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('convocatoria/convocatoria_model');

	}
	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria';
			$data['datos']	= $this->convocatoria_model->Get_Convocatoria();

			$data['main_content'] = 'convocatoria/inscripcion_view';
	        $this->load->view('backend/includes/template', $data);
	}
}
