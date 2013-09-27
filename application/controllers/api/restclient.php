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
		$token="7959ac60dc22523a9ac306ac6f9308d3d7201c55";
		//$json='{{"RutaFoto":"ruta Foto","id_local":000142,"Nro_Pred":1,"token":"ee5fc378a104ac0581aef116e4adaf18d056b5e9","Observaciones":"obs 1","Fenvio":"2014-12-12","P3_1_1_LugGeoref":1,"Version":1,"FRegistro":"2014-12-12","Frecep":"2014-12-12"}]';
		$json='[
	{
		"id_local": "000024",
		"Nro_Pred": "1",
		"PC_CedAdic": "2",
		"PC_CedNum": "",
		"PC_CedTot": "",
		"PC_CedAdic_Mot": "",
		"PC_A_1_Dep": "01",
		"PC_A_2_Prov": "01",
		"PC_A_3_Dist": "01",
		"PC_A_4_CentroP": "CHACHAPOYAS",
		"PC_A_5_NucleoUrb": "CHACHAPOYAS",
		"PC_A_6_Ugel": "UGEL CHACHAPOYAS",
		"PC_A_7Dir_1_Tvia": "3",
		"PC_A_7Dir_2_Nomb": "CHACHAPOYAS",
		"PC_A_7Dir_3_Nro": "SN",
		"PC_A_7Dir_4_Piso": "1",
		"PC_A_7Dir_5_Mz": " ",
		"PC_A_7Dir_6_Lt": " ",
		"PC_A_7Dir_7_Sect": " ",
		"PC_A_7Dir_8_Zona": " ",
		"PC_A_7Dir_9_Et": " ",
		"PC_A_7Dir_10_Km": " ",
		"PC_A_8_DirVerif": "2",
		"PC_A_9_RefDir": "FRENTE A SOL DE ORO",
		"PC_B_1_CodLocal": "000024",
		"PC_B_2_CantEv": "1",
		"PC_C_2_Rfinal_fecha": "2013-09-20",
		"PC_C_2_Rfinal_resul": "1",
		"PC_C_2_Rfinal_resul_O": " ",
		"PC_D_EvT_dni": "41425365",
		"PC_D_EvT_Nomb": "KEVIN MALPARTIDA SOSA",
		"PC_D_JBri_dni": "        ",
		"PC_D_JBri_Nomb": " ",
		"PC_D_CProv_dni": "        ",
		"PC_D_CProv_Nomb": " ",
		"PC_D_CDep_dni": "        ",
		"PC_D_CDep_Nomb": " ",
		"PC_D_SupN_dni": "        ",
		"PC_D_SupN_Nomb": " ",
		"PC_E_1_TPred": "6",
		"PC_E_2_TPred_NoCol": "5",
		"PC_E_3_TEdif": "0",
		"PC_E_4_TPat": "0",
		"PC_E_5_TLosa": "0",
		"PC_E_6_TCist": "0",
		"PC_E_7_TMurCon": "0",
		"Fregistro": "",
		"Fenvio": "",
		"Frecep": "09/08/2013",
		"Version": ""
	}
]';
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, 'http://webinei.inei.gob.pe/cie/2013/web/index.php/visor/pcar/send/format/json');
		//curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/trabajos/inei/cie/index.php/api/example/user/id/1/format/json');
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		//curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$array);
		 curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
		    'datos' => $json,
		    'token' => $token
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