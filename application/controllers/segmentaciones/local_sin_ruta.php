<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local_sin_ruta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 11 && $role->rolename == 'Informes Segmentacion'){
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
		
		$data['option'] = 4;
		$data['nav'] = TRUE;
		$data['title'] = 'Listado de Rutas por Provincia Operativa';
		$data['main_content'] = 'informes/localsinruta_view';

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

		$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
		$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
		$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
		$sord = $this->input->get('sord',TRUE);  // Almacena el modo de ordenación

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

		$where1 =  "WHERE ".$cond1." AND ".$cond2;
		if(!$sidx) $sidx =1;

		$resultado = $this->rutas_model->contar_datos_sinruta($where1);
		$count = $resultado->num_rows();

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->rutas_model->local_sin_ruta($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila=$row_inicio;
		foreach ($resultado->result() as $fila )
		{			
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $fila->codigo_de_local;
			$respuesta->rows[$i]['cell'] = array($nro_fila,utf8_encode($fila->NomDept),utf8_encode($fila->NomProv),utf8_encode($fila->NomDist),utf8_encode($fila->centroPoblado),$fila->codigo_de_local,utf8_encode($fila->sede_operativa),utf8_encode($fila->prov_operativa_ugel),utf8_encode($fila->direccion));
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */