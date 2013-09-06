<?php  

require APPPATH.'/libraries/REST_Controller.php';
require APPPATH.'/controllers/validaccess.php';

class P31 extends REST_Controller {

    public $access;

	function __construct()
    {
        parent::__construct();

        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');    
        $this->load->model('visor/P31_model');
        //$this->load->library('../controllers/validaccess');
        $obj=new validaccess();
        $this->access=$obj->validtoken_get($this->get('token'));
        //$this->load->helper('my');
    }

    public function send_post(){
        
        //if($this->$access==TRUE){
            
            $message = $this->post('datos');
            $array= json_decode($message,1);        
            $flag = $this->P31_model->insertBatch($array);
           
            if($flag){
             
              $msg='{"message":"Puntos GPS insertados","value":true}';
         
            }else{

              $msg='{"message":"Error de insercion","value":false}';

            }
           
            $this->response($msg, 200);

        //}

    }

    public function Data_get(){

        if($this->access==TRUE){

            header_json();
            
            $data = $this->P31_model->Data_P3_1($_REQUEST["cod_local"]);

            $jsonData = json_encode($data->result());

            prettyPrint($jsonData);
        }

    }

}

?>