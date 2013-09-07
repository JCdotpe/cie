<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
//peiec
class P313N extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/P313N_model');
    $this->load->helper('my');

  }

	public function send_post(){

        $data = $this->post('datos');
        $msg="";

        $result=validtoken_get($this->post('token'));

        if (!$result) {
          
          $msg= array('message' => 'token key invalido',
                      'value'=> false);
        }else{

            $array= json_decode($data,1);
           
            foreach ($array as $key => $value) {
           
              $array[$key]['version']='99';
           
            }            
            
            $flag = $this->P313N_model->insertBatch($array);
            
            if ($flag) {           

              $msg= array('message' => 'Puntos GPS insertados',
                      'value'=> true);

            }else{

              $msg= array('message' => 'Error al guardar',
                      'value'=> false);

            }
        
        }

        $this->response($msg, 200);
    }

    public function Data_get(){

         $result=validtoken_get($this->post('token'));

        if (!$result) {
          
          $msg= array('message' => 'token invalido',
                      'value'=> false);

        }else{

            header_json();
            
            $data = $this->P313N_model->getData($this->post('id_local'));

            $jsonData = json_encode($data->result());

            prettyPrint($jsonData);
            
        }

        prettyPrint(json_encode($msg));
            
    }

}
