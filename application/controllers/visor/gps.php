<?php

require APPPATH.'/libraries/REST_Controller.php';

class gps extends REST_Controller{

	function __construct(){

			parent::__construct();
			$this->load->library('tank_auth');
			$this->lang->load('tank_auth');
			$this->load->helper('my');
			$this->load->model('visor/visor_model');
			$this->load->model('visor/Procedure_model');
			$this->load->model('segmentaciones/operativa_model');

	}

	
	public function sedeOperativa_get(){

        $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{
          

            header_json();

            $data = $this->operativa_model->get_sede_operativa();
            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

    public function provinciaOperativa_get(){

        $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->operativa_model->get_provincia_operativa($this->get('code'));
            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

}

?>