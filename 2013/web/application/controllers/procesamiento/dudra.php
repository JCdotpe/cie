<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dudra extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		
		$this->load->model('procesamiento/dudra_model');
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 18){
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
		$data['title'] = 'Procesamiento - UDRA';
		$data['main_content'] = 'procesamiento/dudra_view';
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
		$idUser = $this->tank_auth->get_user_id();
		$c_data = array(
				'id_local'=> $this->input->post('codigolocal'),
				'cnt_01'=> $this->input->post('ficha01'),
				'cnt_01A'=> $this->input->post('ficha01A'),
				'cnt_01B'=> $this->input->post('ficha01B'),
				'result'=> $this->input->post('result'),
				'idUser'=> $idUser	
			);

		$flag = $this->dudra_model->insert_cedulas($c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';

			
		}


	}

	public function ver_datos()
	{
	$show = 'Entraste';

		$this->load->helper('form');

		$page = $this->input->get('page',TRUE); 
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		$where1="";

		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
		}

	
		if(!$sidx) $sidx =1;

		$count = $this->dudra_model->nro_locales_for_udra($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->dudra_model->get_locales_for_udra($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;		
		foreach ($resultado->result() as $fila)
		{
			$respuesta->rows[$i]['id'] = $fila->id_local;
			$respuesta->rows[$i]['cell'] = array($fila->id_local,$fila->cnt_01,$fila->cnt_01A, $fila->cnt_01B, $fila->resultado, $fila->fecha_reg);
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}





	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */