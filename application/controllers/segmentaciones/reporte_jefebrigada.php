<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_jefebrigada extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	

		$this->load->helper('form');
		$this->load->model('segmentaciones/operativa_model');
		$this->load->model('segmentaciones/rutas_model');

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
		$data['option'] = 3;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Jefe de Brigada';
		$data['main_content'] = 'informes/reporte_jefebrigada_view';

		$data['sedeoperativa'] = $this->operativa_model->get_sede_operativa();		
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenreporte()
	{
		$page = $this->input->get('page',TRUE);
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);


		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');			
		}else{ $sede = "-1"; }
		$cond1 = "cod_sede_operativa = '$sede'";

		if(isset($_GET['codprov'])) { 
			$provope = $this->input->get('codprov');			
		}else{ $provope = "-1"; }
		$cond2 = "cod_prov_operativa = '$provope'";

		if(isset($_GET['codjb'])) { 
			$jefeb = $this->input->get('codjb');			
		}else{ $jefeb = ""; }
		$cond3 = "cod_jefebrigada = '$jefeb'";

		$where = "WHERE fxinicio_jb is not null AND ".$cond1." AND ".$cond2." AND ".$cond3;
		
		if(!$sidx) $sidx =1;
		$count = $this->rutas_model->contar_datos_jb($where);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->rutas_model->report_jefebrigada($sidx, $sord, $row_inicio, $row_final, $where);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_filas = $row_inicio;
		foreach ($resultado->result() as $fila )
		{
			$nro_filas++;
			$respuesta->rows[$i]['id'] = $fila->codigo_de_local;
			$respuesta->rows[$i]['cell'] = array($nro_filas,utf8_encode($fila->nombre_dpto),utf8_encode($fila->nombre_provincia),utf8_encode($fila->nombre_distrito),utf8_encode($fila->centroPoblado),$fila->codigo_de_local,utf8_encode($fila->sede_operativa),utf8_encode($fila->prov_operativa_ugel),$fila->fxinicio_jb,$fila->fxfinal_jb,$fila->traslado_jb,$fila->trabajo_supervisor_jb,$fila->retornosede_jb,$fila->gabinete_jb,$fila->descanso_jb,$fila->totaldias_jb,$fila->movilocal_ma_jb,$fila->gastooperativo_ma_jb,$fila->movilocal_af_jb,$fila->gastooperativo_af_jb,$fila->pasaje_jb,$fila->total_af_jb,utf8_encode($fila->observaciones_jb),$fila->idruta);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */