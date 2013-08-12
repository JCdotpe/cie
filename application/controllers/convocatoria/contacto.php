<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->library('fx_email');
		$this->load->model('contacto_model');
		$this->load->helper('date');		
	}

	public function index()
	{
		$data['nav'] = TRUE;
		$data['mensaje']=NULL;
		$data['title'] = 'Contacto';
		$data['recaptcha_html'] = $this->_create_recaptcha();
		$data['main_content'] = 'convocatoria/contacto_view';
		$data ['msgbox'] = '';

		$this->form_validation->set_rules('nombres','NOMBRES','required|xss_clean');
		$this->form_validation->set_rules('correo','CORREO ELECTRONICO','required|xss_clean|valid_email');
		$this->form_validation->set_rules('asunto','ASUNTO','required|xss_clean');
		$this->form_validation->set_rules('mensaje','MENSAJE','required|xss_clean');
		$this->form_validation->set_rules('recaptcha_response_field', 'Código de confirmación', 'trim|xss_clean|required|callback__check_recaptcha');
		
        if ($this->form_validation->run() === TRUE)
        {
        	$datos = array(
				'ipclient' => $this->input->ip_address(),
				'useragent' => $this->agent->agent_string(),        		
        		'nombres'	=> $this->input->post('nombres'),
        		'correo'	=> $this->input->post('correo'),
        		'asunto'	=> $this->input->post('asunto'),
        		'mensaje'	=> $this->input->post('mensaje'),
        		'fecha'		=> date('y-m-d H:i:s',now()),
        		'modulo'	=> 1
        		);
        	
	        $this->session->set_flashdata('msgbox',1);
	        $afectados = $this->contacto_model->insert_contacto($datos);	        
	        if ($afectados === 0){
	        	$this->session->set_flashdata('msgbox',2);
	        }else{
				$data['sitename'] = $this->config->item('website_name', 'tank_auth');
				$data['nombre'] = $this->input->post('nombres');
				$data['asunto'] = $this->input->post('asunto');
				$data['mensaje'] = $this->input->post('mensaje');
				$data['correo'] = $this->input->post('correo');
				$user_email = 'jhonatanaltuna@gmail.com';
				$this->fx_email->send('contacto', $user_email, $data);	        	
	        }
	        redirect('convocatoria/contacto')	;
        }else{
        	
        	$this->load->view('backend/includes/template', $data);	
        }
	}

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



}

