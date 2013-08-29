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
    }

	    
	public function send_post()
	{
		var_dump($this->request->body);
	}


	public function send_put()
	{
		//var_dump($this->put('foo'));
            $data=array('codigo_IMEI' => 1, 'estado' => 1, 'observacion' => 'hola');
            $flag = $this->m_tablet_model->insert($data);

	}
}