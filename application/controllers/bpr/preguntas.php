<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preguntas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		//$this->load->model('convocatoria/Dpto_model');
		//$this->load->model('convocatoria/Provincia_model');
		//$this->load->model('convocatoria/Dist_model');
		$this->load->model('bpr/operativa_model');
		$this->load->model('bpr/bpr_model');
	}

	public function index()
	{
		$this->load->model('convocatoria/Cargo_funcional_vista');

		$data['nav'] = TRUE;
		$data['title'] = 'BPR - Preguntas';
		$data['main_content'] = 'bpr/preguntas_view';
		$data['sedeope'] = $this->operativa_model->Get_SedeOpe();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$data['cedula']=$this->operativa_model->Get_Cedula();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia_by_sede()
	{
		$sedeope = $this->operativa_model->Get_ProvbySedeOpe($_POST['id_sede']);
		$return_arr['datos']=array();
		foreach($sedeope->result() as $filas)
		{
			$data['CODIGO'] = $filas->cod_prov_operativa;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->prov_operativa_ugel));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}
/*
	public function obtenerdistrito()
	{
		$dist = $this->operativa_model->Get_DistbySedeProv_Ope($_POST['id_sede'],$_POST['id_prov']);
		$return_arr['datos']=array();
		foreach($dist->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCDI;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);	
	}
*/
	public function obtenercedula()
	{
		$ced = $this->operativa_model->Get_Cedula();
		$return_arr['datos']=array();
		foreach($ced->result() as $filas)
		{
			$data['CODIGO'] = $filas->cedula;
			$data['NOMBRE'] = $filas->cedula;
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function obtenercapitulo()
	{
		$cap = $this->operativa_model->Get_Capitulo($_POST['id_cedula']);
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
				'id_cuestionario'=> $this->bpr_model->get_nro_pregunta(),
				'cedula'=> $this->input->post('cedula'),
				'cod_cap'=> $this->input->post('capitulo'),
				'cod_sec'=> $this->input->post('seccion'),
				'cod_preg'=> $this->input->post('pregunta'),
				'cod_sede_operativa'=> $this->input->post('sedeoperativa'),
				'cod_prov_operativa'=> $this->input->post('provincia_ope'),
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

	public function re_pregunta()
	{
		$id_cuestionario = $this->input->post('id_cuestionario');

		$resultado = $this->bpr_model->get_datos_pregunta($id_cuestionario);

		foreach($resultado->result() as $filas)
		{
			$cedula = $filas->cedula;
			$cod_cap = $filas->cod_cap;
			$cod_sec = $filas->cod_sec;
			$cod_preg = $filas->cod_preg;
			$cod_sede_operativa = $filas->cod_sede_operativa;
			$cod_prov_operativa = $filas->cod_prov_operativa;
			$cargo = $filas->cargo;
		}

		$c_data = array(
				'id_cuestionario'=> $id_cuestionario,
				'cedula'=> $cedula,
				'cod_cap'=> $cod_cap,
				'cod_sec'=> $cod_sec,
				'cod_preg'=> $cod_preg,
				'cod_sede_operativa'=> $cod_sede_operativa,
				'cod_prov_operativa'=> $cod_prov_operativa,
				'cargo'=> $cargo,
				'nombre'=> utf8_decode($this->input->post('nombrecompleto')),
				'dni'=> $this->input->post('nrodni'),
				'consulta'=> utf8_decode($this->input->post('consulta'))
			);

		$flag = $this->bpr_model->insert_repregunta($c_data);
		
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