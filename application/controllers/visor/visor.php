<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visor extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		//$this->load->model('convocatoria/Resultados_model');
		$this->load->model('visor/visor_model');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

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

//=====================BASICAS==============================


	public function get_data(){
			
			$this->header_json();
			
			$this->load->model('visor/visor_model');
			
			$this->load->helper('form');

			$page = $this->input->get('page',TRUE);  // Almacena el numero de pagina actual
			$limit = $this->input->get('rows',TRUE); // Almacena el numero de filas que se van a mostrar por pagina
			$sidx = $this->input->get('sidx',TRUE);  // Almacena el indice por el cual se hará la ordenación de los datos
			$sord = $this->input->get('sord',TRUE);  // Almacena el modo de
				
			$resultado = $this->visor_model->Get_Resultados($_REQUEST['cod_dpto'],$_REQUEST['cod_prov']);

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

			$resultado = $this->visor_model->Get_Resultados($_REQUEST['cod_dpto'],$_REQUEST['cod_prov']);

			$respuesta->page = $page;
			$respuesta->total = $total_pages;
			$respuesta->records = $count;
			$i=0;
			foreach ($resultado->result() as $fila )
			{
				$respuesta->rows[$i]['id'] = $fila->codigo_de_local;
				$respuesta->rows[$i]['cell'] = array($fila->codigo_de_local,
												utf8_encode('<img class="view" id="'.$fila->codigo_de_local.'" style="cursor:pointer;" src="'.base_url('img/search32.png').'" height="16" width="16" />',
												$fila->centroPoblado),
												'(No Recepcionado)',
												'(No Recepcionado)',
												'(No Recepcionado)');

				$i++;
			}

			$jsonData = json_encode($respuesta);

			$this->prettyPrint($jsonData);

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

//===============UTILS====================

public function header_json(){
	header('Content-type: text/json');
	header('Content-type: application/json');
}

/*Estefano: USar esta funcion para tabular json en php menor a 5.4*/
public function prettyPrint( $json ){

    $result = '';
    $level = 0;
    $prev_char = '';
    $in_quotes = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if( $char === '"' && $prev_char != '\\' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
        $prev_char = $char;
    }

    echo $result;

}

//CIE01
//=====================GENERAL1==============================


	public function get_PadLocal($codigo_de_local){

		$this->header_json();

		$data = $this->visor_model->Data_PadLocal($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);

	}

	public function get_PCar($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_PCar($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_PCar_C_1N($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_PCar_C_1N($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

//=====================CAPITULO1==============================


	public function get_P1_A($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P1_A($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P1_A_2N($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P1_A_2N($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P1_A_2_8N($codigo_de_local,$P1_A_2_NroIE){

		$this->header_json();
		
		$data = $this->visor_model->Data_P1_A_2_8N($codigo_de_local,$P1_A_2_NroIE);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){
			
				if($i>0){echo",";}
			
				$x= array("P1_A_2_9_NroCMod" => $fila->P1_A_2_9_NroCMod,
								"P1_A_2_9A_CMod" => $fila->P1_A_2_9A_CMod,
								"P1_A_2_9B_CodLocal" => $fila->P1_A_2_9B_CodLocal,
								"P1_A_2_9C_Nivel" => $fila->P1_A_2_9C_Nivel,
								"P1_A_2_9D_Car" => $fila->P1_A_2_9D_Car,
								"P1_A_2_9E_NroAnex" => $fila->P1_A_2_9E_NroAnex,
								"P1_A_2_9F_CantAnex" => $fila->P1_A_2_9F_CantAnex,
								"P1_A_2_9G_T1_Talu" => $fila->P1_A_2_9G_T1_Talu,
								"P1_A_2_9H_T1_Taul" => $fila->P1_A_2_9H_T1_Taul,
								"P1_A_2_9I_T2_Talu" => $fila->P1_A_2_9I_T2_Talu,
								"P1_A_2_9J_T2_Taul" => $fila->P1_A_2_9J_T2_Taul,
								"P1_A_2_9K_T3_Talu" => $fila->P1_A_2_9K_T3_Talu,
								"P1_A_2_9L_T3_Taul" => $fila->P1_A_2_9L_T3_Taul,
								"anexos" => $this->get_P1_A_2_9N($codigo_de_local,$P1_A_2_NroIE,$fila->P1_A_2_9_NroCMod));
			
				$jsonData = json_encode($x);
				
				$this->prettyPrint($jsonData);

			$i++;

		}

		echo "]";

	}

	public function get_P1_A_2_9N($codigo_de_local,$P1_A_2_NroIE,$P1_A_2_9_NroCMod){
		
		$data = $this->visor_model->Data_P1_A_2_9N($codigo_de_local,$P1_A_2_NroIE,$P1_A_2_9_NroCMod);


		return $data->result();
	
	}

	//=====

	public function get_P1_B($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P1_B($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P1_B_2A_N($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P1_B_2A_N($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P1_B_3N($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P1_B_3N($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

//========================CAPITULO2========================================

	public function get_P2_A($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P2_A($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P2_B($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P2_B($codigo_de_local);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){
			
				if($i>0){echo ",";}
			
				$x= array("P2_B_1_Topo"=> $fila->P2_B_1_Topo,
								"P2_B_2_Suelo"=> $fila->P2_B_2_Suelo,
								"P2_B_2_Suelo_O"=> $fila->P2_B_2_Suelo_O,
								"P2_B_3_Prof"=> $fila->P2_B_3_Prof,
								"P2_B_4_CapAcc"=> $fila->P2_B_4_CapAcc,
								"P2_B_5_Mtran_1"=> $fila->P2_B_5_Mtran_1,
								"P2_B_5_Mtran_2"=> $fila->P2_B_5_Mtran_2,
								"P2_B_5_Mtran_3"=> $fila->P2_B_5_Mtran_3,
								"P2_B_5A_Uso"=> $fila->P2_B_5A_Uso,
								"P2_B_5B_Tvia_uso_1"=> $fila->P2_B_5B_Tvia_uso_1,
								"P2_B_5B_Tvia_uso_2"=> $fila->P2_B_5B_Tvia_uso_2,
								"P2_B_5B_Tvia_uso_3"=> $fila->P2_B_5B_Tvia_uso_3,
								"P2_B_5B_Tvia_uso_4"=> $fila->P2_B_5B_Tvia_uso_4,
								"P2_B_6_Trec_H"=> $fila->P2_B_6_Trec_H,
								"P2_B_6_Trec_M"=> $fila->P2_B_6_Trec_M,
								"P2_B_7_Ttramo_H"=> $fila->P2_B_7_Ttramo_H,
								"P2_B_7_Ttramo_M"=> $fila->P2_B_7_Ttramo_M,
								"P2_B_8_Pelig"=>trim($fila->P2_B_8_Pelig),
								"peligros1"=>$this->get_P2_B_9N($fila->codigo_de_local),
								"peligros2"=>$this->get_P2_B_10N($fila->codigo_de_local),
								"peligros3"=>$this->get_P2_B_11N($fila->codigo_de_local),
								"vulnerabilidades"=>$this->get_P2_B_12N($fila->codigo_de_local));
			
				$jsonData = json_encode($x);
				
				$this->prettyPrint($jsonData);

			$i++;

		}

		echo "]";

	}

		public function get_P2_B_9N($codigo_de_local){
		
			$data = $this->visor_model->Data_P2_B_9N($codigo_de_local);

			return $data->result();

		}

		public function get_P2_B_10N($codigo_de_local){
		
			$data = $this->visor_model->Data_P2_B_10N($codigo_de_local);

			return $data->result();
			
		}

		public function get_P2_B_11N($codigo_de_local){
		
			$data = $this->visor_model->Data_P2_B_11N($codigo_de_local);

			return $data->result();
			
		}

		public function get_P2_B_12N($codigo_de_local){
		
			$data = $this->visor_model->Data_P2_B_12N($codigo_de_local);

			return $data->result();
			
		}

	//==============================================

	public function get_P2_C($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P2_C($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P2_D($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P2_D($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}

	public function get_P2_D_1N($codigo_de_local){

		$this->header_json();
		
		$data = $this->visor_model->Data_P2_D_1N($codigo_de_local);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	}


	//============SP========================================================

	public function get_SP_CAP01_B_3($codigo_de_local,$predio,$npredio){

		$this->header_json();
		
		$data = $this->visor_model->Data_SP_CAP01_B_3($codigo_de_local,$predio,$npredio);

		$jsonData = json_encode($data->result());

		$this->prettyPrint($jsonData);
	
	}


//========================CAPITULO3========================================

//CIE01A

//========================GENERAL2========================================
//========================CAPITULO4========================================
//========================CAPITULO5========================================


//CIE01B

//========================GENERAL3========================================
//========================CAPITULO6========================================
//========================CAPITULO7========================================
//========================CAPITULO8========================================
	
}
?>