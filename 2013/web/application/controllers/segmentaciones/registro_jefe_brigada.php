<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_Jefe_Brigada extends CI_Controller {

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
			if($role->role_id == 3){
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
		$data['nav'] = TRUE;
		$data['title'] = 'Jefe de Brigada';				
		$data['main_content'] = 'segmentaciones/jefe_brigada_view';

		$data['sedeoperativa'] = $this->operativa_model->get_sede_operativa();
		
		$this->load->view('backend/includes/template', $data);
	}

	public function cargar_jefe_brigada()
	{	
		$jefebrigada = $this->operativa_model->get_jefe_brigada($_POST['sedeope'],$_POST['provope']);
		$return_arr['datos']=array();
		foreach($jefebrigada->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_jefebrigada;
			$data['NOMBRE'] = $filas->cod_jefebrigada;
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function consulta_datos()
	{
		$codigo = $this->input->post('local');
		$jb = $this->input->post('jefe');
		$resultado = $this->rutas_model->get_info_jefebrigada($codigo, $jb);
		
		if ($resultado->num_rows() > 0)
		{
			foreach ($resultado->result() as $row)
			{
				$data['codigo_de_local'] = $row->codigo_de_local;
				$data['nombre_dpto'] = utf8_encode($row->nombre_dpto);
				$data['nombre_provincia'] = utf8_encode($row->nombre_provincia);
				$data['nombre_distrito'] = utf8_encode($row->nombre_distrito);
				$data['centro_poblado'] = utf8_encode($row->centropoblado);
				$data['fxinicio_jb'] = trim($row->fxinicio_jb);
				$data['fxfinal_jb'] = trim($row->fxfinal_jb);
				$data['traslado'] = trim($row->traslado_jb);
				$data['trabajo_supervisor_jb'] = trim($row->trabajo_supervisor_jb);
				$data['retornosede_jb'] = trim($row->retornosede_jb);
				$data['gabinete_jb'] = trim($row->gabinete_jb);
				$data['descanso_jb'] = trim($row->descanso_jb);
				$data['totaldias_jb'] = trim($row->totaldias_jb);
				$data['movilocal_ma_jb'] = trim($row->movilocal_ma_jb);
				$data['gastooperativo_ma_jb'] = trim($row->gastooperativo_ma_jb);
				$data['movilocal_af_jb'] = trim($row->movilocal_af_jb);
				$data['gastooperativo_af_jb'] = trim($row->gastooperativo_af_jb);
				$data['pasaje_jb'] = trim($row->pasaje_jb);
				$data['total_af_jb'] = trim($row->total_af_jb);
				$data['observaciones_jb'] = trim($row->observaciones_jb);
				$data['cantidad'] = 1;
			}	
		}else{
			$data['cantidad'] = 0;
		}

		$jsonData = json_encode($data);
		echo $jsonData;
	}


	public function registro()
	{
		$jb_data = array(
				'codlocal'=> $this->input->post('ecodlocal'),
				'periodo'=> $this->input->post('periodo'),
				'fxinicio'=> $this->input->post('fxinicio'),
				'fxfinal'=> $this->input->post('fxfinal'),
				'traslado'=> $this->input->post('traslado'),
				'trabajo_supervisor'=> $this->input->post('trabajo_supervisor'),
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

		$flag = $this->rutas_model->update_reg_jb($jb_data);

		if(!$flag)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}
	}

	public function ver_datos()
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

		$resultado = $this->rutas_model->mostrar_datos_jb($sidx, $sord, $row_inicio, $row_final, $where);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		foreach ($resultado->result() as $fila )
		{
			$respuesta->rows[$i]['id'] = $fila->idtabla;
			$respuesta->rows[$i]['cell'] = array(utf8_encode($fila->centroPoblado),utf8_encode($fila->prov_operativa_ugel),$fila->codigo_de_local,$fila->periodo_jb,$fila->fxinicio_jb,$fila->fxfinal_jb,$fila->traslado_jb,$fila->trabajo_supervisor_jb,$fila->retornosede_jb,$fila->gabinete_jb,$fila->descanso_jb,$fila->totaldias_jb,$fila->movilocal_ma_jb,$fila->gastooperativo_ma_jb,$fila->movilocal_af_jb,$fila->gastooperativo_af_jb,$fila->pasaje_jb,$fila->total_af_jb,utf8_encode($fila->observaciones_jb),$fila->idruta);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

	public function eliminar()
	{
		$codigo = $this->input->post('id');
		$flag = $this->rutas_model->delete_reg_jb($codigo);
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


	public function Buscar_Grilla_JB()
	{		

		$page = $this->input->get('page',TRUE);
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		if(isset($_GET['codigolocal'])) { 
			$codlocal = $this->input->get('codigolocal');			
		}else{ $codlocal = ""; }
		$cond1 = "codigo_de_local = '$codlocal'";

		$where = "WHERE ".$cond1;

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

		$resultado = $this->rutas_model->mostrar_datos_jb($sidx, $sord, $row_inicio, $row_final, $where);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		foreach ($resultado->result() as $fila )
		{
			$respuesta->rows[$i]['id'] = $fila->idtabla;
			$respuesta->rows[$i]['cell'] = array(utf8_encode($fila->centroPoblado),utf8_encode($fila->prov_operativa_ugel),$fila->codigo_de_local,$fila->periodo_jb,$fila->fxinicio_jb,$fila->fxfinal_jb,$fila->traslado_jb,$fila->trabajo_supervisor_jb,$fila->retornosede_jb,$fila->gabinete_jb,$fila->descanso_jb,$fila->totaldias_jb,$fila->movilocal_ma_jb,$fila->gastooperativo_ma_jb,$fila->movilocal_af_jb,$fila->gastooperativo_af_jb,$fila->pasaje_jb,$fila->total_af_jb,utf8_encode($fila->observaciones_jb),$fila->idruta);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}
}