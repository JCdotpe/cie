<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap5 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('consistencia/cap5_model');
		$this->load->model('consistencia/cap6_model');
		$this->load->model('consistencia/cap8_model');
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

			$fields = $this->principal_model->get_fields('P5');
			$fields_f = $this->principal_model->get_fields('P5_F');
			$fields_n = $this->principal_model->get_fields('P5_N');
			//id
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$cantpisos = $this->input->post('P5_cantNroPiso');

			//P8
			$tot_e = $this->input->post('P5_Tot_E');
			$tot_p = $this->input->post('P5_Tot_P');
			$tot_ld = $this->input->post('P5_Tot_LD');
			$tot_cte = $this->input->post('P5_Tot_CTE');
			$tot_mc = $this->input->post('P5_Tot_MC');
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			//p5
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
					$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	

			// $c_data['user_id'] = $this->tank_auth->get_user_id();
			// $c_data['created'] = date('Y-m-d H:i:s');
			// $c_data['last_ip'] =  $this->input->ip_address();
			// $c_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if ($this->cap5_model->consulta_cap5($id,$pr)->num_rows() == 0) {
				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;
				// inserta nuevo registro
					if($this->cap5_model->insert_cap5($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el P5';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap5-i';
					}

			} else {
				// actualiza
					if($this->cap5_model->update_cap5($id,$pr,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el P5';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap5-u';		
					}

			}

			////////////////////////////////////////////////////////////////cap6
			//edificaciones
			$my_nro_p6 = $this->cap6_model->get_cant_p6_1_for_p5($id,$pr)->num_rows();

			if($my_nro_p6 > 0){
				//es igual
				if($my_nro_p6 == $tot_e) {
					//nothing
				//reducir edificaciones
				}elseif($my_nro_p6 > $tot_e){
					//borrar Edif sobrantes
					for($i=$my_nro_p6; $i!=$tot_e; $i--){
						$this->cap6_model->delete_p6_1_from_p5($id,$pr,$i);
						$this->cap6_model->delete_p6_2_from_p5($id,$pr,$i);
					}
				}
			}


			////////////////////////////////////////////////////////////////cap8
			//pisos
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'P')->num_rows();
			$this->del_p8_from_p5($my_nro_p8,$tot_p,$id,$pr,'P');
			
			//losa deportiva
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'LD')->num_rows();
			$this->del_p8_from_p5($my_nro_p8,$tot_ld,$id,$pr,'LD');

			//cisternas y tanques
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'CTE')->num_rows();
			$this->del_p8_from_p5($my_nro_p8,$tot_cte,$id,$pr,'CTE');

			//muro de contencion
			$my_nro_p8 = $this->cap8_model->get_cant_p8_for_p5($id,$pr,'MC')->num_rows();
			$this->del_p8_from_p5($my_nro_p8,$tot_mc,$id,$pr,'MC');

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$my_nro_p5_f = $this->cap5_model->get_cap5_f($id,$pr)->num_rows();


			//P5_F
			foreach ($fields_f as $a=>$b) {
				if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){							
					$edi_f[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}

			$c_data_f['id_local'] = $id;
			$c_data_f['Nro_Pred'] = $pr;
			if($cantpisos > 0){
				$cc = 0;
				foreach($edi_f['P5_NroPiso'] as &$z){
						
						foreach ($fields_f as $a=>$b) {
							
							if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
								
								$c_data_f[$b] = ($edi_f[$b][$cc] == '') ? NULL : $edi_f[$b][$cc];	
								
							}
						}
						$this->cap5_model->update_cap5_f($id,$pr,$edi_f['P5_NroPiso'][$cc],$c_data_f);
					    $cc++;
				}
			}

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			//P5_N

			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);	

		}else{
			show_404();;
		}
	}

	private function del_p8_from_p5($my_nro_p8,$total_oe,$id,$pr,$tipo){
		
		if($my_nro_p8 > 0){
			//es igual
			if($my_nro_p8 == $total_oe) {
				//nothing
			//reducir otras edificaciones
			}elseif($my_nro_p8 > $total_oe){
				//borrar OE sobrantes
				for($i=$my_nro_p8; $i!=$total_oe; $i--){
					$this->cap8_model->delete_p8_from_p5($id,$pr,$tipo,$i);
				}
			}
		}
	}

	public function cap5_n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$piso = $this->input->get('piso');

		$data = $this->cap5_model->get_cap5_n($codigo,$predio,$piso);

		echo json_encode($data->result());

	}

	public function cap5n_for_p6_2()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edif = $this->input->get('edi');

		$data = $this->cap5_model->get_cap5n_for_p6_2($codigo,$predio,$edif);

		echo json_encode($data->result());

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */