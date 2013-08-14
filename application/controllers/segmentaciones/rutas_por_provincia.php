<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rutas_por_provincia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 3){
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
		$this->load->model('segmentaciones/operativa_model');
		$this->load->model('segmentaciones/rutas_model');
		
		$data['option'] = 2;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Rutas por Provincia Operativa';
		$data['main_content'] = 'informes/rutasprovincia_view';

		$data['sedeoperativa'] = $this->operativa_model->get_sede_operativa();		
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovoperativa()
	{
		$this->load->model('segmentaciones/operativa_model');
		$this->load->helper('form');
		$provope = $this->operativa_model->get_provincia_operativa($_POST['codsede']);
		$provArray = array();
		foreach($provope->result() as $filas)
		{
			$provArray[$filas->cod_prov_operativa]=utf8_encode(strtoupper($filas->prov_operativa_ugel));
		}
		echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa"');		
	}


	public function obtenreporte()
	{
		$this->load->helper('form');
		$this->load->model('segmentaciones/rutas_model');

		$page = $this->input->get('page',TRUE);
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";
		
		$where1 = "";

		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
			if ($sede != -1) { 
				$cond1 = "cod_sede_operativa = '$sede'";
			}
		}else{ $sede = ""; 
			$cond1 = "cod_sede_operativa = '-1'"; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond2 = "cod_prov_operativa = '$prov'";
			}
		}else{ $prov = ""; 
			$cond2 = "cod_prov_operativa = '-1'"; }
		
		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			$cond3 = "idruta = '$ruta'";
		}else{ $ruta = ""; 
			$cond3 = "idruta = ''";}
		
		if(!$sidx) $sidx =1;

		$where1 =  "WHERE ".$cond1." AND ".$cond2." AND ".$cond3;
		$count = $this->rutas_model->contar_datos($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->rutas_model->report_rutasprovincia($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_filas = $row_inicio;
		foreach ($resultado->result() as $fila )
		{
			$nro_filas++;
			$respuesta->rows[$i]['id'] = $fila->codlocal;
			$respuesta->rows[$i]['cell'] = array($nro_filas,utf8_encode($fila->NomDept),utf8_encode($fila->NomProv),utf8_encode($fila->NomDist),utf8_encode($fila->centroPoblado),$fila->codlocal,utf8_encode($fila->sede_operativa),utf8_encode($fila->prov_operativa_ugel),$fila->fxinicio,$fila->fxfinal,$fila->traslado,$fila->trabajo_supervisor,$fila->recuperacion,$fila->retornosede,$fila->gabinete,$fila->descanso,$fila->totaldias,$fila->movilocal_ma,$fila->gastooperativo_ma,$fila->movilocal_af,$fila->gastooperativo_af,$fila->pasaje,$fila->total_af,utf8_encode($fila->observaciones),$fila->idruta);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */