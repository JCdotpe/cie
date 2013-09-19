<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coberturapea extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->helper('form');
		$this->load->model('convocatoria/Provincia_model');
		$this->load->model('convocatoria/Dist_model');
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 10){
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
		
		$data['option'] = 2;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte Cobertura PEA';
		$data['main_content'] = 'informes/coberturapea_view';

		$data['depa'] = $this->Dpto_model->Get_Dpto();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia()
	{
		$prov = $this->Provincia_model->get_provs($_POST['id_depa']);
		$return_arr['datos']=array();
		foreach($prov->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCPP;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function obtenreporte()
	{
		$this->load->helper('form');
		$this->load->model('convocatoria/convocatoria_model');

		$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
		$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
		$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
		$sord = $this->input->get('sord',TRUE);  // Almacena el modo de ordenación

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";

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

 		//En base al numero de registros se obtiene el numero de paginas
		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;

		$row_final = $page * $limit;
		$row_inicio = $row_final - $limit;

		$resultado = $this->convocatoria_model->mostrar_datos($sidx, $sord, $row_inicio, $row_final, $where1, $vista);

		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		$nro_fila = $row_inicio;
		foreach ($resultado->result() as $fila )
		{
			$nro_fila++;
			$respuesta->rows[$i]['id'] = $nro_fila;
			if ($fila->meta_insc > 0){ $prct_inscritos = ($fila->inscritos/$fila->meta_insc)*100; }else{ $prct_inscritos = 0; }
			if ($fila->meta_capa > 0){ $prct_asis_capa = ($fila->Asistente_Capacitacion/$fila->meta_capa)*100; }else{ $prct_asis_capa = 0; }
			if ($fila->meta_capa > 0){ $prct_capa = ($fila->Aprobado_Capacitacion/$fila->meta_capa)*100; }else{ $prct_capa = 0; }
			if ($fila->meta_capa > 0){ $prct_selec = ($fila->Titular/$fila->meta_con)*100; }else{ $prct_selec = 0; }
			
			$respuesta->rows[$i]['cell'] = array($nro_fila,utf8_encode($fila->departamento),utf8_encode($fila->provincia),utf8_encode($fila->odei),$fila->meta_insc,$fila->inscritos,round($prct_inscritos,1),$fila->CV_calificado,$fila->CV_aprobado,$fila->meta_capa,$fila->Asistente_Capacitacion,round($prct_asis_capa,1),$fila->Aprobado_Capacitacion,round($prct_capa,1),$fila->meta_con,$fila->Titular,round($prct_selec,1));
			$i++;
		}

		$jsonData = json_encode($respuesta);

		echo $jsonData;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */