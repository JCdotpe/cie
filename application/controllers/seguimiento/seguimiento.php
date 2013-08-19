<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('session');

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 11){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}
	}

	public function index()
	{
		$this->load->model('convocatoria/Dpto_model');

		$data['nav'] = TRUE;
		$data['title'] = 'Seguimiento';
		$data['main_content'] = 'Seguimiento/seguimiento_view';
		$data['user_id'] = $this->session->userdata('user_id');

		$data['depa'] = $this->Dpto_model->Get_DptobyUser($data['user_id']);
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia_by_sede()
	{
		$this->load->model('convocatoria/Provincia_model');
		$sedeope = $this->Provincia_model->Get_ProvbySedeOpe($_POST['id_sede'],$_POST['id_dpto']);
		$provArray = array();
		foreach($sedeope->result() as $filas)
		{
			$provArray[$filas->CCPP]=utf8_encode(strtoupper($filas->Nombre_Provincia));
		}
		echo form_dropdown('provincia', $provArray, '#', 'id="provincia" onChange="cargarDist();"');	
	}

	public function obtenerdistrito()
	{
		$this->load->model('convocatoria/Dist_model');
		$dist = $this->Dist_model->Get_Dist_combo($_POST['id_depa'],$_POST['id_prov']);
		$distArray = array();
		foreach($dist->result() as $filas)
		{
			$distArray[$filas->CCDI]=utf8_encode(strtoupper($filas->Nombre));
		}
		echo form_dropdown('distrito', $distArray, '', 'id="distrito"');
	}

	public function obtenercentropoblado()
	{
		$this->load->model('Seguimiento/operativa_model');
		$centrop = $this->operativa_model->get_centro_poblado($_POST['id_depa'],$_POST['id_prov'],$_POST['id_dist']);
		$centropArray = array();
		foreach($centrop->result() as $filas)
		{
			$centropArray[$filas->codccpp]=utf8_encode(strtoupper($filas->nomccpp));
		}
		echo form_dropdown('centropoblado', $centropArray, '', 'id="centropoblado"');
	}

	public function obtenerrutas()
	{
		$this->load->model('Seguimiento/operativa_model');
		$rutas = $this->operativa_model->get_rutas($_POST['id_cp']);
		$rutasArray = array();
		foreach($rutas->result() as $filas)
		{
			$rutasArray[$filas->idruta]=$filas->idruta;
		}
		echo form_dropdown('rutas', $rutasArray, '', 'id="rutas"');
	}

	public function obtenerperiodo()
	{
		$this->load->model('Seguimiento/operativa_model');
		$periodo = $this->operativa_model->get_periodo($_POST['id_cp'], $_POST['id_ruta']);
		$periodoArray = array();
		foreach($periodo->result() as $filas)
		{
			$periodoArray[$filas->periodo]=$filas->periodo;
		}
		echo form_dropdown('periodo', $periodoArray, '', 'id="periodo"');
	}

	public function ver_datos()
	{
		$this->load->helper('form');
		$this->load->model('Seguimiento/operativa_model');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
		}else{ $depa = "-1"; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
		}else{ $prov = "-1"; }
		
		if(isset($_GET['coddist'])) { 
			$dist = $this->input->get('coddist');
		}else{ $dist = "-1"; }

		if(isset($_GET['codcentrop'])) { 
			$centrop = $this->input->get('codcentrop');
		}else{ $centrop = "-1"; }

		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
		}else{ $ruta = "-1"; }

		if(isset($_GET['nroperiodo'])) { 
			$periodo = $this->input->get('nroperiodo');
		}else{ $periodo = "-1"; }

		$where1 = "WHERE CCDD='$depa' and CCPP='$prov' and CCDI='$dist' and codccpp='$centrop' and idruta = '$ruta' and periodo = '$periodo'";

		if(!$sidx) $sidx =1;

		$count = $this->operativa_model->nro_locales_for_seguimiento($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->operativa_model->get_locales_for_seguimiento($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila)
		{
			$nro_fila++;
			$estado="";
			$entrada_info="";
			$gps="";
			$fotos="";
			$entrevista="";
			$respuesta->rows[$i]['id'] = $fila->codigo_de_local;			
			$respuesta->rows[$i]['cell'] = array($nro_fila,$fila->codigo_de_local, $estado, $entrada_info, $gps, $fotos, $entrevista);
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */