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
		$this->load->model('Seguimiento/operativa_model');

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

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		$where1="WHERE cod_dept=-1";

		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
		}

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			$where1 = "WHERE cod_dept='$depa' and cod_prov='$prov'";
		}
		
		if(isset($_GET['coddist'])) { 
			$dist = $this->input->get('coddist');
			$where1 = "WHERE cod_dept='$depa' and cod_prov='$prov' and cod_dist='$dist'";
		}

		if(isset($_GET['codcentrop'])) { 
			$centrop = $this->input->get('codcentrop');
			$where1 = "WHERE cod_dept='$depa' and cod_prov='$prov' and cod_dist='$dist' and cod_ccpp='$centrop'";
		}

		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			$where1 = "WHERE cod_dept='$depa' and cod_prov='$prov' and cod_dist='$dist' and cod_ccpp='$centrop' and ruta = '$ruta'";
		}

		if(isset($_GET['nroperiodo'])) { 
			$periodo = $this->input->get('nroperiodo');
			$where1 = "WHERE cod_dept='$depa' and cod_prov='$prov' and cod_dist='$dist' and cod_ccpp='$centrop' and ruta = '$ruta' and periodo = '$periodo'";
		}


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
			$respuesta->rows[$i]['id'] = $fila->codigo_de_local;
			$respuesta->rows[$i]['cell'] = array($nro_fila,$fila->codigo_de_local, $fila->estado, $fila->entrada_informacion, $fila->datos_gps, $fila->fotos);
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

	public function registro_avance()
	{
		$codlocal = $this->input->post('codigo');
		$nro_visitas=$this->operativa_model->get_nro_visitas($codlocal);
		$fecha_visita=$this->input->post('fecha_avance');
		$especifique=$this->input->post('especifique');

		$repite = $this->operativa_model->repite_fecha_avance($codlocal,$fecha_visita);
		if ($repite == 0)
		{
			$c_data = array(
				'codlocal'=>$codlocal,
				'nro_visita'=>$nro_visitas,
				'fecha_visita'=> $fecha_visita,
				'estado'=> $this->input->post('estado'),
				'especifique'=> $especifique,
				'usu_registra'=> $this->input->post('usuario')
			);
			$this->operativa_model->insert_avance($c_data);
		}
		
		$jsonData = json_encode($repite);
		echo $jsonData;
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

		$count = $this->operativa_model->cantidad_avances($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->operativa_model->get_locales_for_avance($sidx, $sord, $row_inicio, $row_final, $where1);

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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */