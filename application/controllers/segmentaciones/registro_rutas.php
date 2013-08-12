<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_Rutas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
		$this->load->model('segmentaciones/rutas_model');
		$this->load->model('segmentaciones/operativa_model');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 9){
				$flag = TRUE;
				break;
			}
		}

		
		if (!$flag) {
			show_404();
			die();
		}
		
	}

	public function index()
	{
		$data['option'] = 1;
		$data['nav'] = TRUE;
		$data['title'] = 'Rutas';				
		$data['main_content'] = 'segmentaciones/rutas_view';

		$data['sedeoperativa'] = $this->operativa_model->get_sede_operativa();
		
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovoperativa()
	{	
		$provope = $this->operativa_model->get_provincia_operativa($_POST['codsede']);
		$provArray = array();
		foreach($provope->result() as $filas)
		{
			$provArray[$filas->cod_prov_operativa]=utf8_encode(strtoupper($filas->prov_operativa_ugel));
		}
		echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa"');		
	}

	public function consulta_ubicacion()
	{
		$codigo = $this->input->post('local');
		$sede = $this->input->post('sede');
		$provope = $this->input->post('provope');
		
		$resultado = $this->rutas_model->get_direccion_local($codigo, $sede, $provope);
		if($resultado->num_rows() > 0)
		{
			foreach ($resultado->result() as $row)
			{
				$data['codigo_de_local'] = $row->codigo_de_local;
				$data['nombre_dpto'] = utf8_encode($row->nombre_dpto);
				$data['nombre_provincia'] = utf8_encode($row->nombre_provincia);
				$data['nombre_distrito'] = utf8_encode($row->nombre_distrito);
				$data['centro_poblado'] = utf8_encode($row->centropoblado);
			}
		}else{
			$data['codigo_de_local'] = "";
			$data['nombre_dpto'] = "";
			$data['nombre_provincia'] = "";
			$data['nombre_distrito'] = "";
			$data['centro_poblado'] = "";
		}

		$resulta = $this->rutas_model->get_local($codigo);
		if($resulta->num_rows() > 0)
		{
			foreach ($resulta->result() as $fila)
			{
				$data['cantidad'] = $fila->idtabla;
			}
		}else{
			$data['cantidad'] = "0";
		}

		$jsonData = json_encode($data);
		echo $jsonData;
	}


	public function registro()
	{
		$c_data = array(
				//'jefebrigada'=> $this->input->post('jefebrigada'),
				'idruta'=> $this->input->post('codruta'),
				'codlocal'=> $this->input->post('ecodlocal'),
				'fxinicio'=> $this->input->post('fxinicio'),
				'fxfinal'=> $this->input->post('fxfinal'),
				'traslado'=> $this->input->post('traslado'),
				'trabajo_supervisor'=> $this->input->post('trabajo_supervisor'),
				'recuperacion'=> $this->input->post('recuperacion'),
				'retornosede'=> $this->input->post('retornosede'),
				'gabinete'=> $this->input->post('gabinete'),
				'descanso'=> $this->input->post('descanso'),
				'totaldias'=> $this->input->post('totaldias'),
				'movilocal_ma'=> $this->input->post('movilocal_ma'),
				'gastooperativo_ma'=> $this->input->post('gastooperativo_ma'),
				'movilocal_af'=> $this->input->post('movilocal_af'),
				'gastooperativo_af'=> $this->input->post('gastooperativo_af'),
				'pasaje'=> $this->input->post('pasaje'),
				'total_af'=> $this->input->post('total_af'),
				'observaciones'=> utf8_decode($this->input->post('observaciones'))
			);

		$jb_data = array(
			'idruta'=> $this->input->post('codruta'),	
			'codlocal'=> $this->input->post('ecodlocal'),
			'cod_jefebrigada' => $this->input->post('jefebrigada')
			);
		
		$flag = $this->rutas_model->insert_reg($c_data);
		$flag = $this->rutas_model->insert_reg_jb($jb_data);

		if(!$flag)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}
	}

	public function ver_datos()
	{		

		$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
		$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
		$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
		$sord = $this->input->get('sord',TRUE);  // Almacena el modo de ordenación


		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');			
		}else{ $sede = "-1"; }
		$cond1 = "cod_sede_operativa = '$sede'";

		if(isset($_GET['codprov'])) { 
			$provope = $this->input->get('codprov');			
		}else{ $provope = "-1"; }
		$cond2 = "cod_prov_operativa = '$provope'";

		$where = "WHERE ".$cond1." AND ".$cond2;

		if(!$sidx) $sidx =1;
		$count = $this->rutas_model->contar_datos($where);
		
		 //En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->rutas_model->mostrar_datos($sidx, $sord, $row_inicio, $row_final, $where);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		foreach ($resultado->result() as $fila )
		{
			$respuesta->rows[$i]['id'] = $fila->id;
			$respuesta->rows[$i]['cell'] = array(utf8_encode($fila->centroPoblado),utf8_encode($fila->prov_operativa_ugel),$fila->codlocal,$fila->fxinicio,$fila->fxfinal,$fila->traslado,$fila->trabajo_supervisor,$fila->recuperacion,$fila->retornosede,$fila->gabinete,$fila->descanso,$fila->totaldias,$fila->movilocal_ma,$fila->gastooperativo_ma,$fila->movilocal_af,$fila->gastooperativo_af,$fila->pasaje,$fila->total_af,utf8_encode($fila->observaciones),$fila->idruta);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}


	public function Buscar_Grilla()
	{		

		$page = $this->input->get('page',TRUE);
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		if(isset($_GET['codigolocal'])) { 
			$codlocal = $this->input->get('codigolocal');			
		}else{ $codlocal = ""; }
		$cond1 = "codlocal = '$codlocal'";

		$where = "WHERE ".$cond1;

		if(!$sidx) $sidx =1;
		$count = $this->rutas_model->contar_datos($where);
		
		 //En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->rutas_model->mostrar_datos($sidx, $sord, $row_inicio, $row_final, $where);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		foreach ($resultado->result() as $fila )
		{
			$respuesta->rows[$i]['id'] = $fila->id;
			$respuesta->rows[$i]['cell'] = array(utf8_encode($fila->centroPoblado),utf8_encode($fila->prov_operativa_ugel),$fila->codlocal,$fila->fxinicio,$fila->fxfinal,$fila->traslado,$fila->trabajo_supervisor,$fila->recuperacion,$fila->retornosede,$fila->gabinete,$fila->descanso,$fila->totaldias,$fila->movilocal_ma,$fila->gastooperativo_ma,$fila->movilocal_af,$fila->gastooperativo_af,$fila->pasaje,$fila->total_af,utf8_encode($fila->observaciones),$fila->idruta);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

	public function eliminar()
	{
		$codigo = $this->input->post('id');
		
		$flag = $this->rutas_model->delete_reg($codigo);
		if (!$flag)
		{
			$show = 'Error al Eliminar. Recargue la Pagina y Vuelva a Intentarlo';
		}else{
			$show = 'Datos Elimninados Satisfactoriamente.';
		}

		$data = array('mensaje' => $show );

		$jsonData = json_encode($data);
		echo $jsonData;
	}
}

