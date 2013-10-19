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
	}

	public function cap8_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$tipo = $this->input->get('tipo');
		$nro = $this->input->get('nro');

		$data = $this->cap8_model->get_cap8($codigo,$predio,$tipo,$nro);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("P8_2_Tipo" => $fila->P8_2_Tipo,
			"P8_2_Nro" => $fila->P8_2_Nro,
			"P8_area" => $fila->P8_area,
			"P8_altura" => $fila->P8_altura,
			"P8_longitud" => $fila->P8_longitud,
			"P8_ejecuto" => $fila->P8_ejecuto,
			"P8_ejecuto_O" => $fila->P8_ejecuto_O,
			"P8_Est_E" => $fila->P8_Est_E,
			"P8_Ant" => $fila->P8_Ant,
			"P8_Est_PaLo" => $fila->P8_Est_PaLo,
			"P8_RecTec" => $fila->P8_RecTec,
			"P8_Obs" => $fila->P8_Obs);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */