<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
//peiec
class PCar extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/Procedure_model');
    $this->load->helper('my');

  }

  
    public function Lista_IE_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->Procedure_model->getData(no_obfuscate($this->get('id_local')),'1');

            $jsonData = json_encode($data->result());

            prettyPrint($jsonData);

        }



    }

}
