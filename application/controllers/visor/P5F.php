<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class p5f extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/p5f_model');
    $this->load->helper('my');

  }

  public function send_post(){

        $data = $this->post('datos');
        $msg="";

        $result=validtoken_get($this->post('token'));

        if (!$result) {

          $msg= array('message' => 'Token key invalid',
                      'value'=> false);
        }else{

            $array= json_decode($data,1);


            $flag = $this->P5F_model->insertBatch($array);

            if ($flag) {

              $msg= array('message' => 'Saved Successfull',
                      'value'=> true);

            }else{

              $msg= array('message' => 'Error to Save',
                      'value'=> false);

            }

        }

        $this->response($msg, 200);
    }

    public function Data_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->P5F_model->getData(no_obfuscate($this->get('id_local')),$this->get('predio'));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }



    }

}
