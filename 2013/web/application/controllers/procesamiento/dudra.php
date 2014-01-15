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
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect();
		// }

		//Check user privileges 
		// $roles = $this->tank_auth->get_roles();
		// $flag = FALSE;
		// foreach ($roles as $role) {
		// 	if($role->role_id == 18){
		// 		$flag = TRUE;
		// 		break;
		// 	}
		// }

		// //If not author is BENDER!
		// if (!$flag) {
		// 	show_404();
		// 	die();
		// }
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
		$id = $this->input->post('codigolocal');
		$c_data = array(
				'id_local'=> $this->input->post('codigolocal'),
				'cnt_01'=> $this->input->post('ficha01'),
				'cnt_01A'=> $this->input->post('ficha01A'),
				'cnt_01B'=> $this->input->post('ficha01B'),
				'cod_legajo'=> strtoupper($this->input->post('legajo')),
				'resultado'=> $this->input->post('result'),
				'idUser'=> $idUser	
			);


		if ($this->dudra_model->cantidad_fichas_udra($id) > 0)
		{
			$flag = $this->dudra_model->update_cedulas($id,$c_data);
		}else{
			$flag = $this->dudra_model->insert_cedulas($c_data);
		}
		
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}

		$datos['msg'] = $show;
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view', $data);
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
			$respuesta->rows[$i]['cell'] = array($fila->id_local,$fila->cnt_01,$fila->cnt_01A, $fila->cnt_01B, $fila->cod_legajo, $fila->resultado, date_format(date_create($fila->fecha_reg),'d/m/Y H:i'), $fila->Envio_dig, $fila->Envio_dig_Local, date_format(date_create($fila->Envio_dig_fec),'d/m/Y H:i'));
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}


	public function envio_digitacion()
	{
		$idUser = $this->tank_auth->get_user_id();
		$id_local = $this->input->post('id_local');
		// $Envio_dig = $this->input->post('Envio_dig');
		$c_data = array(
				'idUser'=> $idUser,
				'Envio_dig'=> $this->input->post('Envio_dig'),
				'Envio_dig_Local' => ($this->input->post('Envio_dig') == 0) ? '' : 'R',
				'Envio_dig_fec'=> date('Y-m-d H:i:s'),

			);

		// if ($Envio_dig == 0) { $c_data['Envio_dig_Local'] = ''; }

		$flag = $this->dudra_model->update_cedulas($id_local,$c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Actualizados Satisfactoriamente.';
		}

		$datos['msg'] = $show;
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view', $data);
	}

	public function envio_diglocal()
	{
		$idUser = $this->tank_auth->get_user_id();
		$id_local = $this->input->post('id_local');
		$c_data = array(
				'idUser'=> $idUser,
				'Envio_dig_Local'=> $this->input->post('Envio_dig_Local'),
				'Envio_dig_fec'=> date('Y-m-d H:i:s'),
			);

		$flag = $this->dudra_model->update_cedulas($id_local,$c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Actualizados Satisfactoriamente.';
		}

		$datos['msg'] = $show;
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */