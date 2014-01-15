<?php
class Resultados extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('my');
		$this->load->model('mapa/ubigeo_model');

		$this->load->library('session');
	}

	public function index(){

		$data['user_id'] = $this->session->userdata('user_id');

		$this->load->view('mapa/resultados_gps.php', $data);

	}

	public function dpto()
	{
		$data = $this->ubigeo_model->Get_Dpto();
		echo json_encode($data->result());
	}
	
	public function prov()
	{
		$data = $this->ubigeo_model->Get_Prov($this->input->get('ccdd'));
		echo json_encode($data->result());
	}

	public function dist()
	{
		$dpto = $this->input->get('ccdd');
		$prov = $this->input->get('ccpp');
		$data = $this->ubigeo_model->Get_Dist($dpto, $prov);
		echo json_encode($data->result());
	}

	public function busqueda()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$ot = $this->input->get('opt');
		$data = $this->ubigeo_model->Get_Busqueda( $dpto, $prov, $dist, $ot );
		echo json_encode($data->result());
	}

}