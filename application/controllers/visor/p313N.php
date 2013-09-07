<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
//peiec
class P313N extends REST_Controller{

  function __construct()
  {
    parent::__construct();

    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/P313N_model');
    //$this->load->model('udra/Udra_registro_model');
    $this->load->helper('my');

  }

	public function send_post(){


        $message = $this->post('datos');
        $session=false;
        $token="";
        $msg="";

        $result=validtoken_get($this->post('token'));

        if (!$result) {
          # code...
          $msg= array('message' => 'token invalido',
                      'value'=> false);
        }else{

            $array= json_decode($message,1);
            $flag = $this->P313N_model->insertBatch($array);
            if ($flag) {

              $msg='{"message":"Puntos GPS insertados","value":true}';

              $msg= array('message' => 'Puntos GPS insertados',
                      'value'=> true);

            }else{

              $msg= array('message' => 'Error al guardar',
                      'value'=> false);

            }

        }

        $this->response($msg, 200);
    }

    public function save_patrimonio2(){
      $data = array(
                       array(
                          'codigo_de_local' => '000118',
                          'PC_F_1' => 1,
                          'P3_1_NroPto' => 1,
                          'P3_1_3_Long' =>1,
                          'P3_1_3_Lat' =>1,
                          'P3_1_3_Alt' =>1
                       ),
                       array(
                          'codigo_de_local' => '000118',
                          'PC_F_1' => 1,
                          'P3_1_NroPto' => 1,
                          'P3_1_3_Long' =>1,
                          'P3_1_3_Lat' =>1,
                          'P3_1_3_Alt' =>1
                       )
                );
      $array[] = array('codigo_de_local' => '000118',
                          'PC_F_1' => 1,
                          'P3_1_NroPto' => 10,
                          'P3_1_3_Long' =>1,
                          'P3_1_3_Lat' =>1,
                          'P3_1_3_Alt' =>1
                       );
        $flag = $this->Peien_model->insert_batch($array);
        //$res=$this->Peien_model->insert_reg($data);
        if ($res) {
            # code...
            echo "se inserto";
        }else{
            echo "no se inserto";
        }
    }

    public function l_query(){
      $this->Peien_model->last_query();

    }

}
