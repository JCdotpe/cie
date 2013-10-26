<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Udra_excel extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('udra/Udra_model');
		$this->load->model('udra/Activo_model');
		$this->load->helper('form');
	}

	public function Exportacionudra()
	{
		$this->load->helper('form');
		$code="-1";
		if(isset($_GET['id_activo'])) {
				$code = $this->input->get('id_activo',TRUE);
		}

		$sidx =0;

		$resultado = $this->Udra_model->get_udra($code);
		$count = $resultado->num_rows();

		$data['cantidad'] = $count;

		$data['consulta'] = $this->Udra_model->mostrar_datos($sidx, $count,'fecha_registro','asc', $code);
		$data['resumen'] =$this->Udra_model->mostrar_resumen($code);

		$this->load->view('excel/reporteudra_xls', $data);
	}
	public function Exportacionudra_all()
	{
		$this->load->helper('form');

		$data['consulta'] = $this->Udra_model->get_mov_udra_all();

		$this->load->view('excel/reporteudra_activos_xls', $data);
	}
}
?>