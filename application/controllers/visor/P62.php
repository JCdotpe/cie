<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class p62 extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/p62_model');
    $this->load->model('visor/p624n_model');
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



            $flag = $this->P62_model->insertBatch($array);

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

            $data = $this->P62_model->getData(no_obfuscate($this->get('id_local')),$this->get('Nro_Pred'),$this->get('P5_Ed_Nro'));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

    public function DataAmbiente_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->P62_model->getDataAmbiente(no_obfuscate($this->get('id_local')),$this->get('Nro_Pred'),$this->get('P5_Ed_Nro'),$this->get('P6_2_1'));
            $p624n = $this->P624N_model->getData(no_obfuscate($this->get('id_local')),$this->get('Nro_Pred'),$this->get('P5_Ed_Nro'),$this->get('P6_2_1'));

            foreach ($data->result() as $fila) {
              # code...
              $x=array("id_local" => $fila->id_local,
                "Nro_Pred" => $fila->Nro_Pred,
                "P5_NroPiso" => $fila->P5_NroPiso,
                "P5_Ed_Nro" => $fila->P5_Ed_Nro,
                "P6_2_1" => $fila->P6_2_1,
                "P6_2_3" => $fila->P6_2_3,
                "P6_2_4ID" => $p624n->result(),
                "P6_2_5"=>$fila->P6_2_5,
                "P6_2_6"=>$fila->P6_2_6,
                "P6_2_7"=>$fila->P6_2_7,
                "P6_2_7_O"=>$fila->P6_2_7_O,
                "P6_2_8" => $fila->P6_2_8,
                "P6_2_8_O" => $fila->P6_2_8_O,
                "P6_2_9" => $fila->P6_2_9,
                "P6_2_9_O" => $fila->P6_2_9_O,
                "P6_2_10" => $fila->P6_2_10,
                "P6_2_10_O" => $fila->P6_2_10_O,
                "P6_2_11" => $fila->P6_2_11,
                "P6_2_11_O" => $fila->P6_2_11_O,
                "P6_2_12" => $fila->P6_2_12,
                "P6_2_12_O" => $fila->P6_2_12_O,
                "P6_2_13" => $fila->P6_2_13,
                "P6_2_13_O" => $fila->P6_2_13_O,
                "P6_2_14_1" => $fila->P6_2_14_1,
                "P6_2_14_2" => $fila->P6_2_14_2,
                "P6_2_14_3" => $fila->P6_2_14_3,
                "P6_2_14_4" => $fila->P6_2_14_4,
                "P6_2_14_5" => $fila->P6_2_14_5,
                "P6_2_14_6" => $fila->P6_2_14_6,
                "P6_2_14a" => $fila->P6_2_14a,
                "P6_2_14b_1" => $fila->P6_2_14b_1,
                "P6_2_14b_2" => $fila->P6_2_14b_2,
                "P6_2_15" => $fila->P6_2_15,
                "P6_2_15_O" => $fila->P6_2_15_O,
                "P6_2_15a" => $fila->P6_2_15a,
                "P6_2_16a" => $fila->P6_2_16a,
                "P6_2_16a_b" => $fila->P6_2_16a_b,
                "P6_2_16a_r" => $fila->P6_2_16a_r,
                "P6_2_16a_m" => $fila->P6_2_16a_m,
                "P6_2_16b" => $fila->P6_2_16b,
                "P6_2_16b_b" => $fila->P6_2_16b_b,
                "P6_2_16b_r" => $fila->P6_2_16b_r,
                "P6_2_16b_m" => $fila->P6_2_16b_m,
                "P6_2_16c" => $fila->P6_2_16c,
                "P6_2_16c_b" => $fila->P6_2_16c_b,
                "P6_2_16c_r" => $fila->P6_2_16c_r,
                "P6_2_16c_m" => $fila->P6_2_16c_m,
                "P6_2_16d" => $fila->P6_2_16d,
                "P6_2_16d_b" => $fila->P6_2_16d_b,
                "P6_2_16d_r" => $fila->P6_2_16d_r,
                "P6_2_16d_m" => $fila->P6_2_16d_m,
                "P6_2_16e" => $fila->P6_2_16e,
                "P6_2_16e_b" => $fila->P6_2_16e_b,
                "P6_2_16e_r" => $fila->P6_2_16e_r,
                "P6_2_16e_m" => $fila->P6_2_16e_m,
                "P6_2_16e_O" => $fila->P6_2_16e_O,
                "P6_2_16f" => $fila->P6_2_16f,
                "P6_2_17a" => $fila->P6_2_17a,
                "P6_2_17b" => $fila->P6_2_17b,
                "P6_2_17c" => $fila->P6_2_17c,
                "P6_2_17d" => $fila->P6_2_17d,
                "P6_2_18a" => $fila->P6_2_18a,
                "P6_2_18a_b" => $fila->P6_2_18a_b,
                "P6_2_18a_r" => $fila->P6_2_18a_r,
                "P6_2_18a_m" => $fila->P6_2_18a_m,
                "P6_2_18b" => $fila->P6_2_18b,
                "P6_2_18b_b" => $fila->P6_2_18b_b,
                "P6_2_18b_r" => $fila->P6_2_18b_r,
                "P6_2_18b_m" => $fila->P6_2_18b_m,
                "P6_2_18c" => $fila->P6_2_18c,
                "P6_2_18c_b" => $fila->P6_2_18c_b,
                "P6_2_18c_r" => $fila->P6_2_18c_r,
                "P6_2_18c_m" => $fila->P6_2_18c_m,
                "P6_2_18d" => $fila->P6_2_18d,
                "P6_2_18d_b" => $fila->P6_2_18d_b,
                "P6_2_18d_r" => $fila->P6_2_18d_r,
                "P6_2_18d_m" => $fila->P6_2_18d_m,
                "P6_2_18e_b" => $fila->P6_2_18e_b,
                "P6_2_18e_r" => $fila->P6_2_18e_r,
                "P6_2_18e_m" => $fila->P6_2_18e_m,
                "P6_2_18e_O" => $fila->P6_2_18e_O,
                "P6_2_18f" => $fila->P6_2_18f,
                "P6_2_19a" => $fila->P6_2_19a,
                "P6_2_19b" => $fila->P6_2_19b,
                "P6_2_19c" => $fila->P6_2_19c,
                "P6_2_20Obs" => $fila->P6_2_20Obs,
                "Fregistro" => $fila->Fregistro,
                "Fenvio" => $fila->Fenvio,
                "Frecep" => $fila->Frecep,
                "Version" => $fila->Version
                );
            }

           $jsonData = my_json_encode(array($x));

           prettyPrint($jsonData);

        }

    }

}




