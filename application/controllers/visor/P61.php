<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
//peiec
class P61 extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/P61_model');
    $this->load->model('visor/P618N_model');
    $this->load->model('visor/P6110N_model');
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

            foreach ($array as $key => $value) {

              $array[$key]['version']='1';// poner 99 mas adelante

            }

            $flag = $this->P61_model->insertBatch($array);

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

            $data = $this->P61_model->getData(no_obfuscate($this->get('id_local')));

            $jsonData = json_encode($data->result());

            prettyPrint($jsonData);
        }
    }
    public function DataNroEdif_get(){

        $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->P61_model->getDataNroEdif(no_obfuscate($this->get('id_local')),$this->get('Nro_Pred'),$this->get('NRO_ED'));
            $p618n = $this->P618N_model->getData(no_obfuscate($this->get('id_local')),$this->get('Nro_Pred'),$this->get('NRO_ED'));
            $p6110n = $this->P6110N_model->getData(no_obfuscate($this->get('id_local')),$this->get('Nro_Pred'),$this->get('NRO_ED'));

            foreach ($data->result() as $fila) {
              # code...
              $x=array("id_local" => $fila->id_local,
                "Nro_Pred" => $fila->Nro_Pred,
                "Nro_Ed" => $fila->Nro_Ed,
                "P6_1_3" => $fila->P6_1_3,
                "P6_1_4" => $fila->P6_1_4,
                "P6_1_5" => $fila->P6_1_5,
                "P6_1_6" => $fila->P6_1_6,
                "P6_1_7" => $fila->P6_1_7,
                "P6_1_8" => $fila->P6_1_8,
                "P6_1_8_N" => $p618n->result(),
                "P6_1_9" => $fila->P6_1_9,
                "P6_1_10_e" => $p6110n->result()
                );
            }
            $jsonData = json_encode(array($x));

            prettyPrint($jsonData);
        }
    }

}
