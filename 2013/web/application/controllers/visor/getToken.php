<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/rest_controller.php';



class getToken extends REST_Controller
{

    public $token;

    function __construct(){
        parent::__construct();
        $this->load->model('visor/Personal_Patrimonio_model');
        $this->load->model('visor/patrimonial_model');
        $this->load->model('visor/V_procesoseleccion_model');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }

    public function handling_errors($code){

        switch ($code) {
            case 1:
               
                $msg=  array('message' => "Dni no existe",
                               'value'=> false);

                $this->response($msg, 200);

                break;

            case 2:
               
                $msg=  array('message' => "Codigo patrimonial no existe",
                               'value'=> false);

                $this->response($msg, 200);

                break;
            case 3:
               
                $msg=  array('message' => "Error de insercion",
                               'value'=> false);

                $this->response($msg, 200);

                break;
            case 4:
                # code...

                $msg=  array('message' => "IMEI ya registrado",
                             'value'=> false,
                             'token' => $this->token);
                $this->response($msg, 400);

                break;
        }

    }

    public function verify_post(){

        if(!$this->post('dni') or !$this->post('cod_pat') or !$this->post('imei'))
        {
            $this->response(NULL, 400);
        }
        $msg="";
        $next=true;
        $resulimei=$this->Personal_Patrimonio_model->get_imei($this->post('imei'));

         foreach ($resulimei->result() as $fila ){

            $this->token=$fila->token;
         
         }

        if ($resulimei->num_rows() > 0) {
            # code...
            $code=4;
            $this->token=
            $this->handling_errors($code);
            return false;
        }

        $resuldni=$this->V_procesoseleccion_model->Get_Dni($this->post('dni'));

        // verifica dni
        if ($resuldni->num_rows() <= 0){
            $code=1;
            $this->handling_errors($code);
            $next=false;


        }else{

            // verifica codigo patrimonial
            $resulpatri=$this->patrimonial_model->Get_Patrimonio($this->post('cod_pat'));
            if ($resulpatri->num_rows()<=0) {
                # code...
                $code=2;
                $this->handling_errors($code);
                $next=false;

            }
        }

        if ($next) {

            /*$token = sha1(microtime());*/
            $this->token = sha1(microtime());

            $array= array('imei' => $this->post('imei'),
                          'dni'=> $this->post('dni'),
                          'cod_pat' => $this->post('cod_pat'),
                          'token' => $this->token,
                          'fecha_reg'=>date('Y-m-d')." ".date("H:i:s"));


            $flag = $this->Personal_Patrimonio_model->insert_reg($array);

            if ($flag){
                $msg=  array('token' => $this->token,
                               'value'=> true);
            }else{

                $code=3;
                $this->handling_errors($code);

            }

        }

        $this->response($msg, 200);

    }


}