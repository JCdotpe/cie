<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Primero extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('primero');
	}

	public function validar_local()
	{
		$this->load->helper('form');
		$this->load->model('primero_model');

		$codigo = $this->input->post('prueba');
				
		
		$resultado = $this->primero_model->get_local($codigo);

		if($resultado->num_rows() > 0)
		{
			$show = 'El Codigo ya Existe';
		}else{
			$show = '';
		}

		$data = array('mensaje' => $show );
		$jsonData = json_encode($data);

		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */