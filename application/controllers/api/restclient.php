 <?php

 class restclient extends CI_Controller {

 	public function token(){

		function __construct() {
			parent::__construct();

		}

		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, 'http://192.168.202.191/cie/index.php/visor/getToken/verify/format/json');
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		 curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
		    'imei' => '6',
			'dni' => '00039083',
			'cod_pat' => '12345'));


		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);

		$result = json_decode($buffer);
		echo $buffer;

	}

	public function ci_curl3(){

		function __construct() {
			parent::__construct();

		}

		/*$return_arr['datos']=  array();
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

		$json= json_encode($return_arr['datos']);*/

		$json='{{"RutaFoto":"ruta Foto","id_local":000142,"Nro_Pred":1,"token":"ee5fc378a104ac0581aef116e4adaf18d056b5e9","Observaciones":"obs 1","Fenvio":"2014-12-12","P3_1_1_LugGeoref":1,"Version":1,"FRegistro":"2014-12-12","Frecep":"2014-12-12"}]';
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
		for ($i=1; $i <10 ; $i++) {
			# code...

			$data['id_local'] = '000118';
			$data['PC_F_1'] = '1';
			$data['CodigoPuntoGPS'] = $i;
			$data['LongitudPunto'] = '123';
			$data['LatitudPunto'] = '1234';
			$data['AltitudPunto'] = '12345';

			array_push($return_arr['datos'],$data);
		}

		$json= json_encode($return_arr['datos']);

		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/cie/index.php/visor/p313N/send/format/json');
		//curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/trabajos/inei/cie/index.php/api/example/user/id/1/format/json');
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		//curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$array);
		$data=array(
		    'datos' => $json,
		    'token'=> '7959ac60dc22523a9ac306ac6f9308d3d7201c55');

		 curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
		 $data=json_encode($data);
		 $decode=json_decode($data,1);

		 var_dump($decode);
		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);

		$result = json_decode($buffer);
		echo $buffer;
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