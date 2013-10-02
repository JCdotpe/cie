<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Udra extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('udra/Udra_model');
		$this->load->model('udra/Activo_model');
		$this->load->model('udra/Udra_registro_model');
		$this->load->model('udra/udra_detalle_model');

	/*	if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}


		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 4 && $role->rolename == 'UDRA'){
				$flag = TRUE;
				break;
			}
		}


		if (!$flag) {
			show_404();
			die();
	}*/


	}

	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Udra';
			$data['activos'] = $this->Activo_model->Get_Activos();
			$data['main_content'] = 'udra/index_view';
			$data['option'] = 1;
	        $this->load->view('backend/includes/template', $data);
	}

	public function save(){

			$this->form_validation->set_rules('activo','Activo','required|alpha_numeric');
			$this->form_validation->set_rules('comboestado','Estado','required|alpha_numeric');
			$this->form_validation->set_rules('cantidad','Cantidad','required|alpha_numeric');
			$this->form_validation->set_rules('combonaturaleza','Naturaleza','required|alpha_numeric');
			$this->form_validation->set_rules('destino','Destino','required|alpha_numeric');
			$this->form_validation->set_rules('combodocumento','Tipo de documento','required|alpha_numeric');
			$this->form_validation->set_rules('inputnrodocumento','Nro de documento','required');
			$this->form_validation->set_rules('comboproyecto',' proyecto','required');


			if ($this->form_validation->run() === TRUE){


					$data = array(
							'codigo_act'=>  utf8_decode(($this->input->post('activo')=='') ? NULL : $this->input->post('activo')),
							'tipo_mov'=> utf8_decode(($this->input->post('combo_tipo_mov')=='') ? NULL : $this->input->post('combo_tipo_mov')),
							'cantidad'=> ($this->input->post('cantidad')=='') ? NULL : $this->input->post('cantidad'),
							'codigo_Naturaleza'=> $this->input->post('combonaturaleza'),
							'estado_activo'=> $this->input->post('comboestado'),
							'codigo_destino'=> $this->input->post('destino'),
							'tipo_documento'=> strtoupper($this->input->post('combodocumento')),
							'nro_doc'=> strtoupper(trim($this->input->post('inputnrodocumento'))),
							'fecha_registro'=> date('Y-m-d h:i:s'),
							'glosa'=> strtoupper(trim($this->input->post('inputglosa'))),
							'codigo_proyecto'=> $this->input->post('comboproyecto')
					);
					$code = $this->Udra_model->insert($data);
			}else{
	        	$is_ajax = $this->input->post('ajax');
	        	if(!$is_ajax){
	        		$this->load->view('backend/includes/template', $data);
	        	}else{
					$data['datos'] = $this->form_validation->error_array();
					$this->load->view('backend/json/json_view', $data);
	        	}
        	}
	}

	public function update(){


			$this->form_validation->set_rules('comboestado','Estado','required|alpha_numeric');
			$this->form_validation->set_rules('cantidad','Cantidad','required|alpha_numeric');
			$this->form_validation->set_rules('combonaturaleza','Naturaleza','required|alpha_numeric');
			$this->form_validation->set_rules('destino','Destino','required|alpha_numeric');
			$this->form_validation->set_rules('combodocumento','Tipo de documento','required|alpha_numeric');
			$this->form_validation->set_rules('inputnrodocumento','Nro de documento','required');
			$this->form_validation->set_rules('comboproyecto',' proyecto','required');

			if ($this->form_validation->run() === TRUE){

					$data = array(
							'tipo_mov'=> utf8_decode(($this->input->post('combo_tipo_mov')=='') ? NULL : $this->input->post('combo_tipo_mov')),
							'cantidad'=> ($this->input->post('cantidad')=='') ? NULL : $this->input->post('cantidad'),
							'codigo_Naturaleza'=> $this->input->post('combonaturaleza'),
							'estado'=> $this->input->post('comboestado'),
							'codigo_destino' => $this->input->post('destino'),
							'tipo_documento' => $this->input->post('combodocumento'),
							'nro_doc' => strtoupper($this->input->post('inputnrodocumento')),
							'glosa'=> strtoupper($this->input->post('inputglosa')),
							'codigo_proyecto' => $this->input->post('comboproyecto')
					);
					$code = $this->Udra_model->update_udra($data,$this->input->post('id'));
			}else{
					$data['datos'] = $this->form_validation->error_array();
					$this->load->view('backend/json/json_view', $data);
        	}
	}

	public function update_udra_registro(){


					$data = array(
							'AMBITO_CENSAL' => $this->input->post('AMBITO_CENSAL'),
							'CANTIDAD_FORMULARIOS' => $this->input->post('CANTIDAD_FORMULARIOS')
					);
					$code = $this->Udra_registro_model->update($data,$this->input->post('id'));
	}

	public function update_estado(){

					$data = array(

							'estado'=>0
					);
					$code = $this->Udra_model->update_estado_udra($data,$this->input->post('id'));

	}

	public function update_registro_estado(){

					$data = array(

							'estado'=>0
					);
					$code = $this->Udra_registro_model->update_registro_udra_estado($data,$this->input->post('id'));

	}

	public function save_activo(){
			$data = array(
					//'created'=> date('Y-m-d'),

					'nombre_act'=> strtoupper(utf8_decode($this->input->post('nombre_activo')))
			);
			$code = $this->Activo_model->insert($data);
	}

	public function save_patrimonio(){
			$data = array(
					'codigo_udra'=> ($this->input->post('codigo_udra')),
					'codigo_patrimonial'=> trim(strtoupper($this->input->post('codigo_patrimonial'))),
					'detalle_fecha'=> date('Y-m-d h:i:s')
			);
			$code = $this->udra_detalle_model->insert($data);
	}
	public function Get_udra_cantidad($c){
			$codigo = $this->input->post('codigo_udra');

			$saldo = $this->Udra_model->Get_Udra_cantidad($codigo);
			$cant_pea_cpp=0;
			foreach ($saldo->result() as $filas) {

				$cant_pea_cpp=$filas->cantidad;
			}
			echo  $cant_pea_cpp;

	}
	public function Count_patrimonio(){

			$codigo = $this->input->post('codigo_udra');
			$saldo = $this->udra_detalle_model->Get_Count_detalle($codigo);
			$cant_pea_cpp=0;
			foreach ($saldo->result() as $filas) {

				$cant_pea_cpp=$filas->codigo_udra;
			}
			echo  $cant_pea_cpp;
	}
	public function Find_codigo_patrimonial(){

			$codigo = $this->input->post('codigo_patrimonial');
			$codigo_udra = $this->input->post('codigo_udra');
			$saldo = $this->udra_detalle_model->Verify_codigo_patrimonial($codigo,$codigo_udra);
			$cant_pea_cpp=0;
			foreach ($saldo->result() as $filas) {

				$cant_pea_cpp=$filas->total;
			}
			if ($cant_pea_cpp>0) {
				# code...
				echo 1; // repetidos
			}else{
				echo 2; // no repetidos
			}
	}


	public function Find_ajax_activo(){

		$is_ajax = $this->input->post('ajax');

		if($is_ajax){
			$data['datos'] = $this->Activo_model->get_activos()->result();
			$this->load->view('backend/json/json_view', $data);
		}else{
			show_404();
		}
	}

	public function Find_mov_udra($c){

		$is_ajax = $this->input->post('ajax');
		$code = $this->input->post('code');
		if($is_ajax){
			$data['datos'] = $this->Udra_model->get_mov_udra($code)->result();
			$this->load->view('backend/json/json_view', $data);
		}else{
			show_404();
		}
	}

	public function get_datatables(){


			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de
			$code="-1";
			if(isset($_GET['id_activo'])) {
				$code = $this->input->get('id_activo',TRUE);
			}

			$resultado = $this->Udra_model->get_udra($code);

			//var_dump($resultado);
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

			$resultado = $this->Udra_model->mostrar_datos($row_inicio, $row_final,$sidx,$sord,$code);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			$tipo_mov="";
			$codigo_naturaleza="";
			$codigo_destino="";
			$estado="";


			foreach ($resultado->result() as $fila )
			{
				switch ($fila->tipo_mov) {
				case 1:
					# code...
					$tipo_mov="INGRESO";
					break;

				case 2:
					# code...
				$tipo_mov="SALIDA";
					break;
			}
			switch ($fila->codigo_Naturaleza) {
				case 1:
					# code...
					$codigo_naturaleza="ADQUISICIÓN";
					break;

				case 2:
					# code...
				$codigo_naturaleza="PRESTAMO";
					break;
				case 3 :
					# code...
				$codigo_naturaleza="TRASLADO";
					break;
			}

			switch ($fila->codigo_destino) {
				case 1:
					# code...
					$codigo_destino="CAMPO";
					break;

				case 2:
					# code...
				$codigo_destino="CAPACITACIÓN";
					break;
				case 3 :
					# code...
					$codigo_destino="OFICINA";
					break;
				case 4:
						# code...
					$codigo_destino="SEGMENTACION";
						break;
				case 5:
					# code...
					$codigo_destino="METODOLOGÍA";
					break;
				case 6:
					# code...
					$codigo_destino="UDRA";
					break;
			}
			$tipo_documento="";
			switch ($fila->tipo_documento) {
				case 1:
					# code...
					$tipo_documento="FACTURA";
					break;

				case 2:
					# code...
				$tipo_documento="CARGO";
					break;
				case 3 :
					# code...
				$tipo_documento="GUIA DE REMISIÓN";
					break;
				case 4:
						# code...
				$tipo_documento="ORDEN DE SALIDA";
						break;
			}
			switch ($fila->estado) {

				case 1:
					# code...
					$estado="NUEVO";
					break;

				case 2:
					# code...
					$estado="USADO";
					break;

				case 3:
					# code...
					$estado="DAÑADO";
					break;
			}
				$respuesta->rows[$i]['id'] = $fila->codigo_udra;
				$respuesta->rows[$i]['cell'] = array($fila->codigo_udra,
													$tipo_mov,
													strtoupper(trim($fila->nombre_act)),
													$fila->cantidad,
													$codigo_naturaleza,
													$codigo_destino,
													$tipo_documento,
													$fila->nro_doc,
													$estado,
													$fila->NombreProyecto,
													$fila->glosa,
													$fila->fecha_registro
													);

				$i++;
			}

			$jsonData = json_encode($respuesta);
			echo $jsonData;
	}

	public function get_datatables_udra_registro(){


			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de

			$code="-1";

			if(isset($_GET['dni'])) {
				$code = $this->input->get('dni',TRUE);
			}

			$resultado = $this->Udra_registro_model->Get_Resultados($code);



			//var_dump($resultado);
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

			$resultado = $this->Udra_registro_model->mostrar_datos($row_inicio, $row_final,$sidx,$sord,$code);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{

				$respuesta->rows[$i]['id'] = $fila->COD_UDRA_REGISTRO;
				$respuesta->rows[$i]['cell'] = array(trim($fila->COD_UDRA_REGISTRO),utf8_encode($fila->Dpto),utf8_encode($fila->prov),utf8_encode($fila->AMBITO_CENSAL),$fila->CANTIDAD_FORMULARIOS,$fila->fecha_registro);
				$i++;

			}

			$jsonData = json_encode($respuesta);

			echo $jsonData;
	}

}