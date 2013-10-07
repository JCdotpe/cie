<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_Seguimiento extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('session');
		$this->load->model('seguimiento/operativa_model');
		$this->load->model('seguimiento/seguimiento_model');
		
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
		$data['nav'] = TRUE;
		$data['title'] = 'Seguimiento';
		$data['main_content'] = 'seguimiento/seguimiento_view';
		$data['user_id'] = $this->session->userdata('user_id');

		$data['depa'] = $this->operativa_model->Get_SedebyUser($data['user_id']);
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia_by_sede()
	{
		$sedeope = $this->operativa_model->Get_ProvbySedeOpe($_POST['id_sede']);
		$return_arr['datos']=array();
		foreach($sedeope->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_prov_operativa;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->prov_operativa_ugel));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);		
	}

	public function obtenerdistrito()
	{
		$dist = $this->operativa_model->Get_DistbySedeProv_Ope($_POST['id_sede'],$_POST['id_prov']);
		$return_arr['datos']=array();
		foreach($dist->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCDI;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenercentropoblado()
	{
		$centrop = $this->operativa_model->get_centro_poblado($_POST['id_sede'],$_POST['id_prov'],$_POST['id_dist']);
		$return_arr['datos']=array();
		foreach($centrop->result() as $filas)
		{
			$data['CODIGO'] = $filas->codccpp;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->nomccpp));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenerrutas()
	{
		$rutas = $this->operativa_model->get_rutas($_POST['id_sede'],$_POST['id_prov'],$_POST['id_dist'],$_POST['id_cp']);
		$return_arr['datos']=array();
		foreach($rutas->result() as $filas)
		{
			$data['CODIGO'] = $filas->idruta;
			$data['NOMBRE'] = $filas->idruta;
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function obtenerperiodo()
	{
		$periodo = $this->operativa_model->get_periodo($_POST['id_sede'],$_POST['id_prov'],$_POST['id_dist'],$_POST['id_cp'], $_POST['id_ruta']);
		$return_arr['datos']=array();
		foreach($periodo->result() as $filas)
		{
			$data['CODIGO'] = $filas->periodo;
			$data['NOMBRE'] = $filas->periodo;
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
		
	}

	public function ver_datos()
	{
		$this->load->helper('form');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		$where1="WHERE COD_SEDE_OPERATIVA='-1'";

		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
		}

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			$where1 = "WHERE COD_SEDE_OPERATIVA='$sede' and COD_PROV_OPERATIVA='$prov'";
		}
		
		if(isset($_GET['coddist'])) { 
			$dist = $this->input->get('coddist');
			if ($dist != -1)
			{
				$where1 = $where1." and cod_dist='$dist'";
			}			
		}

		if(isset($_GET['codcentrop'])) { 
			$centrop = $this->input->get('codcentrop');
			if ($centrop != -1)
			{
				$where1 = $where1." and cod_ccpp='$centrop'";
			}
		}

		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			if ($ruta != -1)
			{
				$where1 = $where1." and ruta = '$ruta'";
			}			
		}

		if(isset($_GET['nroperiodo'])) { 
			$periodo = $this->input->get('nroperiodo');
			if ($periodo != -1)
			{
				$where1 = $where1." and periodo = '$periodo'";
			}			
		}

		if(!$sidx) $sidx =1;

		$count = $this->seguimiento_model->nro_locales_for_seguimiento($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->seguimiento_model->get_locales_for_seguimiento($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;		
		foreach ($resultado->result() as $fila)
		{
			$respuesta->rows[$i]['id'] = $fila->codigo_de_local;
			$respuesta->rows[$i]['cell'] = array($fila->periodo,$fila->codigo_de_local, $fila->estado, $fila->entrada_informacion, $fila->datos_gps, $fila->foto_ruta);
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

	public function registro_avance()
	{
		$codlocal = $this->input->post('codigo');
		$nro_visitas=$this->seguimiento_model->get_nro_visitas($codlocal);
		$newDate = explode( "/" , $this->input->post('fecha_avance'));
		$fecha_visita = $newDate[2]."/".$newDate[1]."/".$newDate[0];
		$especifique=$this->input->post('especifique');
		//$repite = $this->seguimiento_model->repite_fecha_avance($codlocal,$fecha_visita);
		//if ($repite == 0)
		//{
			$c_data = array(
				'codlocal'=>$codlocal,
				'nro_visita'=>$nro_visitas,
				'fecha_visita'=> $fecha_visita,
				'estado'=> $this->input->post('estado'),
				'especifique'=> utf8_decode($especifique),
				'usu_registra'=> $this->input->post('usuario')
			);
			$this->seguimiento_model->insert_avance($c_data);
		//}
		
		//$jsonData = json_encode($repite);
		//echo $jsonData;
	}

	public function registro_detalle()
	{
		$codlocal = $this->input->post('codigo_dt');
		$nro_visitas=$this->seguimiento_model->get_nro_detalle($codlocal);
		$cantidad=$this->input->post('cantidad');
		$newDate = explode( "/" , $this->input->post('fecha_detalle'));
		$fecha_detalle = $newDate[2]."/".$newDate[1]."/".$newDate[0];
		
		$c_data = array(
			'codlocal'=>$codlocal,
			'nro_det'=>$nro_visitas,
			'cedula'=> $this->input->post('cedula'),
			'cantidad'=> $cantidad,
			'fecha_avance'=> $fecha_detalle,			
			'usu_registra'=> $this->input->post('usuario_dt')
		);
		$this->seguimiento_model->insert_detalle($c_data);
	}

	public function ver_datos_avance()
	{
		$this->load->helper('form');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		if(isset($_GET['codigo'])) { 
			$local = $this->input->get('codigo');
		}else{ $local = "-1"; }

		$where1 = "WHERE codlocal='$local'";

		if(!$sidx) $sidx =1;

		$count = $this->seguimiento_model->cantidad_avances($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->seguimiento_model->get_locales_for_avance($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila)
		{
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $fila->nro_visita;
			$respuesta->rows[$i]['cell'] = array($nro_fila,$fila->codlocal,$fila->NEstado, $fila->fecha_visita);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

	public function ver_datos_detalle()
	{
		$this->load->helper('form');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		if(isset($_GET['codigo'])) { 
			$local = $this->input->get('codigo');
		}else{ $local = "-1"; }

		$where1 = "WHERE codlocal='$local'";

		if(!$sidx) $sidx =1;

		$count = $this->seguimiento_model->cantidad_detalles($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->seguimiento_model->get_locales_for_detalle($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		foreach ($resultado->result() as $fila)
		{
			$respuesta->rows[$i]['id'] = $fila->nro_det;
			$respuesta->rows[$i]['cell'] = array($fila->codlocal,$fila->cedula,$fila->cantidad,$fila->fecha_avance);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}
	/*
	public function Modificar_Avance()
	{
		$c_data = array(
			'codlocal' => $this->input->post('codigo'),
			'nro_visita' => $this->input->post('id')
		);
		
		$resultado=$this->seguimiento_model->get_avance($c_data);
		
		if ($resultado->num_rows() > 0)
		{
			foreach ($resultado->result() as $fila)
			{
				$data['cantidad'] = 1;
				$data['nro_visita'] = $fila->nro_visita;
				$data['fecha_visita'] = $fila->fecha_visita;
				$data['estado'] = $fila->estado;
				$data['especifique'] = $fila->especifique;
			}
		}else{
			$data['cantidad'] = 0;
		}

		$jsonData = json_encode($data);
		echo $jsonData;
	}

	public function Eliminar_Avance()
	{
		$c_data = array(
			'codlocal' => $this->input->post('codigo'),
			'nro_visita' => $this->input->post('id')
		);
		
		$listo=$this->seguimiento_model->del_avance($c_data);
		
		$jsonData = json_encode($listo);
		echo $jsonData;
	}*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */