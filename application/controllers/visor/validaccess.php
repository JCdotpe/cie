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
require APPPATH.'/libraries/REST_Controller.php';



class validaccess extends REST_Controller
{

    function __construct(){
        parent::__construct();        
        $this->load->model('visor/m_tablet_model');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }
	    
	public function access_get($imei)
	{
        /*$bool=false;
        $response="";
        if ($this->tank_auth->is_logged_in()) {            

            $bool=true;
            $response='[{"status":1,"comment":"valido"}]';

        }else{
*/
            //$data=$this->m_tablet_model->count($this->get('imei'));
            $data=$this->m_tablet_model->count($imei);
            var_dump($data);

  //      }

	}

    public function verified_auth(){

        $bool=false;

        if ($this->tank_auth->is_logged_in()) {            
            $bool=true;
        }
        

    }

}