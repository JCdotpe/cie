<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Respuestas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('session');

		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Provincia_model');
		$this->load->model('convocatoria/Dist_model');
		$this->load->model('bpr/operativa_model');
		$this->load->model('bpr/bpr_model');
		/*
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 10){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}
		*/
	}

	public function index()
	{		
		$this->load->model('convocatoria/Cargo_funcional_vista');

		$data['nav'] = TRUE;
		$data['title'] = 'BPR - Preguntas';
		$data['main_content'] = 'bpr/respuestas_view';
		$data['user_id'] = $this->session->userdata('user_id');
		$data['depa'] = $this->Dpto_model->Get_Dpto();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia()
	{
		$prov = $this->Provincia_model->get_provs($_POST['id_dpto']);
		$return_arr['datos']=array();
		foreach($prov->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCPP;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function obtenerdistrito()
	{
		$dist = $this->Dist_model->Get_Dist_combo($_POST['id_depa'],$_POST['id_prov']);
		$return_arr['datos']=array();
		foreach($dist->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCDI;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenercapitulo()
	{
		$cap = $this->operativa_model->Get_Capitulo();
		$return_arr['datos']=array();
		foreach($cap->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_cap;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->descripcion));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenerseccion()
	{
		$sec = $this->operativa_model->Get_Seccion($_POST['id_cap']);
		$return_arr['datos']=array();
		foreach($sec->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_sec;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->descripcion));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenerpregunta()
	{
		$pre = $this->operativa_model->Get_Pregunta($_POST['id_cap'],$_POST['id_sec']);
		$return_arr['datos']=array();
		foreach($pre->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_preg;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->descripcion));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function registro()
	{
		$c_data = array(
				'id_cuestionario'=> $this->input->post('codigo'),
				'id_respuesta'=> $this->bpr_model->get_nro_respuesta(),
				'id_usuario'=> $this->input->post('usuario'),
				'respuesta'=> utf8_decode($this->input->post('respuesta'))
			);

		$flag = $this->bpr_model->insert_reg_respuesta($c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}
	}

	public function lista_consultas()
	{
		$this->load->model('bpr/bpr_model');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE); 
		$sidx = $this->input->get('sidx',TRUE);  
		$sord = $this->input->get('sord',TRUE); 

		$where1="WHERE CCDD='-1'";

		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
			$where1="WHERE CCDD='$depa'";
		}

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			$where1="WHERE CCDD='$depa' AND CCPP='$prov'";
		}

		if(isset($_GET['coddis'])) { 
			$dist = $this->input->get('coddis');
			$where1="WHERE CCDD='$depa' AND CCPP='$prov' AND CCDI='$dist'";
		}
		
		if(isset($_GET['codcargo'])) { 
			$cargo = $this->input->get('codcargo');
			$where1="WHERE CCDD='$depa' AND CCPP='$prov' AND CCDI='$dist' AND cargo='$cargo'";
		}

		if(isset($_GET['codcap'])) { 
			$cap = $this->input->get('codcap');
			$where1="WHERE CCDD='$depa' AND CCPP='$prov' AND CCDI='$dist' AND cargo='$cargo' AND cod_cap='$cap'";
		}

		if(isset($_GET['codsec'])) { 
			$sec = $this->input->get('codsec');
			$where1="WHERE CCDD='$depa' AND CCPP='$prov' AND CCDI='$dist' AND cargo='$cargo' AND cod_cap='$cap' AND cod_sec='$sec'";
		}

		if(isset($_GET['codpre'])) { 
			$preg = $this->input->get('codpre');
			$where1="WHERE CCDD='$depa' AND CCPP='$prov' AND CCDI='$dist' AND cargo='$cargo' AND cod_cap='$cap' AND cod_sec='$sec' AND cod_preg='$preg'";
		}

		if(!$sidx) $sidx =1;
		$count = $this->bpr_model->contar_datos($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->bpr_model->mostrar_datos($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila )
		{
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $fila->id_cuestionario;
			$respuesta->rows[$i]['cell'] = array($nro_fila,utf8_encode($fila->desc_capitulo),utf8_encode($fila->desc_seccion),utf8_encode($fila->desc_pregunta),utf8_encode($fila->consulta));
			$i++;		
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

	public function buscardetalle()
	{
		$resultado = $this->bpr_model->get_detalle_pregunta($_POST['codigo']);
		$return_arr['datos']=array();
		foreach($resultado->result() as $filas)
		{
			$data['desc_capitulo'] = utf8_encode($filas->desc_capitulo);
			$data['desc_seccion'] = utf8_encode($filas->desc_seccion);
			$data['desc_pregunta'] = utf8_encode($filas->desc_pregunta);
			$data['consulta'] = utf8_encode($filas->consulta);
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */