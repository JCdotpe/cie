<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validacion extends CI_Controller {
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
		$this->load->model('consistencia/reporte_model');
	}


	public function index()
	{
		$id = $this->input->get('codigo');
		$res = $this->reporte_model->get_ResultadoFinal($id);
		$Rfinal = ($res->num_rows() > 0) ? $res->row()->PC_C_2_Rfinal_resul : 0;

		$data = $this->reporte_model->get_validacion($id,$Rfinal);

		foreach ($data->result() as $fila) {
			$Termino = $fila->Caratula_ResultF;
			if ($Rfinal == 1 || $Rfinal == 2) {
				$Termino += $fila->CapI_SecA_op1 + $fila->CapI_SecA_op2 + $fila->CapI_SecA_op3 + $fila->CapI_SecB_op1 + $fila->CapI_SecB_op2 + $fila->CapI_SecC + $fila->CapII_SecG + $fila->CapIII_SecA + $fila->CapIV_SecB + $fila->CapV_TotEdf + $fila->CapVI_SecA + $fila->CapVI_SecB + $fila->CapVI_SecE + $fila->CapVII_SecB + $fila->CapVIII_SecB_op1 + $fila->CapVIII_SecB_op2 + $fila->CapVIII_SecB_op3 + $fila->CapVIII_SecB_op4;
			}
		}

		$res_padlocal = $this->reporte_model->get_EstadoPadlocal($id);
		
		$Cerrado =  0;
		if ($res_padlocal->num_rows() > 0){
			foreach ($res_padlocal->result() as $fila) {
				if (!is_null($fila->Digit_fin) && $fila->Digit_fin > 0) {
					$Termino = $fila->Digit_fin;
					$Cerrado = $fila->Digit_fin;
				}
			}
		}
		

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("sede_operativa" => $fila->sede_operativa,
				"dpto_nombre" => $fila->dpto_nombre,
				"codigo_de_local" => $fila->codigo_de_local,
				"Caratula_ResultF" => $fila->Caratula_ResultF,
				"CapI_SecA_op1" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapI_SecA_op1 : '',
				"CapI_SecA_op2" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapI_SecA_op2 : '',
				"CapI_SecA_op3" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapI_SecA_op3 : '',
				"CapI_SecB_op1" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapI_SecB_op1 : '',
				"CapI_SecB_op2" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapI_SecB_op2 : '',
				"CapI_SecC" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapI_SecC : '',
				"CapII_SecG" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapII_SecG : '',
				"CapIII_SecA" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapIII_SecA : '',
				"CapIV_SecB" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapIV_SecB : '',
				"CapV_TotEdf" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapV_TotEdf : '',
				"CapVI_SecA" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVI_SecA : '',
				"CapVI_SecB" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVI_SecB : '',
				"CapVI_SecE" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVI_SecE : '',
				"CapVII_SecB" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVII_SecB : '',
				"CapVIII_SecB_op1" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVIII_SecB_op1 : '',
				"CapVIII_SecB_op2" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVIII_SecB_op2 : '',
				"CapVIII_SecB_op3" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVIII_SecB_op3 : '',
				"CapVIII_SecB_op4" => ($Rfinal == 1 || $Rfinal == 2) ? $fila->CapVIII_SecB_op4 : '',
				"Termino" => $Termino,
				"Cerrado" => $Cerrado,
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function estado_dig()
	{
		$id_local = $this->input->post('codigo');
		
		$c_data = array(
				'Digit_fin'=> 1,
				'Dig_user_id'=> $this->input->post('usuario'),
				'Dig_fecha_fin'=> date('Y-m-d H:i:s')
			);

		$flag = $this->reporte_model->update_estado_dig($id_local,$c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Código de Local Concluido.';
		}

		$datos['msg'] = $show;
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view', $data);
	}
}