<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpr_Model extends CI_Model {

	function insert_reg($data){
		
		$query="INSERT INTO Cuestionario VALUES('".$data['cod_cap']."','".$data['cod_sec']."','".$data['cod_preg']."','".$data['CCDD']."','".$data['CCPP']."','".$data['CCDI']."',".$data['cargo'].",'".$data['nombre']."','".$data['dni']."','".$data['consulta']."',getdate(),0)";
		$this->db->query($query);
		return $this->db->affected_rows();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */