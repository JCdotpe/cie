<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capitulo7 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth');	
		$this->load->model('tabulados/tabulados_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');		
	    $tmpl = array ( 'table_open'  => '<table class="table table-bordered table-striped table-submit table-condensed" style="background-color:#fff">' );
	    $this->table->set_template($tmpl);

		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 6 && $role->rolename == 'Tabulados'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}
		//dando restricciones para los comentarios 
	    $u_id = $this->tank_auth->get_user_id();
	    $this->restriccion = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) || ($u_id == 262) || ($u_id == 267) || ($u_id == 258) || ($u_id == 260) ) ? FALSE : TRUE ;


	}
	public function texto()
	{
		$texto = $this->input->post('texto');
		$texto_2 = $this->input->post('texto_2');
		$preg = $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			if( !is_null($this->tabulados_model->get_texto(1,$preg)->row()->texto) ){
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['texto'] = $texto;
					$c_data['texto_2'] = $texto_2;
				$this->tabulados_model->update_texto(1,$preg,$c_data);	
			}else{
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['pregunta'] = $preg;
					$c_data['tipo'] = 1;
					$c_data['texto'] = $texto;				
					$c_data['texto_2'] = $texto_2;				
				$this->tabulados_model->insert_texto($c_data);	
			}
		}else{
			show_404();;
		}			
	}

	public function metadata()
	{
		$txt_tabulado 		= $this->input->post('txt_tabulado');
		$txt_contenido 		= $this->input->post('txt_contenido');
		$txt_casos 			= $this->input->post('txt_casos');
		$txt_variables 		= $this->input->post('txt_variables');
		$txt_alternativas 	= $this->input->post('txt_alternativas');
		$txt_otro 			= $this->input->post('txt_otro');
		$txt_faltantes 		= $this->input->post('txt_faltantes');
		$txt_productor 		= $this->input->post('txt_productor');
		$txt_definiciones 	= $this->input->post('txt_definiciones');		
		$preg 				= $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {//modifica
			if( $this->tabulados_model->get_metadata(1,$preg)->num_rows() == 1 ){
					$c_data['tabulado'] 	= ($txt_tabulado == '') ? NULL : $txt_tabulado;
					$c_data['contenido'] 	= ($txt_contenido == '') ? NULL : $txt_contenido;
					$c_data['casos'] 		= ($txt_casos == '') ? NULL : $txt_casos;
					$c_data['variable'] 	= ($txt_variables == '') ? NULL : $txt_variables;
					$c_data['alternativas'] = ($txt_alternativas == '') ? NULL : $txt_alternativas;
					$c_data['otro'] 		= ($txt_otro == '') ? NULL : $txt_otro;
					$c_data['faltantes'] 	= ($txt_faltantes == '') ? NULL : $txt_faltantes;
					$c_data['productor'] 	= ($txt_productor == '') ? NULL : $txt_productor;
					$c_data['definiciones'] = ($txt_definiciones == '') ? NULL : $txt_definiciones;
					$c_data['last_modified']= date('Y-m-d H:i:s');
					$c_data['last_user_id'] = $this->tank_auth->get_user_id();					
				$this->tabulados_model->update_metadata(1,$preg,$c_data);	
			}else{//inserta nuevo
					$c_data['tipo'] 		= 1;
					$c_data['pregunta'] 	= $preg;
					$c_data['tabulado'] 	= ($txt_tabulado == '') ? NULL : $txt_tabulado;
					$c_data['contenido'] 	= ($txt_contenido == '') ? NULL : $txt_contenido;
					$c_data['casos'] 		= ($txt_casos == '') ? NULL : $txt_casos;
					$c_data['variable'] 	= ($txt_variables == '') ? NULL : $txt_variables;
					$c_data['alternativas'] = ($txt_alternativas == '') ? NULL : $txt_alternativas;
					$c_data['otro'] 		= ($txt_otro == '') ? NULL : $txt_otro;
					$c_data['faltantes'] 	= ($txt_faltantes == '') ? NULL : $txt_faltantes;
					$c_data['productor'] 	= ($txt_productor == '') ? NULL : $txt_productor;
					$c_data['definiciones'] = ($txt_definiciones == '') ? NULL : $txt_definiciones;
					$c_data['user_id'] 		= $this->tank_auth->get_user_id();
				$this->tabulados_model->insert_metadata($c_data);	
			}
		}else{
			show_404();;
		}			
	}



	public function reporte29()
	{
			$data['restriccion'] = $this->restriccion ;
			//$data['nav'] = TRUE;
			$data['title'] = 'TAB | Capitulo 7 | 29';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 29;		
			$data['tables'] = $this->tabulados_model->get_report29();
			$data['c_title'] = ($this->tabulados_model->get_nombre_cuadro($data['opcion'])->num_rows()==1) ? $this->tabulados_model->get_nombre_cuadro($data['opcion'])->row('no_cuadro') : 'No existe titulo';
			//$data['c_title'] =  $this->tabulados_model->get_nombre_cuadro($data['opcion'])->num_rows();
			// *** PARA COMENTARIOS ***
			// $texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			// $data['texto'] =  $texto; 
			// $texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			// $data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados

			// *** PARA METADATO ****
			// $metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			// $data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			// $data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			// $data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			// $data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			// $data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			// $data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			// $data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			// $data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			// $data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/capitulo7/reporte29_view';

			$this->load->view('backend/includes/template', $data);		
	}


}

