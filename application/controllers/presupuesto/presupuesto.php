<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presupuesto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('fx_email');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		if (!$this->tank_auth->is_logged_in()) {

			redirect('/auth/login/');
		}


		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 8 && $role->rolename == 'Presupuesto'){
				$flag = TRUE;
				break;
			}
		}

		if (!$flag) {
			show_404();
			die();
		}
		$this->user_id	= $this->tank_auth->get_user_id();
		$this->load->model('transaccion_model');
		$this->load->model('seguimiento_adm_model');
		$this->load->model('presupuesto/dependencia');
		$this->load->model('presupuesto/solicitud_presupuesto');
		$this->load->model('presupuesto/Solicitud_presupuesto_vista');

		$this->load->library('datatables');
	}
	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Presupuesto';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['dependencia']	= $this->dependencia->Get_Dependencia();

			$data['cargo']	= $this->seguimiento_adm_model->Get_Cod_Contratacion();

			$data['main_content'] = 'presupuesto/index_view';
			$data['option'] = 1;
	        $this->load->view('backend/includes/template', $data);
	}

	public function Find_Cant_Peacpp($cod){
		$result = $this->solicitud_presupuesto->Get_Cant_Peacpp($cod);
		return $result;
	}
	public function Find_Cod($cod){
		$result=$this->seguimiento_adm_model->Get_All_By_Cod($cod);
		return $result;
	}
	public function Find_Presupuesto(){
		$cod=$this->input->post('presupuestadoid');
		$peacpp=$this->Find_Cant_Peacpp($cod);
		$cant_pea_cpp=0;
		foreach ($peacpp->result() as $filas) {
			$cant_pea_cpp=$filas->cant_pea;
		}
		$query=$this->Find_Cod($cod);
		$data="";
		$resultado=0;
		$baseperiodo="";
		$result="";
		foreach ($query->result() as $filas) {
      		# code...
      		$result['resultado']=$filas->cantidad-$cant_pea_cpp;
      		$result['baseperiodo']=($filas->tipoPeriodo==1) ? ' Días ' : ' Meses ';
      		$result['periodo']=$filas->periodo;

    	}

    	echo json_encode($result);

	}
	public function save(){


			$data['codigo_adm']= $this->input->post('presupuestadoid');
			$data['codigo_dep']= $this->input->post('dependencia_cc');
			$data['cantidad']= $this->input->post('totalpea_cc');
			$data['nperiodo']= $this->input->post('periodo_cc');
			$data['tipoPeriodo']= $this->input->post('baseperiodo_cc');
			$data['detalle']= $this->input->post('detalle');

    	$this->solicitud_presupuesto->insert($data);
	}

	public function get_datatables(){


			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de

			$resultado = $this->Solicitud_presupuesto_vista->Get_presupuesto_vista();

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

			$resultado = $this->Solicitud_presupuesto_vista->mostrar_datos($row_inicio, $row_final,$sidx,$sord);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{
				$respuesta->rows[$i]['id'] = $fila->codigo_CredPresupuestario;
				$respuesta->rows[$i]['cell'] = array($fila->codigo_CredPresupuestario,($fila->tipo_requerimiento==1) ? 'Recursos humanos' : 'Materiales' ,$fila->DetalleCredPres,$fila->nombre_cf,$fila->CargoContratacion,
													$fila->precioUnitario,$fila->CantidadPresupuestada,$fila->CantidadSolicitada,$fila->nperiodo, ($fila->tipoPeriodo==1) ? ' Días ' : 'Meses ' ,$fila->CantidadSolicitada * $fila->precioUnitario * $fila->nperiodo
													);

				$i++;
			}

			$jsonData = json_encode($respuesta);

			echo $jsonData;
	}

	public function save_material(){


      		$data['codigo_adm']= utf8_decode($this->input->post('requerimientoid'));
      		$data['cantidad']= utf8_decode($this->input->post('cantidad'));
      		$data['codigo_dep']= utf8_decode($this->input->post('dependencia'));
      		$data['detalle']= utf8_decode($this->input->post('detalle'));
    	//}
    	$this->solicitud_presupuesto->insert($data);
	}
	public function get()
	{
		$data['datos'] = $this->datatables->getData('solicitud_presupuesto', array('cod', 'cargo_funcional', 'cargo_contratacion', 'dependencia', 'requerimiento','cant_pea_presupuestado', 'cant_pea_cpp','sueldo','oficio','date_oficio','detalle','activado'), 'cod','solicitud_presupuesto');
		echo $data['datos'];
	}
	public function edit()
	{
		$code = $this->input->post('code');
		$attr = $this->input->post('columnname');
		$newval = $this->input->post('value');
		$this->solicitud_presupuesto->update($code, $attr, $newval);

		$this->transaccion_model->insert_transaccion(array('user_id' => $this->user_id, 'table' => 'solicitud_presupuesto', 'key' => $code, 'action' => 2));
	}
	public function edit_oficio(){

		$code = $this->input->post('code');
		$oficio = $this->input->post('oficio');
		$date_oficio = $this->input->post('date_oficio');
		$activado = $this->input->post('activado');
		$this->solicitud_presupuesto->update_oficio($code, $oficio, $date_oficio,$activado);
	}

	public function delete()
	{
		$code = $this->input->post('code');
		$this->solicitud_presupuesto->delete($code);

		$this->transaccion_model->insert_transaccion(array('user_id' => $this->user_id, 'table' => 'solicitud_presupuesto', 'key' => $code, 'action' => 3));
	}

	public function send_email(){

			$data['mensaje'] = 'hola';
			$user_email = 'jhonatanaltuna@gmail.com';
			$this->fx_email->send('contacto', $user_email, $data);

	}

}

