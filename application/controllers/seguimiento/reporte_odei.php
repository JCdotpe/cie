<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_odei extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('seguimiento/operativa_model');
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 11){
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

	public function index()
	{
		$data['option'] = 2;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Seguimiento por ODEI';
		$data['main_content'] = 'seguimiento/reporte_odei_view';

		$data['odei'] = $this->operativa_model->get_odei();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenreporte()
	{
		$page = $this->input->get('page',TRUE);
		$limit = $this->input->get('rows',TRUE);
		$sidx = $this->input->get('sidx',TRUE);
		$sord = $this->input->get('sord',TRUE);

		$cond1 = "";
		$cond2 = "";
		
		$where1 = "";

		if(isset($_GET['odei'])) { 
			$odei = $this->input->get('odei');
			if ($odei != -1) { 
				$cond1 = "coddepe = '$odei'";
			}
		}else{ $odei = ""; 
			$cond1 = "coddepe = '-1'"; }

		if(isset($_GET['periodo'])) { 
			$periodo = $this->input->get('periodo');
			if ($periodo != -1) { 
				$cond2 = "Periodo = '$periodo'";
			}
		}else{ $periodo = ""; 
			$cond2 = "Periodo = '-1'"; }
		
		if(!$sidx) $sidx =1;

		$where1 =  "WHERE ".$cond1." AND ".$cond2;
		$count = $this->operativa_model->get_cantidad_for_odei($where1);

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->operativa_model->get_seguimiento_for_odei($sidx, $sord, $row_inicio, $row_final, $where1);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila)
		{
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $i;
			$respuesta->rows[$i]['cell'] = array($nro_fila,utf8_encode($fila->detadepen),$fila->LocEscolares,$fila->LocEscolar_Censado,$fila->LocEscolar_Censado_Porc,$fila->Completa,$fila->Completa_Porc,$fila->Incompleta,$fila->Incompleta_Porc,$fila->Rechazo,$fila->Rechazo_Porc,$fila->Desocupada,$fila->Desocupada_Porc,$fila->Otro,$fila->Otro_Porc);
			$i++;
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */