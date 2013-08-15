<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aprobacioncv extends CI_Controller {

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
			if($role->role_id == 12){
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
		$this->load->model('convocatoria/Cargo_funcional_vista');
		
		$data['option'] = 2;
		$data['nav'] = TRUE;
		$data['title'] = 'Aprobacion de CV';
		$data['main_content'] = 'seleccion/aprobacioncv_view';
		$data['user_id'] = $this->session->userdata('user_id');

		$data['depa'] = $this->Dpto_model->Get_DptobyUser($data['user_id']);
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
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
		echo form_dropdown('provincia', $provArray, '#', 'id="provincia"');	
	}

	public function registrar_aprobadoscv()
	{
		$this->load->model('procesoseleccion/procesoseleccion_model');

		$codigo = $this->input->post('codigo_registro');
		$seleccion = $this->input->post('seleccion');
		$user = $this->input->post('user');

		$affect = $this->procesoseleccion_model->regs_aprobadoscv($codigo,$seleccion,$user);

		if($affect>0)
		{
			$show = 'Datos Grabados Satisfactoriamente.';
		}else{
			$show = 'Error de Servidor, Cierre la ventana y vuelva a ingresar.';
		}

		$jsonData = json_encode($show);
		echo $jsonData;
	}

	public function obtenreporte()
	{
		$this->load->helper('form');
		$this->load->model('procesoseleccion/procesoseleccion_model');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE); 
		$sidx = $this->input->get('sidx',TRUE);  
		$sord = $this->input->get('sord',TRUE); 

		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
		}else { $depa = -1; }
		$cond1 = "cod_dep = '$depa' AND ";

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
		}else{ $prov = -1; }
		$cond2 = "cod_prov = '$prov' AND ";	

		if(isset($_GET['codadm'])) { 
			$adm = $this->input->get('codadm');
		}else{ $adm = -1; }
		$cond3 = "codigo_adm = '$adm' AND ";
		
		if(isset($_GET['codconvo'])) { 
			$convo = $this->input->get('codconvo');
		}else{ $convo = -1; }
		$cond4 = "codigo_convocatoria = '$convo' AND ";

		if(isset($_GET['codpresu'])) { 
			$presu = $this->input->get('codpresu');
		}else{ $presu = -1; }
		$cond5 = "codigo_credpresupuestario = '$presu' AND ";

		$cond6 = "(estado >= '1')";

		$where1 = "WHERE ".$cond1.$cond2.$cond3.$cond4.$cond5.$cond6;

		if(!$sidx) $sidx =1;
		$count = $this->procesoseleccion_model->contar_datos($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->procesoseleccion_model->mostrar_datos($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila )
		{
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $fila->id;
			$respuesta->rows[$i]['cell'] = array($nro_fila,$fila->estado,$fila->estado,utf8_encode($fila->departamento),utf8_encode($fila->provincia),utf8_encode($fila->nombrecompleto),$fila->dni,$fila->ruc,$fila->nivel,utf8_encode($fila->profesion),$fila->fecha_registro);
			$i++;		
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */