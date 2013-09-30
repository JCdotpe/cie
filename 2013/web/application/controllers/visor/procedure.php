<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/rest_controller.php';
//peiec
class Procedure extends REST_Controller{

  function __construct(){

    parent::__construct();
    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $this->load->model('visor/procedure_model');
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

            $data = $this->procedure_model->Lista_IE(no_obfuscate($this->get('id_local')),$this->get('predio'));

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

            $data = $this->procedure_model->Lista_Predio(no_obfuscate($this->get('id_local')));

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

            $data = $this->procedure_model->Lista_Anexo(no_obfuscate($this->get('id_local')));

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

            $data = $this->procedure_model->Anexo_Datos(no_obfuscate($this->get('id_local')),$this->get('predio'),$this->get('nmodulo'),$this->get('nroie'),$this->get('anexo'));

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

            $data = $this->procedure_model->Lista_CIE();

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }


    public function Lista_GPS_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);
          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->procedure_model->Lista_Last_Gps_by_sede($this->get('sede'),$this->get('provincia'),$this->get('periodo'));

            $jsonData = my_json_encode($data->result());

            prettyPrint($jsonData);

        }

    }

    public function QueryLocal_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);

          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->procedure_model->query_by_Local($this->get('id_local'));
            $res="";
            $i=0;
            echo "[";

            foreach ($data->result() as $fila ){

                if($i>0){echo",";}

                $res=array("codigo_de_local" => "<a href='visor/caratula1/?le=".obfuscate($fila->codigo_de_local)."&pr=1'>".$fila->codigo_de_local."</a>",
                           "Departamento" => $fila->Departamento,
                           "Provincia" => $fila->Provincia,
                           "Distrito" => $fila->Distrito,
                           "IE" => $fila->IE,
                           "Registrado" => $fila->Registrado,
                           "GPS" => $fila->GPS,
                           "Foto" => $fila->Foto);

                $jsonData = my_json_encode($res);
           
                prettyPrint($jsonData);

                 $i++;

            }

            echo "]";

        }

    }

    public function querySede_get(){

         $result=validtoken_get($this->get('token'));

        if (!$result) {

          $msg= array('message' => 'Token Key Invalid',
                      'value'=> false);

          prettyPrint(json_encode($msg));

        }else{

            header_json();

            $data = $this->procedure_model->querySede($this->get('sede'),$this->get('provincia'),$this->get('periodo'));
           
           $res="";
            $i=0;
            echo "[";

            foreach ($data->result() as $fila ){

                if($i>0){echo",";}

                $res=array("codigo_de_local" => "<a href='visor/capitulo1/?le=".obfuscate($fila->codigo_de_local)."&pr=1'>".$fila->codigo_de_local."</a>",
                           "Departamento" => $fila->Departamento,
                           "Provincia" => $fila->Provincia,
                           "Distrito" => $fila->Distrito,
                           "IE" => $fila->IE,
                           "Registrado" => $fila->Registrado,
                           "GPS" => $fila->GPS,
                           "Foto" => $fila->Foto);

                $jsonData = my_json_encode($res);
           
                prettyPrint($jsonData);

                $i++;

            }

            echo "]";

        }

    }    

    

}
