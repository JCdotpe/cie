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

		// $datos = $this->resultados_model->Get_OpinionTecnica( 0, 0, 0, 0, 0 );
		// $fp = fopen('json/opinion_tecnica.json', 'w');
		// fwrite($fp, json_encode($datos->result()));
		// fclose($fp);
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

	public function getphoto()
	{
		$ftp = ftp_connect("jc.pe");
		ftp_login($ftp, "jcpuntope", "cie@2013");


		$cod = $this->input->get('cod');
		$pred = $this->input->get('pred');


		$files = ftp_nlist($ftp, 'jc.pe/portafolio/cie2013/img/'.$cod.'/PRED_'.$pred.'/CAP3');
		
		if(ftp_nlist($ftp, 'jc.pe/portafolio/cie2013/img/'.$cod.'/PRED_'.$pred.'/CAP3')){
			// $datos['FILES'] = $files;
			$filecount = count($files);
		}else{
			$filecount = 0;
		}

		$datos['nro_files'] = $filecount;
		ftp_close($ftp);

		if ( $filecount > 0 ) {
			$arr_file = explode("/", $files[0]);
			$pos = count($arr_file);
			$name_img = $arr_file[$pos - 1];
		}else{
			$name_img = '';
		}

		$datos['name_img'] = $name_img;

		$data['datos'] = $datos;

		$this->load->view('backend/json/json_view', $data);
	}

	public function opinion_tecnica()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$datos = $this->resultados_model->Get_OpinionTecnica_Lima( $dpto, $tiparea, $ot );
		}else{
			$datos = $this->resultados_model->Get_OpinionTecnica( $dpto, $prov, $dist, $tiparea, $ot );
		}

		$this->convert_uft8_array($datos);
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
			$datos = $this->resultados_model->Get_DefensaCivil_Lima( $dpto, $tiparea, $df );
		}else{
			$datos = $this->resultados_model->Get_DefensaCivil( $dpto, $prov, $dist, $tiparea, $df );
		}

		$this->convert_uft8_array($datos);
	}

	public function alto_riesgo()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ar = $this->input->get('ar');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$datos = $this->resultados_model->Get_AltoRiesgo_Lima( $dpto, $tiparea, $ar );
		}else{
			$datos = $this->resultados_model->Get_AltoRiesgo( $dpto, $prov, $dist, $tiparea, $ar );
		}

		$this->convert_uft8_array($datos);
	}

	public function patrimonio_cultural()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$pc = $this->input->get('pc');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$datos = $this->resultados_model->Get_PatrimCultural_Lima( $dpto, $tiparea, $pc );
		}else{
			$datos = $this->resultados_model->Get_PatrimCultural( $dpto, $prov, $dist, $tiparea, $pc );
		}

		$this->convert_uft8_array($datos);
	}

	public function obras_ejecucion()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$oj = $this->input->get('oj');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$datos = $this->resultados_model->Get_ObrasEjecucion_Lima( $dpto, $tiparea, $oj );
		}else{
			$datos = $this->resultados_model->Get_ObrasEjecucion( $dpto, $prov, $dist, $tiparea, $oj );
		}

		$this->convert_uft8_array($datos);
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
			$datos = $this->resultados_model->Get_Servicios_Lima( $dpto, $tiparea, $ee, $ag, $alc );
		}else{
			$datos = $this->resultados_model->Get_Servicios( $dpto, $prov, $dist, $tiparea, $ee, $ag, $alc );
		}

		$this->convert_uft8_array($datos);
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
			$datos = $this->resultados_model->Get_Comunicacion_Lima( $dpto, $tiparea, $tf, $tm, $inter );
		}else{
			$datos = $this->resultados_model->Get_Comunicacion( $dpto, $prov, $dist, $tiparea, $tf, $tm, $inter );
		}

		$this->convert_uft8_array($datos);
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
			$datos = $this->resultados_model->Get_Vulnerabilidad_Lima( $dpto, $tiparea, $v1, $v2, $v3, $v4, $v5, $v6, $v7 );
		}else{
			$datos = $this->resultados_model->Get_Vulnerabilidad( $dpto, $prov, $dist, $tiparea, $v1, $v2, $v3, $v4, $v5, $v6, $v7 );
		}

		$this->convert_uft8_array($datos);
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
			$datos = $this->resultados_model->Get_NivelEducativo_Lima( $dpto, $tiparea, $ne, $ot );
		}else{
			$datos = $this->resultados_model->Get_NivelEducativo( $dpto, $prov, $dist, $tiparea, $ne, $ot );
		}

		$this->convert_uft8_array($datos);
	}

	public function algoritmo_edificacion()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$datos = $this->resultados_model->Get_AlgoritmoEdificacion_Lima( $dpto, $tiparea, $ot );
		}else{
			$datos = $this->resultados_model->Get_AlgoritmoEdificacion( $dpto, $prov, $dist, $tiparea, $ot );
		}

		$this->convert_uft8_array($datos);
	}

	public function algoritmo_aulas()
	{
		$dpto = $this->input->get('dpto');
		$prov = $this->input->get('prov');
		$dist = $this->input->get('dist');
		$tiparea = $this->input->get('area');
		$ot = $this->input->get('opt');
		
		if ( $dpto == '1501' || $dpto == '1502' ) {
			$datos = $this->resultados_model->Get_AlgoritmoAulas_Lima( $dpto, $tiparea, $ot );
		}else{
			$datos = $this->resultados_model->Get_AlgoritmoAulas( $dpto, $prov, $dist, $tiparea, $ot );
		}

		$this->convert_uft8_array($datos);
	}

	function convert_uft8_array($datos)
	{
		$data['datos'] = array();
		foreach ($datos->result_array() as $row) {
			array_push($data['datos'], array_map('utf8_encode', $row));
		}
		$this->load->view('backend/json/json_view', $data);
	}

}