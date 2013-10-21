<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cap7 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('consistencia/cap7_model');
	}

	public function cap7_i()
	{
		$codigo = $this->input->get('codigo');
		$predio = $this->input->get('predio');
		$edi = $this->input->get('edi');

		$data = $this->cap7_model->get_cap7($codigo,$predio,$edi);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("P7_1_2" => $fila->P7_1_2,
			"P7_1_3" => $fila->P7_1_3,
			"P7_1_4" => $fila->P7_1_4,
			"P7_1_5" => $fila->P7_1_5,
			"P7_1_6" => $fila->P7_1_6,
			"P7_1_7" => $fila->P7_1_7,
			"P7_1_8" => $fila->P7_1_8,
			"P7_1_9" => $fila->P7_1_9,
			"P7_1_9A" => $fila->P7_1_9A,
			"P7_1_9B" => $fila->P7_1_9B,
			"P7_1_9C" => $fila->P7_1_9C,
			"P7_1_9D" => $fila->P7_1_9D,
			"P7_1_10" => $fila->P7_1_10,
			"P7_1_11" => $fila->P7_1_11,
			"P7_1_12" => $fila->P7_1_12,
			"P7_1_13" => $fila->P7_1_13,
			"P7_1_14" => $fila->P7_1_14,
			"P7_1_15" => $fila->P7_1_15,
			"P7_1_15A" => $fila->P7_1_15A,
			"P7_1_15B" => $fila->P7_1_15B,
			"P7_1_15C" => $fila->P7_1_15C,
			"P7_1_15D" => $fila->P7_1_15D,
			"P7_1_16" => $fila->P7_1_16,
			"P7_1_17" => $fila->P7_1_17,
			"P7_1_18" => $fila->P7_1_18,
			"P7_1_19" => $fila->P7_1_19,
			"P7_1_20" => $fila->P7_1_20,
			"P7_1_21" => $fila->P7_1_21,
			"P7_1_22" => $fila->P7_1_22,
			"P7_1_23" => $fila->P7_1_23,
			"P7_1_24" => $fila->P7_1_24,
			"P7_1_25" => $fila->P7_1_25,
			"P7_1_26" => $fila->P7_1_26,
			"P7_1_27" => $fila->P7_1_27,
			"P7_1_28" => $fila->P7_1_28,
			"P7_2_1" => $fila->P7_2_1,
			"P7_2_2" => $fila->P7_2_2,
			"P7_Obs" => $fila->P7_Obs);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */