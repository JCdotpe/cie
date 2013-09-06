<?php defined('BASEPATH') OR exit('No direct script access allowed');


class prueba extends CI_Controller
{

    function __construct(){

        parent::__construct();
        $this->load->helper('my');
        /*$this->load->model('visor/m_tablet_model');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('udra/Udra_registro_model');
        $this->load->model('udra/udra_detalle_model');
        $this->load->model('visor/Peien_model');*/
    }
	    
	
    public function save_patrimonio2(){
      $return_arr['datos']=  array();
      for ($i=10; $i <15 ; $i++) { 
        # code...

        $data['codigo_de_locall'] = '000118';
        $data['PC_F_1'] = '1';
        $data['P3_1_NroPto'] = $i;
        $data['P3_1_3_Long'] = '1';
        $data['P3_1_3_Lat'] = '1';
        $data['P3_1_3_Alt'] = '1';

        array_push($return_arr['datos'],$data);   
      }
      $array[] = array('codigo_de_local' => '000118',
                          'PC_F_1' => 1,
                          'P3_1_NroPto' => 10,
                          'P3_1_3_Long' =>1,
                          'P3_1_3_Lat' =>1,
                          'P3_1_3_Alt' =>1
                       );
    //var_dump($return_arr['datos']);
    $json= @json_encode($return_arr['datos']);    
    $array=@json_decode($json,1);    
    var_dump($array);
     /*$array = array('codigo_de_locall' => '000118',
                          'PC_F_1' => 1,
                          'P3_1_NroPto' => 10,
                          'P3_1_3_Long' =>1,
                          'P3_1_3_Lat' =>1,
                          'P3_1_3_Alt' =>1
                       );*/
       // $res=$this->Peien_model->insertBatch($array);
      $this->batch($array);
    }
    public function batch($data){
        if(!$data) {
            return FALSE;
        }

        if(isset($data[0])) {
            $count   = count($data) - 1;
            $values  = NULL;
            $_fields = NULL;
            $_values = NULL;
            $query   = NULL;
            $i       = 0;
            $j       = 0;

            foreach($data as $insert) {
                $total = count($data[$i]) - 1;
                
                foreach($insert as $field => $value) {
                    if($j === $total) {
                        $_fields .= "$field";
                        $_values .= "'$value'";
                    } else {
                        $_fields .= "$field, ";
                        $_values .= "'$value', ";   
                    }
                            
                    $j++;   
                }
                
                $values .= ($i === $count) ? "($_values)" : "($_values), ";
                
                $fields  = $_fields;
                $_fields = NULL;
                $_values = NULL;
                
                $i++;
                $j = 0;
            }
            $table="p3_1_3n";
            $query .= "INSERT INTO $table ($fields) VALUES $values;";            
        } else {
            return FALSE;
        }
        echo $query;
    }
    public function l_query(){

      $this->Peien_model->lt_query();  
      //print_r($this->db->last_query());
      //echo $result;
      
    }
    public function test(){
      $arr=array("orden"=> 1, "codigo"=>5);
      $adic=array('clave' =>12345);
      array_push($adic, $arr);
      ____($adic);      

    }

}