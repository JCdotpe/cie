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
			$data['datos'] = $this->resultados_model->Get_OpinionTecnica_Lima( $dpto, $tiparea, $ot )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_OpinionTecnica( $dpto, $prov, $dist, $tiparea, $ot )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function detalle_ot()
	{
		$codigo = $this->input->get('codigo');
		$data['datos'] = $this->resultados_model->Get_Detalle_OT( $codigo )->result();
		$this->load->view('backend/json/json_view', $data);
	}

	public function defensa_civil()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$df = $this->input->get('df');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_DefensaCivil_Lima( $dpto, $tiparea, $df )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_DefensaCivil( $dpto, $prov, $dist, $tiparea, $df )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function alto_riesgo()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ar = $this->input->get('ar');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_AltoRiesgo_Lima( $dpto, $tiparea, $ar )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_AltoRiesgo( $dpto, $prov, $dist, $tiparea, $ar )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function patrimonio_cultural()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$pc = $this->input->get('pc');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_PatrimCultural_Lima( $dpto, $tiparea, $pc )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_PatrimCultural( $dpto, $prov, $dist, $tiparea, $pc )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function obras_ejecucion()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$oj = $this->input->get('oj');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_ObrasEjecucion_Lima( $dpto, $tiparea, $oj )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_ObrasEjecucion( $dpto, $prov, $dist, $tiparea, $oj )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}


	public function servicios()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ee = $this->input->get('ee');
		$ag = $this->input->get('ag');
		$alc = $this->input->get('alc');

		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_Servicios_Lima( $dpto, $tiparea, $ee, $ag, $alc )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_Servicios( $dpto, $prov, $dist, $tiparea, $ee, $ag, $alc )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function comunicacion()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$tf = $this->input->get('tf');
		$tm = $this->input->get('tm');
		$inter = $this->input->get('inter');

		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_Comunicacion_Lima( $dpto, $tiparea, $tf, $tm, $inter )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_Comunicacion( $dpto, $prov, $dist, $tiparea, $tf, $tm, $inter )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function vulnerabilidad()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$v1 = $this->input->get('v1');
		$v2 = $this->input->get('v2');
		$v3 = $this->input->get('v3');
		$v4 = $this->input->get('v4');
		$v5 = $this->input->get('v5');
		$v6 = $this->input->get('v6');
		$v7 = $this->input->get('v7');

		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_Vulnerabilidad_Lima( $dpto, $tiparea, $v1, $v2, $v3, $v4, $v5, $v6, $v7 )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_Vulnerabilidad( $dpto, $prov, $dist, $tiparea, $v1, $v2, $v3, $v4, $v5, $v6, $v7 )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function nivel_educativo()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ne = $this->input->get('ne');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_NivelEducativo_Lima( $dpto, $tiparea, $ne, $ot )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_NivelEducativo( $dpto, $prov, $dist, $tiparea, $ne, $ot )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function algoritmo_edificacion()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_AlgoritmoEdificacion_Lima( $dpto, $tiparea, $ot )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_AlgoritmoEdificacion( $dpto, $prov, $dist, $tiparea, $ot )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

	public function algoritmo_aulas()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$data['datos'] = $this->resultados_model->Get_AlgoritmoAulas_Lima( $dpto, $tiparea, $ot )->result();
		}else{
			$data['datos'] = $this->resultados_model->Get_AlgoritmoAulas( $dpto, $prov, $dist, $tiparea, $ot )->result();
		}

		$this->load->view('backend/json/json_view', $data);
	}

}