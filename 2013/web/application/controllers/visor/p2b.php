<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class P2b extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/p2b_model');
    $this->load->model('visor/p2b9n_model');
    $this->load->model('visor/p2b10n_model');
    $this->load->model('visor/p2b11n_model');
    $this->load->model('visor/p2b12n_model');
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



            $flag = $this->p2b_model->insertBatch($array);

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

            /*-------------modelos------------*/

            $data =  $this->p2b_model->getData(no_obfuscate($this->get('id_local')), $this->get('predio'));
            $p2b9n= $this->p2b9n_model->getData(no_obfuscate($this->get('id_local')), $this->get('predio'));
            $p2b10n= $this->p2b10n_model->getData(no_obfuscate($this->get('id_local')), $this->get('predio'));
            $p2b11n= $this->p2b11n_model->getData(no_obfuscate($this->get('id_local')), $this->get('predio'));
            $p2b12n= $this->p2b12n_model->getData(no_obfuscate($this->get('id_local')), $this->get('predio'));

            $i=0;
            

            foreach ($data->result() as $fila ){
                $i++;
                $x= array("P2_B_1_Topo"=> $fila->P2_B_1_Topo,
                        "P2_B_2_Suelo"=> $fila->P2_B_2_Suelo,
                        "P2_B_2_Suelo_O"=> $fila->P2_B_2_Suelo_O,
                        "P2_B_3_Prof"=> $fila->P2_B_3_Prof,
                        "P2_B_4_CapAcc"=> $fila->P2_B_4_CapAcc,
                        "P2_B_5_1"=> $fila->P2_B_5_1,
                        "P2_B_5_2"=> $fila->P2_B_5_2,
                        "P2_B_5_3"=> $fila->P2_B_5_3,
                        "P2_B_5A_Uso"=> $fila->P2_B_5A_Uso,
                        "P2_B_5B_1"=> $fila->P2_B_5B_1,
                        "P2_B_5B_2"=> $fila->P2_B_5B_2,
                        "P2_B_5B_3"=> $fila->P2_B_5B_3,
                        "P2_B_5B_4"=> $fila->P2_B_5B_4,
                        "P2_B_6_Trec_H"=> $fila->P2_B_6_Trec_H,
                        "P2_B_6_Trec_M"=> $fila->P2_B_6_Trec_M,
                        "P2_B_7_Ttramo_H"=> $fila->P2_B_7_Ttramo_H,
                        "P2_B_7_Ttramo_M"=> $fila->P2_B_7_Ttramo_M,
                        "P2_B_8_Pelig"=>trim($fila->P2_B_8_Pelig),
                        "Fregistro"=>trim($fila->Fregistro),
                        "Fenvio"=>trim($fila->Fenvio),
                        "Frecep"=>trim($fila->Frecep),
                        "peligros1"=> $p2b9n->result(),
                        "peligros2"=>$p2b10n->result(),
                        "peligros3"=>$p2b11n->result(),
                        "vulnerabilidades"=>$p2b12n->result());
            }

            if($i>0){
                
                $jsonData = my_json_encode(array($x));
                prettyPrint($jsonData);
            
            }else{
                echo '{"status":"No hay datos"}';
            }
      }



  }
}
