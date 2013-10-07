<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Respuestas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('session');

		$this->load->model('bpr/operativa_model');
		$this->load->model('bpr/bpr_model');
		
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 15){
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

	public function registro()
	{
		$codigo = $this->input->post('codigo');
		$pos = strpos($codigo,'.');
		$id_cuestionario = substr($codigo,0,$pos);
		$id_nro = substr($codigo,$pos+1);

		$c_data = array(
				'id_cuestionario' => $id_cuestionario,
				'id_nro'=> $id_nro,
				'id_usuario'=> $this->input->post('usuario'),
				'respuesta'=> utf8_decode($this->input->post('respuesta'))
			);

		$flag = $this->bpr_model->insert_reg_respuesta($c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}
	}

	public function view_ultima_respuesta()
	{
		$id_cuestionario = $this->input->get('id_cuestionario');
		$data = $this->bpr_model->get_ultima_respuesta($id_cuestionario);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("id_cuestionario" => $fila->id_cuestionario,
			"id_nro" => $fila->id_nro,
			"respuesta" => $fila->respuesta,
			"fecha_respuesta" => $fila->fecha_respuesta);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */