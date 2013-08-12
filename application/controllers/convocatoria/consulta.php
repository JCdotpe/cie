<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
	}


	public function index(){
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria - Módulo de Consulta';
			//$data['recaptcha_html'] = $this->_create_recaptcha();
			$data['main_content'] = 'convocatoria/consulta_view';
			$data['errors'] = array();
			$this->form_validation->set_rules('dni','DNI','required|xss_clean');			
			
			if($this->form_validation->run() === TRUE){
				$dni = $this->input->post('dni');
				$res = $this->regs_model->consulta_dni($dni);
				if($res->num_rows() > 0){
					foreach($res->result() as $filas)
					{
						$data['ODEI'] = utf8_encode($filas->ODEI);
						$data['Lugar'] = utf8_encode($filas->Lugar);
						$data['cargoFuncional'] = utf8_encode($filas->cargoFuncional);
						$data['Profesion'] = utf8_encode($filas->Profesion);
						$data['nombre1'] = utf8_encode($filas->nombre1);
						$data['nombre2'] = utf8_encode($filas->nombre2);
						$data['ap_paterno'] = utf8_encode($filas->ap_paterno);
						$data['ap_materno'] = utf8_encode($filas->ap_materno);
						$data['NEstado'] = utf8_encode($filas->NEstado);	
					}
					$data['msg'] = '1';
				}else{
					$data['msg'] = 'No esta inscrito en esta Convocatoria';	
				}
			}
        	
        	$this->load->view('backend/includes/template', $data);	
	}

/*
	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');

		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);

		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');

		$options = "<script>var RecaptchaOptions = {theme: 'red'};</script>\n";

		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

		return $options.$html;
	}
*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */