<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvexport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('convocatoria/convocatoria_model');
		$this->load->helper('form');
	}

	public function ExportacionCobertura()
	{
		$this->load->helper('form');
		$this->load->model('convocatoria/convocatoria_model');

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";
		
		$sidx="departamento";
		$groupby = "";

		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
			if ($depa != -1 && $depa != 99 && $depa != 98) {
				$cond1 = "cod_dep = '$depa'";
			}
		}else{ $depa = ""; }

		if(isset($_GET['codadm'])) { 
			$adm = $this->input->get('codadm');
			if ($adm != -1) { 
				$cond2 = "codigo_adm = '$adm'";
			}
		}else{ $adm = "";
				$cond2 = "codigo_adm = '-1'"; }
		
		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond3 = "cod_prov = '$prov'";
			}
		}else{ $prov = ""; }

		$where1 = "";
		if ($cond1 != "") { $where1 = "WHERE ".$cond1; }
		
		if ($cond2 != "" && $where1 != "") { $where1 = $where1." AND ".$cond2; }
		elseif ($cond2 != "" && $where1 == "") { $where1 = "WHERE ".$cond2; }
		
		if ($cond3 != "" && $where1 != "") { $where1 = $where1." AND ".$cond3; }
		elseif ($cond3 != "" && $where1 == "") { $where1 = "WHERE ".$cond3; }

		if(!$sidx) $sidx =1;
		if ($depa == 99){ $vista = "v_cobertura_dptal"; }else{ $vista = "v_cobertura"; }

		$count = $this->convocatoria_model->contar_datos($vista, $where1);

		$data['cantidad'] = $count;
		$data['consulta'] = $this->convocatoria_model->mostrar_datos($sidx, 'asc', '0', $count, $where1, $vista);

		$this->load->view('excel/cobertura_xls', $data);
	}

	public function ExportacionEstadoSeleccion()
	{
		$this->load->helper('form');
		$this->load->model('procesoseleccion/estadoseleccion_model');

		$cond1 = "";
		$cond11 = "";
		$cond2 = "";
		$cond22 = "";
		$cond3 = "";
		$cond33 = "";
		$cond4 = "";
		$cond44 = "";
		$cond5 = "";
		$cond55 = "";

		$sidx = "ODEI, departamento_dom, provincia_dom, distrito_dom, cargofuncional, ap_paterno";
		
		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
			if ($depa != -1 && $depa != 99) {			
				$cond1 = "cod_dep = '$depa' AND "; 
				$cond11 = "cod_dep = '$depa'";
			}
		}else{ $depa = ""; }

		if(isset($_GET['codadm'])) { 
			$adm = $this->input->get('codadm');
			if ($adm != -1) { 
				$cond2 = "codigo_adm = '$adm' AND "; 
				$cond22 = "codigo_adm = '$adm'";
			}
		}else{ $adm = ""; }
		
		if(isset($_GET['codconvo'])) { 
			$convo = $this->input->get('codconvo');
			if ($convo != -1) { 
				$cond3 = "codigo_convocatoria = '$convo' AND ";
				$cond33 = "codigo_convocatoria = '$convo'";
			}
		}else{ $convo = ""; }

		if(isset($_GET['codpresu'])) { 
			$presu = $this->input->get('codpresu');
			if ($presu != -1) { 
				$cond4 = "codigo_credpresupuestario = '$presu' AND "; 
				$cond44 = "codigo_credpresupuestario = '$presu'"; 
			}
		}else{ $presu = ""; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond5 = "cod_prov = '$prov' AND "; 
				$cond55 = "cod_prov = '$prov'";
			}
		}else{ $prov = ""; }

		if(isset($_GET['codestado'])) { 
			$estadoselec = $this->input->get('codestado');
			if ($estadoselec != -1) { 
				$cond6 = "estado = '$estadoselec' AND "; 
				$cond66 = "estado = '$estadoselec'";
			}
		}else{ $cond6 = "estado = '-1' AND "; 
				$cond66 = "estado = '-1'"; }

		$where1 = "";
		if ($cond11 != "") { $where1 = "WHERE ".$cond11; }
		
		if ($cond22 != "" && $where1 != "") { $where1 = $where1." AND ".$cond22; }
		elseif ($cond22 != "" && $where1 == "") { $where1 = "WHERE ".$cond22; }
		
		if ($cond33 != "" && $where1 != "") { $where1 = $where1." AND ".$cond33; }
		elseif ($cond33 != "" && $where1 == "") { $where1 = "WHERE ".$cond33; }

		if ($cond44 != "" && $where1 != "") { $where1 = $where1." AND ".$cond44; }
		elseif ($cond44 != "" && $where1 == "") { $where1 = "WHERE ".$cond44; }

		if ($cond55 != "" && $where1 != "") { $where1 = $where1." AND ".$cond55; }
		elseif ($cond55 != "" && $where1 == "") { $where1 = "WHERE ".$cond55; }

		if ($cond66 != "" && $where1 != "") { $where1 = $where1." AND ".$cond66; }
		elseif ($cond66 != "" && $where1 == "") { $where1 = "WHERE ".$cond66; }

		$where2 = $cond1.$cond2.$cond3.$cond4.$cond5.$cond6;

		if(!$sidx) $sidx =1;

		$resultado = $this->estadoseleccion_model->contar_datos($where1);
		$count = $resultado->num_rows();

		$data['cantidad'] = $count;
		$query = $this->estadoseleccion_model->reporte_datos($sidx, 'asc', '0', $count, $where1, $where2);
		$data['consulta'] = $query;
		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
			$data['estado_seleccion'] = $row->NEstado;			
		}

		$this->load->view('excel/estadoseleccion_xls', $data);
	}
}
?>