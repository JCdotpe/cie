<?php
class Resultados extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('my');
		$this->load->model('mapa/ubigeo_model');
		$this->load->model('mapa/resultados_model');

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

	public function opinion_tecnica()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data = $this->resultados_model->Get_OpinionTecnica_Lima( $dpto, $tiparea, $ot );
		}else{
			$data = $this->resultados_model->Get_OpinionTecnica( $dpto, $prov, $dist, $tiparea, $ot );
		}

		echo json_encode($data->result());
	}

	public function detalle_ot()
	{
		$codigo = $this->input->get('codigo');
		$data = $this->resultados_model->Get_Detalle_OT( $codigo );
		echo json_encode($data->result());
	}

	public function defensa_civil()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$df = $this->input->get('df');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data = $this->resultados_model->Get_OpinionTecnica_Lima( $dpto, $tiparea, $ot );
		}else{
			$data = $this->resultados_model->Get_DefensaCivil( $dpto, $prov, $dist, $tiparea, $df );
		}

		echo json_encode($data->result());
	}

}