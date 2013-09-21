<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
//peiec
class Procedure extends REST_Controller{

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

            $data = $this->Procedure_model->Lista_IE(no_obfuscate($this->get('id_local')),$this->get('predio'));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }



    }

    public function Lista_Predio_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->Procedure_model->Lista_Predio(no_obfuscate($this->get('id_local')));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }



    }

    public function Lista_Anexo_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->Procedure_model->Lista_Anexo(no_obfuscate($this->get('id_local')));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }



    }

    public function Anexo_Datos_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->Procedure_model->Anexo_Datos(no_obfuscate($this->get('id_local')),$this->get('predio'),$this->get('nmodulo'),$this->get('nroie'),$this->get('anexo'));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

    public function Lista_CIE_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->Procedure_model->Lista_CIE();

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }
    

}
