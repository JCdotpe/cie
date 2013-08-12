<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvexport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
	}

	public function ExportacionAprobadosCV()
	{
		$this->load->model('procesoseleccion/procesoseleccion_model');

		$sidx = "fecha_registro,ap_paterno";
		
		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
		}else { $depa = -1; }
		$cond1 = "cod_dep = '$depa' AND ";

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
		}else{ $prov = -1; }
		$cond2 = "cod_prov = '$prov' AND ";	

		if(isset($_GET['codadm'])) { 
			$adm = $this->input->get('codadm');
		}else{ $adm = -1; }
		$cond3 = "codigo_adm = '$adm' AND ";
		
		if(isset($_GET['codconvo'])) { 
			$convo = $this->input->get('codconvo');
		}else{ $convo = -1; }
		$cond4 = "codigo_convocatoria = '$convo' AND ";

		if(isset($_GET['codpresu'])) { 
			$presu = $this->input->get('codpresu');
		}else{ $presu = -1; }
		$cond5 = "codigo_credpresupuestario = '$presu' AND ";

		$cond6 = "(estado >= '1')";
		
		$where1 = "WHERE ".$cond1.$cond2.$cond3.$cond4.$cond5.$cond6;
		if(!$sidx) $sidx =1;

		$count = $this->procesoseleccion_model->contar_datos($where1);

		$data['cantidad'] = $count;
		$data['consulta'] = $this->procesoseleccion_model->reporte_datos($sidx, 'asc', '0', $count, $where1);

		$this->load->view('excel/aprobadoscv_xls', $data);
	}

	public function ExportacionCapacitacion()
	{
		$this->load->model('procesoseleccion/procesoseleccion_model');

		$sidx = "fecha_registro,ap_paterno";
		
		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
		}else { $depa = -1; }
		$cond1 = "cod_dep = '$depa' AND ";

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
		}else{ $prov = -1; }
		$cond2 = "cod_prov = '$prov' AND ";	

		if(isset($_GET['codadm'])) { 
			$adm = $this->input->get('codadm');
		}else{ $adm = -1; }
		$cond3 = "codigo_adm = '$adm' AND ";
		
		if(isset($_GET['codconvo'])) { 
			$convo = $this->input->get('codconvo');
		}else{ $convo = -1; }
		$cond4 = "codigo_convocatoria = '$convo' AND ";

		if(isset($_GET['codpresu'])) { 
			$presu = $this->input->get('codpresu');
		}else{ $presu = -1; }
		$cond5 = "codigo_credpresupuestario = '$presu' AND ";

		$cond6 = "(estado >= '3')";
		
		$where1 = "WHERE ".$cond1.$cond2.$cond3.$cond4.$cond5.$cond6;
		if(!$sidx) $sidx =1;

		$count = $this->procesoseleccion_model->contar_datos($where1);

		$data['cantidad'] = $count;
		$data['consulta'] = $this->procesoseleccion_model->reporte_datos($sidx, 'asc', '0', $count, $where1);

		$this->load->view('excel/capacitacion_xls', $data);
	}


	public function ExportacionSeleccionPEA()
	{
		$this->load->model('procesoseleccion/procesoseleccion_model');

		$sidx = "fecha_registro,ap_paterno";
		
		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
		}else { $depa = -1; }
		$cond1 = "cod_dep = '$depa' AND ";

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
		}else{ $prov = -1; }
		$cond2 = "cod_prov = '$prov' AND ";	

		if(isset($_GET['codadm'])) { 
			$adm = $this->input->get('codadm');
		}else{ $adm = -1; }
		$cond3 = "codigo_adm = '$adm' AND ";
		
		if(isset($_GET['codconvo'])) { 
			$convo = $this->input->get('codconvo');
		}else{ $convo = -1; }
		$cond4 = "codigo_convocatoria = '$convo' AND ";

		if(isset($_GET['codpresu'])) { 
			$presu = $this->input->get('codpresu');
		}else{ $presu = -1; }
		$cond5 = "codigo_credpresupuestario = '$presu' AND ";

		$cond6 = "(estado >= '5')";
		
		$where1 = "WHERE ".$cond1.$cond2.$cond3.$cond4.$cond5.$cond6;
		if(!$sidx) $sidx =1;

		$count = $this->procesoseleccion_model->contar_datos($where1);

		$data['cantidad'] = $count;
		$data['consulta'] = $this->procesoseleccion_model->reporte_datos($sidx, 'asc', '0', $count, $where1);

		$this->load->view('excel/seleccionpea_xls', $data);
	}
}
?>