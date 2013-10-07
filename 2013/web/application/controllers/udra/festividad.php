<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Festividad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Dist_model');
		$this->load->model('convocatoria/Provincia_model');
		$this->load->model('udra/Udra_registro_model');
		$this->load->model('udra/v_ambito_censal_model');
		$this->load->model('udra/festividad_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');

		/*	if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 4 && $role->rolename == 'UDRA'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}*/
	}

	public function index()
	{

			$data['nav'] = TRUE;
			$data['title'] = 'Festividad';
			$data['dpto'] = 'UDRA';
			$data['departamento']=$this->Dpto_model->get_dpto();
			$data['provincia']=$this->Provincia_model->Get_Provincia();
			$data['main_content'] = 'udra/festividad_view';
			$data['option'] = 4;
			$data['error'] = 0;
			//$this->load->view('backend/includes/template', $data);

			$this->form_validation->set_rules('cod_pto','Departamento','required|alpha_numeric');
			$this->form_validation->set_rules('cod_prov','Provincia','required|alpha_numeric');
			$this->form_validation->set_rules('descrip','descrip','required');
			$this->form_validation->set_rules('fecha_festivo','fecha_festivo','required');


			if ($this->form_validation->run() === TRUE) {

		    		$registros = array(
						'COD_DPTO'	=>trim(utf8_decode($this->input->post('cod_pto'))),
						'COD_PROV'	=> trim(utf8_decode($this->input->post('cod_prov'))),
						'COD_DIST'	=> trim(utf8_decode($this->input->post('cod_dist'))),
						'DESCRIP'	=> strtoupper(trim(utf8_decode($this->input->post('descrip')))),
						'FECHA_FESTIVO'	=> strtoupper(trim(utf8_decode($this->input->post('fecha_festivo')))),
						'FECHA_FIN'	=> strtoupper(trim(utf8_decode($this->input->post('fecha_festivo_fin')))),
						'OBS'	=> strtoupper(trim(utf8_decode($this->input->post('obs')))),
						'ESTADO'	=> 1
						);

		    		$flag = $this->festividad_model->insert_reg($registros);

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



	public function Expor_formularios_all()
	{
		$this->load->helper('form');

		$data['consulta'] = $this->v_ambito_censal_model->Get_Ambitos();

		$this->load->view('excel/ambito_censal_xls', $data);
	}
	public function letrasmeses($value){
				$mes="";
				switch (trim($value)) {
					case "01":
						# code...
						$mes="Enero";
						break;
					case "02":
						# code...
						$mes="Febrero";
						break;
					case "03":
						# code...
						$mes="Marzo";
						break;
					case "04":
						# code...
						$mes="Abril";
						break;
					case "05":
						# code...
						$mes="Mayo";
						break;
					case "06":
						# code...
						$mes="Junio";
						break;
					case "07":
						# code...
						$mes="Julio";
						break;
					case "08":
						# code...
						$mes="Agosto";
						break;
					case "09":
						# code...
						$mes="Septiembre";
						break;
					case "10":
						# code...
						$mes="Octubre";
						break;
					case "11":
						# code...
						$mes="Noviembre";
						break;
					case "12":
						# code...
						$mes="Diciembre";
						break;
				}

				return $mes;
	}


	public function get_datatables(){


			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de

			$code="-1";

			if(isset($_GET['dni'])) {
				$code = $this->input->get('dni',TRUE);
			}

			$resultado = $this->festividad_model->Get_Resultados($code);



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

			$resultado = $this->festividad_model->mostrar_datos($row_inicio, $row_final,$sidx,$sord,$code);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{
				$respuesta->rows[$i]['id'] = $fila->COD_FESTIVIDAD;
				$respuesta->rows[$i]['cell'] = array($fila->COD_FESTIVIDAD,trim($fila->Departamento),utf8_encode($fila->Provincia),utf8_encode($fila->Distrito),utf8_encode($fila->DESCRIP),trim(substr($fila->FECHA_FESTIVO,0,2))." de ".$this->letrasmeses(trim(substr($fila->FECHA_FESTIVO,3,2))),trim(substr($fila->FECHA_FIN,0,2))." de ".$this->letrasmeses(trim(substr($fila->FECHA_FIN,3,2))),trim($fila->OBS));
				//$respuesta->rows[$i]['cell'] = array($fila->COD_FESTIVIDAD,trim($fila->Departamento),utf8_encode($fila->Provincia),utf8_encode($fila->Distrito),utf8_encode($fila->DESCRIP),trim(substr($fila->FECHA_FESTIVO,3,2)));
				$i++;

			}

			$jsonData = json_encode($respuesta);

			echo $jsonData;
	}

	public function update_estado(){

					$data = array(

							'estado'=>0
					);
					$code = $this->festividad_model->update_estado_festividad($data,$this->input->post('id'));

	}
}