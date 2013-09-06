 <?php

 class restclient extends CI_Controller {

 	public function token(){

		function __construct() {
			parent::__construct();
			
		}

		//$return_arr['datos']=  array();
		//for ($i=2; $i <10 ; $i++) { 

			
						
		//	array_push($return_arr['datos'],$data);		
		//}
		
		//$json= json_encode($return_arr['datos']);
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/cie/index.php/visor/validaccess/verify/format/json');  
		//curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/trabajos/inei/cie/index.php/api/example/user/id/1/format/json'); 
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl_handle, CURLOPT_POST, 1);  
		//curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$array);   
		 curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array( 
		    'imei' => '6',
			'dni' => '40660637',
			'cod_pat' => '4646'));		   
		
		
		$buffer = curl_exec($curl_handle);  
		curl_close($curl_handle);  
		  
		$result = json_decode($buffer); 
		echo $buffer;

	}

	public function ci_curl3(){

		function __construct() {
			parent::__construct();
			
		}

		$return_arr['datos']=  array();
		//for ($i=2; $i <10 ; $i++) { 

			$data["codigo_de_local"] = "000118";
			$data["PC_F_1"] = 1;
			$data["P3_1_1_LugGeoref"] = 1;
			$data["P3_1_3_NroPtos"] = 1;
			$data["P3_1_4_ArchGPS"] = "archivo gps";
			$data["P3_1_5_CodFoto"] = "000118_foto_cap3";
			$data["PC_Version"]=1;
			
			array_push($return_arr['datos'],$data);		
		//}
		
		$json= json_encode($return_arr['datos']);
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/cie/index.php/visor/p31/send/format/json');  
		//curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/trabajos/inei/cie/index.php/api/example/user/id/1/format/json'); 
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl_handle, CURLOPT_POST, 1);  
		//curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$array);   
		 curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(  
		    'datos' => $json		   
		));
		
		$buffer = curl_exec($curl_handle);  
		curl_close($curl_handle);  
		  
		$result = json_decode($buffer); 
		echo $result;

	}

	public function ci_curl2() {

		function __construct() {
			parent::__construct();
			
		}

	    // Alternative JSON version  
		// $url = 'http://twitter.com/statuses/update.json';  
		// Set up and execute the curl process 
		$return_arr['datos']=  array();
		for ($i=40; $i <43 ; $i++) { 
			# code...

			$data['codigo_de_local'] = '000118';
			$data['PC_F_1'] = '1';
			$data['P3_1_NroPto'] = $i;
			$data['P3_1_3_Long'] = '1';
			$data['P3_1_3_Lat'] = '1';
			$data['P3_1_3_Alt'] = '1';

			array_push($return_arr['datos'],$data);		
		}
		

		
		// var_dump($return_arr['datos']);
		//$this->curl->post($return_arr);
		//$array= json_encode(array('datos' => 'migue'));
		$json= json_encode($return_arr['datos']);
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/cie/index.php/visor/p313N/send/format/json');  
		//curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/trabajos/inei/cie/index.php/api/example/user/id/1/format/json'); 
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl_handle, CURLOPT_POST, 1);  
		//curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$array);   
		 curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(  
		    'datos' => $json, 
		    'token'=>'f45bfb3df92b50f73b71e32830bb5788e0a263cc1'));
		
		$buffer = curl_exec($curl_handle);  
		curl_close($curl_handle);  
		  
		$result = json_decode($buffer); 
		echo $result;
		//var_dump($result);

		 
	}

	public function ci_curl($new_name, $new_email) {

		function __construct() {
			parent::__construct();

			$this->load->library('tank_auth');
			$this->lang->load('tank_auth');
			$this->load->model('convocatoria/convocatoria_model');
		}

	    $username = 'admin';  
		$password = '1234';  
		  
		// Alternative JSON version  
		// $url = 'http://twitter.com/statuses/update.json';  
		// Set up and execute the curl process  
		$curl_handle = curl_init();  
		curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/trabajos/inei/cie/index.php/api/example/user/id/1/format/json');  
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($curl_handle, CURLOPT_POST, 1);  
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(  
		    'name' => $new_name,  
		    'email' => $new_email  
		));  
		  
		// Optional, delete this line if your API is open  
		//curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);  
		  
		$buffer = curl_exec($curl_handle);  
		curl_close($curl_handle);  
		  
		$result = json_decode($buffer); 
		var_dump($result);
		if(isset($result->status) && $result->status == 'success')  
		{  
		    echo 'User has been updated.';  
		}  
		  
		else  
		{  
		    echo 'Something has gone wrong';  
		} 
	}




}  


  ?>