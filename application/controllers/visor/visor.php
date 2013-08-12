<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visor extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		//$this->load->model('convocatoria/Resultados_model');

	}

	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Seguimiento';
			$code="-1";
			//$data['datos']	= $this->Resultados_model->Get_Resultados($code);

			$this->load->model('convocatoria/Dpto_model');
			$data['depa'] = $this->Dpto_model->Get_Dpto();
			
			$data['main_content'] = 'visor/visor_view';
	        $this->load->view('backend/includes/template', $data);


	}


	public function get_data(){

			$this->load->model('visor/visor_model');
			
			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de
				
			$resultado = $this->visor_model->Get_Resultados($_REQUEST['cod_dpto'],$_REQUEST['cod_prov'],$_REQUEST['idruta']);

			//var_dump($resultado);
			$count = $resultado->num_rows();

	 		//En base al numero de registros se obtiene el numero de paginas
			if( $count > 0 ) {
				@$total_pages = ceil($count/$limit);
			} else {
				$total_pages = 0;
			}

			if ($page > $total_pages) $page=$total_pages;

			$row_final = $page * $limit;
			$row_inicio = $row_final - $limit;

			$resultado = $this->visor_model->Get_Resultados($_REQUEST['cod_dpto'],$_REQUEST['cod_prov'],$_REQUEST['idruta']);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{
				$respuesta->rows[$i]['id'] = $fila->codigo_de_local;
				$respuesta->rows[$i]['cell'] = array($fila->codigo_de_local,
												utf8_encode($fila->centroPoblado),
												'(No Recepcionado)',
												'(No Recepcionado)',
												'(No Recepcionado)',
												'<img class="view" id="'.$fila->codigo_de_local.'" style="cursor:pointer;" src="'.base_url('img/search32.png').'" height="16" width="16" />');

				$i++;
			}

			$jsonData = json_encode($respuesta);

			echo $jsonData;

	}


	public function obtenerregion()
	{
		$this->load->model('visor/visor_model');
		$this->load->helper('form');
		$prov = $this->visor_model->Get_Ruta($_REQUEST['cod_dpto'],$_REQUEST['cod_prov']);
		$provArray = array();
		foreach($prov->result() as $filas)
		{
			$provArray[$filas->idruta]=utf8_encode(strtoupper($filas->idruta));
		}
		echo form_dropdown('region', $provArray, '#', 'id="region"');
	}


	


}

?>