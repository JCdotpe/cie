<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class P61 extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/p61_model');
    $this->load->model('visor/p618n_model');
    $this->load->model('visor/p6110n_model');
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



            $flag = $this->p61_model->insertBatch($array);

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

            $data = $this->p61_model->getData(no_obfuscate($this->get('id_local')),$this->get('predio'));

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

            $data = $this->p61_model->getDataNroEdif(no_obfuscate($this->get('id_local')),$this->get('predio'),$this->get('NRO_ED'));
            $p618n = $this->p618n_model->getData(no_obfuscate($this->get('id_local')),$this->get('predio'),$this->get('NRO_ED'));
            $p6110n = $this->p6110n_model->getData(no_obfuscate($this->get('id_local')),$this->get('predio'),$this->get('NRO_ED'));

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
                "P6_1_10_e" => $p6110n->result(),
                "P6_3_1" => $fila->P6_3_1,
                "P6_3_1A" => $fila->P6_3_1A,
                "P6_3_2" => $fila->P6_3_2,
                "P6_3_2A" => $fila->P6_3_2A,
                "P6_3_2B" => $fila->P6_3_2B,
                "P6_3_2C" => $fila->P6_3_2C,
                "P6_3_2D" => $fila->P6_3_2D,
                "P6_3_3" => $fila->P6_3_3,
                "P6_3_3A" => $fila->P6_3_3A,
                "P6_4_1" => $fila->P6_4_1,
                "P6_4_1A" => $fila->P6_4_1A,
                "P6_4_2" => $fila->P6_4_2,
                "P6_5_1" => $fila->P6_5_1,
                "P6_5_1A" => $fila->P6_5_1A,
                "P6_Obs" => $fila->P6_Obs,
                "Fregistro" => $fila->Fregistro,
                "Fenvio" => $fila->Fenvio,
                "Frecep" => $fila->Frecep
                );
            }
            $jsonData = my_json_encode(array($x));

            prettyPrint($jsonData);
        }
    }

}
