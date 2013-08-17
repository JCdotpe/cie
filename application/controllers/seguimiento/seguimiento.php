<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('session');

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
		$this->load->model('convocatoria/Dpto_model');

		$data['nav'] = TRUE;
		$data['title'] = 'Seguimiento';
		$data['main_content'] = 'Seguimiento/seguimiento_view';
		$data['user_id'] = $this->session->userdata('user_id');

		$data['depa'] = $this->Dpto_model->Get_DptobyUser($data['user_id']);
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia_by_sede()
	{
		$this->load->model('convocatoria/Provincia_model');
		$sedeope = $this->Provincia_model->Get_ProvbySedeOpe($_POST['id_sede'],$_POST['id_dpto']);
		$provArray = array();
		foreach($sedeope->result() as $filas)
		{
			$provArray[$filas->CCPP]=utf8_encode(strtoupper($filas->Nombre_Provincia));
		}
		echo form_dropdown('provincia', $provArray, '#', 'id="provincia" onChange="cargarDist();"');	
	}

	public function obtenerdistrito()
	{
		$this->load->model('convocatoria/Dist_model');
		$dist = $this->Dist_model->Get_Dist_combo($_POST['id_depa'],$_POST['id_prov']);
		$distArray = array();
		foreach($dist->result() as $filas)
		{
			$distArray[$filas->CCDI]=utf8_encode(strtoupper($filas->Nombre));
		}
		echo form_dropdown('distrito', $distArray, '', 'id="distrito"');
	}

	public function obtenercentropoblado()
	{
		$this->load->model('Seguimiento/operativa_model');
		$centrop = $this->operativa_model->get_centro_poblado($_POST['id_depa'],$_POST['id_prov'],$_POST['id_dist']);
		$centropArray = array();
		foreach($centrop->result() as $filas)
		{
			$centropArray[$filas->codccpp]=utf8_encode(strtoupper($filas->nomccpp));
		}
		echo form_dropdown('centropoblado', $centropArray, '', 'id="centropoblado"');
	}

	public function obtenerrutas()
	{
		$this->load->model('Seguimiento/operativa_model');
		$rutas = $this->operativa_model->get_rutas($_POST['id_cp']);
		$rutasArray = array();
		foreach($rutas->result() as $filas)
		{
			$rutasArray[$filas->idruta]=$filas->idruta;
		}
		echo form_dropdown('rutas', $rutasArray, '', 'id="rutas"');
	}

	public function obtenerperiodo()
	{
		$this->load->model('Seguimiento/operativa_model');
		$periodo = $this->operativa_model->get_periodo($_POST['id_cp'], $_POST['id_ruta']);
		$periodoArray = array();
		foreach($periodo->result() as $filas)
		{
			$periodoArray[$filas->periodo]=$filas->periodo;
		}
		echo form_dropdown('periodo', $periodoArray, '', 'id="periodo"');
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