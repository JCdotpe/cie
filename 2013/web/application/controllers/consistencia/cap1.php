<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		


		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
		$this->load->model('consistencia/cap1_model');			
		$this->load->model('consistencia/principal_model');		

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 16){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}		
	}


	public function index()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

		}else{
			show_404();;
		}

	}


	public function ies_i()
	{

		$is_ajax = $this->input->post('ajax');
		$id = $this->input->post('id_local');
		$pr = $this->input->post('Nro_Pred');
		$nro_ies = $this->input->post('P1_A_1_Cant_IE');

		if($is_ajax){

			$cap1_p1_a = $this->principal_model->get_fields('P1_A');
			$cap1_p1_a_2n = $this->principal_model->get_fields('P1_A_2N');
			//IES_I
			$cap1_p1_a_data['id_local'] =  $id;
			$cap1_p1_a_data['Nro_Pred'] =  $pr;			
			foreach ($cap1_p1_a as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	
			//IES
			$cap1_p1_a_2n_data['id_local'] =  $id;
			$cap1_p1_a_2n_data['Nro_Pred'] =  $pr;			
			foreach ($cap1_p1_a_2n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2n_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';	

			// $aaa = 'test';
			$my_nro_ies = $this->cap1_model->get_p1_a_2n($id,$pr)->num_rows();
			$my_head_ie = $this->cap1_model->get_p1_a($id,$pr)->num_rows();
			
			//////////////////////////////////////////////////////////////////////////////////////////////////
			//stupid table
			//HEAD IES

			if($my_head_ie > 0){
				if($this->cap1_model->update_cap1($id,$pr,$cap1_p1_a_data,'P1_A') > 0){
					$flag = 1;
					$msg = 'Se ha actualizado satisfactoriamente el nro de I.E.';	
				}
			}else{
				if($this->cap1_model->insert_cap1($cap1_p1_a_data,'P1_A') > 0){
					$flag = 1;
					$msg = 'Se ha registrado satisfactoriamente el nro de I.E.';					
				}
			}		


			//////////////////////////////////////////////////////////////////////////////////////////////////
			//IES
			//tiene alguna ie?
			if($my_nro_ies > 0){
				//es igual
				if($my_nro_ies == $nro_ies) {
					//nothing
				//reducir ies
				}elseif($my_nro_ies > $nro_ies){
						//borrar ies sobrantes
						for($i=$my_nro_ies; $i!=$nro_ies; $i--){
							$this->del_ie($id,$pr,$i);
						}
				//aumentar
				}elseif($my_nro_ies < $nro_ies){
						//agregar ies faltantes
						for($i=$my_nro_ies; $i!=$nro_ies; $i++){
							$cap1_p1_a_2n_data['P1_A_2_NroIE'] =  $i+1;
							$this->cap1_model->insert_cap1($cap1_p1_a_2n_data,'P1_A_2N');
						}
				}

			//ingresar primera vez IES
			}else{
					for($i=1; $i <= $nro_ies; $i++){
						$cap1_p1_a_2n_data['P1_A_2_NroIE'] =  $i;
						$this->cap1_model->insert_cap1($cap1_p1_a_2n_data,'P1_A_2N');
					}			

			}	


			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$datos['nro'] = $nro_ies;	
			// $datos['aaa'] = $aaa;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);


		}else{
			show_404();;
		}

	}


	private function del_ie($id,$pr,$ie){
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_C_20N');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_C');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_A_2_9N');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_A_2_8N');
		$this->cap1_model->delete_cap1_ie($id,$pr,$ie,'P1_A_2N');
	}

	private function del_codmod($id,$pr,$ie,$cm){
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_C_20N');
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_C');
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_A_2_9N');
		$this->cap1_model->delete_cap1_codmod($id,$pr,$ie,$cm,'P1_A_2_8N');
	}



	public function ies()
	{

		$is_ajax = $this->input->post('ajax');

		if($is_ajax){
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			//nie
			$ie = $this->input->post('P1_A_2_NroIE');
			//ncodmod
			$nro_cms = $this->input->post('P1_A_2_8_Can_CMod_IE');	

			$cap1_p1_a_2n = $this->principal_model->get_fields('P1_A_2N');
			$cap1_p1_a_2_8n = $this->principal_model->get_fields('P1_A_2_8N');

			//pre save ie
			foreach ($cap1_p1_a_2n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2n_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			//pre insert codmod
			$cap1_p1_a_2_8n_data['id_local'] =  $id;
			$cap1_p1_a_2_8n_data['Nro_Pred'] =  $pr;			
			$cap1_p1_a_2_8n_data['P1_A_2_NroIE'] =  $ie;			
			foreach ($cap1_p1_a_2_8n as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','P1_A_2_NroIE','user_id','last_ip','user_agent','created','modified'))){
					$cap1_p1_a_2_8n_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			//////////////////////////////////////////////////////////////////////////////////////////////////
			//IE

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';

			if($this->cap1_model->update_cap1_ie($id,$pr,$ie,$cap1_p1_a_2n_data,'P1_A_2N') > 0){
				$flag = 1;
				$msg = 'Se ha actualizado satisfactoriamente la IE Nro - ' . $ie ;
			}else{
				$flag = 0;
				$msg = 'Ocurrió un error 00x-IE-i-' . $ie;		
			}


			//////////////////////////////////////////////////////////////////////////////////////////////////
			//COD MOD
			$my_nro_cms = $this->cap1_model->get_cap1_codmod($id,$pr,$ie)->num_rows();
			//tiene alguna ie?
			if($my_nro_cms > 0){
				//es igual
				if($my_nro_cms == $nro_cms) {
					//nothing
				//reducir codmod
				}elseif($my_nro_cms > $nro_cms){
						//borrar ies sobrantes
						for($i=$my_nro_cms; $i!=$nro_cms; $i--){
							$this->del_codmod($id,$pr,$ie,$i);
						}
				//aumentar
				}elseif($my_nro_cms < $nro_cms){
						//agregar ies faltantes
						for($i=$my_nro_cms; $i!=$nro_cms; $i++){
							$cap1_p1_a_2_8n_data['P1_A_2_9_NroCMod'] =  $i+1;
							$this->cap1_model->insert_cap1($cap1_p1_a_2_8n_data,'P1_A_2_8N');
						}
				}

			//ingresar primera vez IES
			}else{
					for($i=1; $i <= $nro_cms; $i++){
						$cap1_p1_a_2_8n_data['P1_A_2_9_NroCMod'] =  $i;
						$this->cap1_model->insert_cap1($cap1_p1_a_2_8n_data,'P1_A_2_8N');
					}			
			}	


			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}			
	}


	public function get_ie()
	{
		$is_ajax = $this->input->post('ajax');

		if($is_ajax){		

			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$ie = $this->input->post('P1_A_2_NroIE');

			$datos['ie'] = $this->cap1_model->get_cap1_ie($id,$pr,$ie)->row();	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);

		}else{
			show_404();;
		}	
	}



}