<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultados extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('convocatoria/Resultados_model');

	}
	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria';
			$code="-1";
			$data['datos']	= $this->Resultados_model->Get_Resultados($code);

			$data['main_content'] = 'convocatoria/resultados_view';
	        $this->load->view('backend/includes/template', $data);
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

			$resultado = $this->Resultados_model->Get_Resultados($code);



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

			$resultado = $this->Resultados_model->mostrar_datos($row_inicio, $row_final,$sidx,$sord,$code);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{
				$respuesta->rows[$i]['id'] = $i;
				$respuesta->rows[$i]['cell'] = array($i,utf8_encode($fila->dpto),utf8_encode($fila->prov),utf8_encode($fila->cargo),$fila->dni,utf8_encode($fila->apellidos_nombres),utf8_encode($fila->proceso),
													utf8_encode($fila->detalle));

				$i++;
			}

			$jsonData = json_encode($respuesta);

			echo $jsonData;
	}
}