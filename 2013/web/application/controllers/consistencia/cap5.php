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
	}

	public function cap5_n()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$piso = $this->input->get('piso');

		$data = $this->cap5_model->get_cap5_n($codigo,$predio,$piso);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("P5_NroPiso" => $fila->P5_NroPiso,
			"P5_Ed_Nro" => $fila->P5_Ed_Nro,
			"P5_TotAmb" => $fila->P5_TotAmb);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */