<?php defined('BASEPATH') OR exit('No direct script access allowed');


class validaccess extends CI_Controller
{

    function __construct(){
        parent::__construct();        
        $this->load->model('visor/m_tablet_model');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }
	    
	
    public function access_post($imei)
    {
        
        $bool=false;
        $response="";
        if ($this->tank_auth->is_logged_in()) {            

            $bool=true;
            $response='[{"status":1,"comment":"valido"}]';
            

        }else{

            if($imei)  {  
                $data=$this->m_tablet_model->count($imei);
                foreach ($data->result() as $filas) {

                    $total=$filas->total;
                }

                // valido que exista
                if ($total>0){
                    $response='[{"status":1,"comment":"valido"}]';
                    $bool=true;
                }else{
                    $response='[{"status":2,"comment":"invalido"}]';
                    $bool=false;
                }
            }else{
                $bool=false;
                $response='[{"status":3,"comment":"imei requerido"}]';
            }            

        }
        return $bool;
    }   

}