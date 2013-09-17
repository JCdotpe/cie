<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mantenimiento_Fotos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
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
		$data['main_content'] = 'seguimiento/mantenimiento_foto_view';
		$this->load->view('backend/includes/template', $data);
	}

	public function existelocal()
	{
		$data['cantidad'] = $this->seguimiento_model->get_existelocal($_POST['codigo']);

		$jsonData = json_encode($data);
		echo $jsonData;
	}

	public function registro()
	{
		$c_data = array(
				'id_local'=> $this->input->post('codigolocal'),
				'repositorio'=> $this->input->post('estado_repo'),
				'observaciones'=> utf8_decode($this->input->post('observaciones'))
			);

		$flag = $this->seguimiento_model->insert_detalle_foto($c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}
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
			$where1 = "WHERE COD_SEDE_OPERATIVA='$sede' and COD_PROV_OPERATIVA='$prov' and cod_dist='$dist'";
		}

		if(isset($_GET['codcentrop'])) { 
			$centrop = $this->input->get('codcentrop');
			$where1 = "WHERE COD_SEDE_OPERATIVA='$sede' and COD_PROV_OPERATIVA='$prov' and cod_dist='$dist' and cod_ccpp='$centrop'";
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
			$respuesta->rows[$i]['cell'] = array($fila->periodo,$fila->codigo_de_local, $fila->estado, $fila->entrada_informacion, $fila->datos_gps, $fila->fotos);
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */