<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento extends CI_Controller {
	protected $user_id = NULL;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('transaccion_model');
		$this->load->model('seguimiento_adm_model');
		$this->load->model('administracion/actividad_presupuestal');
		$this->load->model('administracion/cargo_funcional');
		$this->load->model('administracion/fuente_financiamiento');
		$this->load->model('administracion/nivel_rrhh');
		$this->load->model('administracion/cargo_contratacion');
		$this->load->model('administracion/activos_model');
		$this->load->model('administracion/Seguimiento_adm_vista');
		$this->load->model('presupuesto/Solicitud_presupuesto');
		$this->load->library('datatables');
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}


		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 9 && $role->rolename == 'Rutas'){
				$flag = TRUE;
				break;
			}
		}


		if (!$flag) {
			show_404();
			die();
		}
	}


	public function index()
	{

			$data['nav'] = TRUE;
			$data['title'] = 'Administración';
			$data['actividad_presupuestal']=$this->actividad_presupuestal->Get_Actividad_Presupuestal();
			$data['cargo_funcional']=$this->cargo_funcional->Get_Cargo_Funcional();
			$data['fuente_financiamiento']=$this->fuente_financiamiento->Get_Fuente_Financiamiento();
			$data['nivel_rrhh']=$this->nivel_rrhh->Get_Nivel_rrhh();
			$data['activos']= $this->activos_model->Get_Activos();
			$data['cargo_contratacion']=$this->cargo_contratacion->Get_Cargo_Contratacion();
			$data['main_content'] = 'administracion/seguimiento_view';
	        $this->load->view('backend/includes/template', $data);

	}


	public function get()
	{
		$data['datos'] = $this->datatables->getData('v_seguimiento_adm', array('codigo_adm','codigo_ff','nombre_ff', 'codigo_nrrhh'), 'codigo_adm','v_seguimiento_adm');
		echo $data['datos'];
	}

	public function get_datatables(){


			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de

			$resultado = $this->Seguimiento_adm_vista->Get_Seguimento_vista();

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

			$resultado = $this->Seguimiento_adm_vista->mostrar_datos($row_inicio, $row_final,$sidx,$sord);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{
				$respuesta->rows[$i]['id'] = $fila->codigo_adm;
				$respuesta->rows[$i]['cell'] = array($fila->codigo_adm,($fila->tipo_requerimiento==1) ? 'Recursos humanos' : 'Materiales' ,trim($fila->observaciones),trim($fila->nombre_cf),$fila->DESC_CARG,$fila->created,
													$fila->precioUnitario,$fila->cantidad,$fila->periodo, ($fila->tipoPeriodo==1) ? ' Días ' : 'Meses ' ,
													($fila->tipo_requerimiento==1) ? round($fila->cantidad * $fila->precioUnitario * $fila->periodo,2) : round($fila->cantidad * $fila->precioUnitario,2),
													trim($fila->nombre_ap),trim($fila->nombre_ff),trim($fila->nombre_rrhh));

				$i++;
			}

			$jsonData = json_encode($respuesta);

			echo $jsonData;
	}

	public function save()
	{
		$data = array(
				'created'=> date('Y-m-d H:i:s'),
				'codigo_ff'=>  ($this->input->post('fuente')=='') ? NULL : $this->input->post('fuente'),
				'codigo_nrrhh'=> ($this->input->post('rrhh')=='') ? NULL : $this->input->post('rrhh'),
				'codigo_cc'=> NULL,
				'codigo_cf'=> ($this->input->post('cargo')=='') ? NULL : $this->input->post('cargo'),
				'codigo_ap'=> $this->input->post('actividad'),
				'tipo_requerimiento'=> $this->input->post('tipo_requerimiento'),
				'observaciones'=> $this->input->post('requerimiento'),
				'cantidad'=> $this->input->post('totalpea'),
				'precioUnitario'=> $this->input->post('monto'),
				'periodo'=> $this->input->post('periodo'),
				'tipoPeriodo'=> $this->input->post('baseperiodo'),
				'partida'=> $this->input->post('partida'),
				'codigo_act'=> ($this->input->post('codigo_act')=='') ? NULL : $this->input->post('codigo_act'),
				'codi_carg'=> ($this->input->post('contratacion')=='') ? NULL : $this->input->post('contratacion')
		);
		$code = $this->seguimiento_adm_model->insert($data);
	}

	public function Find_saldos(){

		$codigo=$this->input->post('value');
		$saldo = $this->Solicitud_presupuesto->Get_Cant_Peacpp($codigo);
		$cant_pea_cpp=0;
		foreach ($saldo->result() as $filas) {
			$cant_pea_cpp=$filas->cant_pea;
		}
		echo  $cant_pea_cpp;
	}

	public function update(){
			# code...
			$codigo=$this->input->post('id');
			$data = array(
							'tipo_requerimiento'=> $this->input->post('tipo_requerimiento'),
							'tipoPeriodo'=> $this->input->post('tipoPeriodo'),
							'periodo'=> $this->input->post('periodo'),
							'codigo_ap'=> ($this->input->post('codigo_ap')=='') ? NULL : $this->input->post('codigo_ap'),
							'codigo_ff'=> ($this->input->post('codigo_ff')=='') ? NULL : $this->input->post('codigo_ff'),
							'codigo_cf'=> ($this->input->post('codigo_cf')=='') ? NULL : $this->input->post('codigo_cf'),
							'codigo_nrrhh'=> ($this->input->post('codigo_nrrhh')=='') ? NULL : $this->input->post('codigo_nrrhh'),
							'observaciones'=> $this->input->post('observaciones'),
							'cantidad'=> $this->input->post('cantidad')
					);
					$code = $this->seguimiento_adm_model->update_all($data,$codigo);
	}

	public function delete()
	{
		$code = $this->input->post('code');
		$this->seguimiento_adm_model->delete($code);

		$this->transaccion_model->insert_transaccion(array('user_id' => $this->user_id, 'table' => 'seguimiento_adm', 'key' => $code, 'action' => 3));
	}

	public function update_estado(){


					$codigo=$this->input->post('id');
					$data = array(

							'estado'=>0
					);
					$code = $this->seguimiento_adm_model->update_all($data,$codigo);
	}
}
