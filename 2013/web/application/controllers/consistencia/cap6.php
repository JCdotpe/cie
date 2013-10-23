<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap6 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('consistencia/cap6_model');
		$this->load->model('consistencia/principal_model');
	}

	public function index()
	{
		// $is_ajax = $this->input->post('ajax');
		// if($is_ajax){

		// 	$fields = $this->principal_model->get_fields('P6_1');
		// 	$fields_8n = $this->principal_model->get_fields('P6_1_8N');
		// 	$fields_10n = $this->principal_model->get_fields('P6_1_10N');
		// 	$fields_2 = $this->principal_model->get_fields('P6_2');
		// 	$fields_2_4n = $this->principal_model->get_fields('P6_2_4N');
			
			
		// 	//id
		// 	$id = $this->input->post('id_local');
		// 	$pr = $this->input->post('Nro_Pred');
		// 	$nroedif = $this->input->post('Nro_Ed');
			
		// 	//P7
		// 	foreach ($fields as $a=>$b) {
		// 		if(!in_array($b, array('id_local','Nro_Pred','user_id','last_ip','user_agent','created','modified'))){
		// 			$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
		// 		}
		// 	}

		// 	// $c_data['user_id'] = $this->tank_auth->get_user_id();
		// 	// $c_data['created'] = date('Y-m-d H:i:s');
		// 	// $c_data['last_ip'] =  $this->input->ip_address();
		// 	// $c_data['user_agent'] = $this->agent->agent_string();

		// 	$flag = 0;
		// 	$msg = 'Error inesperado, por favor intentalo nuevamente';
		// 	if ($this->cap7_model->consulta_cap7($id,$pr,$nroedif)->num_rows() == 0) {
		// 		$c_data['id_local'] = $id;
		// 		$c_data['Nro_Pred'] = $pr;
		// 		// inserta nuevo registro
		// 			if($this->cap7_model->insert_cap7($c_data) > 0){
		// 				$flag = 1;
		// 				$msg = 'Se ha registrado satisfactoriamente el P7';
		// 			}else{
		// 				$flag = 0;
		// 				$msg = 'Ocurrió un error 00x-Cap7-i';
		// 			}

		// 	} else {
		// 		// actualiza
		// 			if($this->cap7_model->update_cap7($id,$pr,$nroedif,$c_data) > 0){
		// 				$flag = 1;
		// 				$msg = 'Se ha actualizado satisfactoriamente el P7';
		// 			}else{
		// 				$flag = 0;
		// 				$msg = 'Ocurrió un error 00x-Cap7-u';		
		// 			}

		// 	}

		// 	$datos['flag'] = $flag;	
		// 	$datos['msg'] = $msg;	
		// 	$data['datos'] = $datos;
		// 	$this->load->view('backend/json/json_view', $data);		

		// }else{
		// 	show_404();;
		// }
	}

	public function cap6_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap6_model->get_cap6($codigo,$predio,$edi);
		
		echo json_encode($data->row());
		
	}

	public function cap6_1_8n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap6_model->get_cap6_1_8n($codigo,$predio,$edi);
		
		echo json_encode($data->result());
		
	}

	public function cap6_1_10n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap6_model->get_cap6_1_10n($codigo,$predio,$edi);
		
		echo json_encode($data->result());
		
	}

	public function cap6_2_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');
		$piso = $this->input->get('piso');
		$amb = $this->input->get('amb');

		$data = $this->cap6_model->get_cap6_2($codigo,$predio,$edi,$piso,$amb);
		
		echo json_encode($data->row());
		
	}

	public function cap6_2_4n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');
		$piso = $this->input->get('piso');
		$amb = $this->input->get('amb');

		$data = $this->cap6_model->get_cap6_2_4n($codigo,$predio,$edi,$piso,$amb);
		
		echo json_encode($data->result());
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */