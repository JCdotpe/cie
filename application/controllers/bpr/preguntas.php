<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preguntas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Provincia_model');
		$this->load->model('convocatoria/Dist_model');
		$this->load->model('bpr/operativa_model');
		$this->load->model('bpr/bpr_model');
	}

	public function index()
	{		
		$this->load->model('convocatoria/Cargo_funcional_vista');

		$data['nav'] = TRUE;
		$data['title'] = 'BPR - Preguntas';
		$data['main_content'] = 'bpr/preguntas_view';
		$data['depa'] = $this->Dpto_model->Get_Dpto();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia()
	{
		$prov = $this->Provincia_model->get_provs($_POST['id_dpto']);
		$return_arr['datos']=array();
		foreach($prov->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCPP;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function obtenerdistrito()
	{
		$dist = $this->Dist_model->Get_Dist_combo($_POST['id_depa'],$_POST['id_prov']);
		$return_arr['datos']=array();
		foreach($dist->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCDI;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenercapitulo()
	{
		$cap = $this->operativa_model->Get_Capitulo();
		$return_arr['datos']=array();
		foreach($cap->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_cap;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->descripcion));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenerseccion()
	{
		$sec = $this->operativa_model->Get_Seccion($_POST['id_cap']);
		$return_arr['datos']=array();
		foreach($sec->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_sec;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->descripcion));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function obtenerpregunta()
	{
		$pre = $this->operativa_model->Get_Pregunta($_POST['id_cap'],$_POST['id_sec']);
		$return_arr['datos']=array();
		foreach($pre->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_preg;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->descripcion));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}

	public function registro()
	{
		$c_data = array(
				'cod_cap'=> $this->input->post('capitulo'),
				'cod_sec'=> $this->input->post('seccion'),
				'cod_preg'=> $this->input->post('pregunta'),
				'CCDD'=> $this->input->post('departamento'),
				'CCPP'=> $this->input->post('provincia'),
				'CCDI'=> $this->input->post('distrito'),
				'cargo'=> $this->input->post('id_cargo'),
				'nombre'=> utf8_decode($this->input->post('nombrecompleto')),
				'dni'=> $this->input->post('nrodni'),
				'consulta'=> utf8_decode($this->input->post('consulta'))
			);

		$flag = $this->bpr_model->insert_reg($c_data);
		
		if($flag==0)
		{
			$show = 'Error al Grabar. Recargue la Pagina y Vuelva a Intentarlo.';
		}else{
			$show = 'Datos Grabados Satisfactoriamente.';
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */