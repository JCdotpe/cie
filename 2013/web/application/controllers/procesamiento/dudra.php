<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dudra extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('seguimiento/operativa_model');
		$this->load->model('seguimiento/seguimiento_model');
		$this->load->model('procesamiento/dudra_model');
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */