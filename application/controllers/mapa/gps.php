<?php
class Gps extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		//$this->load->model('convocatoria/Resultados_model');
		//$this->load->model('visor/visor_model');

	}

	public function index(){
		
		$this->load->view('mapa/gps.php');
		
	}

	public function diez(){

		$this->load->view('mapa/gps_diez.php');
	
	}
}

 

