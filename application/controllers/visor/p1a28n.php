<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class P1a28n extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/p1a28n_model');
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



            $flag = $this->P1A28N_model->insertBatch($array);

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

            $data = $this->P1A28N_model->getData(no_obfuscate($this->get('id_local')));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }



    }

    public function Tabla_get(){

    header_json();

    $data = $this->P1A28N_model->Data_P1_A_2_8N(no_obfuscate($this->get('id_local')),$this->get("predio"),$this->get("nroie"));

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
                "anexos" => $this->get_P1_A_2_9N(no_obfuscate($this->get("id_local")),$this->get("predio"),$this->get("nroie"),$fila->P1_A_2_9_NroCMod));

          $jsonData = my_json_encode($x);

          prettyPrint($jsonData);


      $i++;

    }

    echo "]";

  }

  public function get_P1_A_2_9N($id_local,$predio,$NroIE,$NroCMod){

    $data = $this->P1A28N_model->Data_P1_A_2_9N($id_local,$predio,$NroIE,$NroCMod);


    return $data->result();

  }

}
