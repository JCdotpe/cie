<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadoseleccion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 10 && $role->rolename == 'Informes'){
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
		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Cargo_funcional_vista');
		
		$data['option'] = 3;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Estados de Selección';
		$data['main_content'] = 'informes/estadoseleccion_view';

		$data['depa'] = $this->Dpto_model->Get_Dpto();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenreporte()
	{
		$this->load->helper('form');
		$this->load->model('procesoseleccion/estadoseleccion_model');

		$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
		$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
		$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
		$sord = $this->input->get('sord',TRUE);  // Almacena el modo de ordenación

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
		$cond6 = "";
		$cond66 = "";

		if(isset($_GET['coddepa'])) { 
			$depa = $this->input->get('coddepa');
			if ($depa != -1) {
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
				$cond6 = "estado >= '$estadoselec' AND "; 
				$cond66 = "estado >= '$estadoselec'";
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

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->estadoseleccion_model->mostrar_datos($sidx, $sord, $row_inicio, $row_final, $where1, $where2);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila )
		{
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $i;			
			$respuesta->rows[$i]['cell'] = array($nro_fila,utf8_encode($fila->departamento),utf8_encode($fila->provincia),utf8_encode($fila->distrito),utf8_encode($fila->cargofuncional),utf8_encode($fila->nombrecompleto),$fila->dni,$fila->ruc,$fila->nro_tel,$fila->nro_cel,$fila->email,$fila->nivel,$fila->fecharegistro,utf8_encode($fila->nestado));
			$i++;			
		}

		$jsonData = json_encode($respuesta);
		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */