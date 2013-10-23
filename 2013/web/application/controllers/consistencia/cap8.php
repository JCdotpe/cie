<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap8 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

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

			$fields = $this->principal_model->get_fields('P8');
			
			//id
			$id = $this->input->post('id_local');
			$pr = $this->input->post('Nro_Pred');
			$tipo = $this->input->post('P8_2_Tipo');
			$nro = $this->input->post('P8_2_Nro');
			
			//P8
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
			if ($this->cap8_model->consulta_cap8($id,$pr,$tipo,$nro)->num_rows() == 0) {
				$c_data['id_local'] = $id;
				$c_data['Nro_Pred'] = $pr;
				// inserta nuevo registro
					if($this->cap8_model->insert_cap8($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente el P8';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap8-i';
					}

			} else {
				// actualiza
					if($this->cap8_model->update_cap8($id,$pr,$tipo,$nro,$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha actualizado satisfactoriamente el P8';
					}else{
						$flag = 0;
						$msg = 'Ocurrió un error 00x-Cap8-u';		
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

	public function cap8_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$tipo = $this->input->get('tipo');
		$nro = $this->input->get('nro');

		$data = $this->cap8_model->get_cap8($codigo,$predio,$tipo,$nro);

		echo json_encode($data->row());

		// $i=0;
		// echo "[";

		// foreach ($data->result() as $fila ){

		// 	if($i>0){echo",";}

		// 	$x= array("P8_2_Tipo" => $fila->P8_2_Tipo,
		// 	"P8_2_Nro" => $fila->P8_2_Nro,
		// 	"P8_area" => round($fila->P8_area),
		// 	"P8_altura" => round($fila->P8_altura),
		// 	"P8_longitud" => round($fila->P8_longitud),
		// 	"P8_ejecuto" => $fila->P8_ejecuto,
		// 	"P8_ejecuto_O" => $fila->P8_ejecuto_O,
		// 	"P8_Est_E" => $fila->P8_Est_E,
		// 	"P8_Ant" => $fila->P8_Ant,
		// 	"P8_Est_PaLo" => $fila->P8_Est_PaLo,
		// 	"P8_RecTec" => $fila->P8_RecTec,
		// 	"P8_Obs" => utf8_encode($fila->P8_Obs));

		// 	$jsonData = my_json_encode($x);

		// 	prettyPrint($jsonData);

		// 	$i++;
		// }

		// echo "]";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */