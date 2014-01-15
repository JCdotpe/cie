<?php 
class Reporte_model extends CI_MODEL{

	function get_avance_digitacion(){
		$q=$this->db->query("PA_Reporte_Digit_OTIN_Dpto");
		return $q;
	}

	function get_avance_digitacion_userdig(){
		$q=$this->db->query("PA_Reporte_Digit_OTIN_Digitador");
		return $q;
	}

	function get_cobertura_otin(){
		$q=$this->db->query("PA_Cobertura_OTIN");
		return $q;
	}

	function get_estado_situacional(){
		$q=$this->db->query("PA_Estado_Bases_CIE");
		return $q;
	}

	function get_ResultadoFinal($id)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', 1 );
		$q = $this->db->get('PCar');
		return $q;
	}

	function get_validacion($id,$resul_final){
		$q=$this->db->query("PA_Reglas_Validacion ?, ?", array($id, $resul_final));
		return $q;
	}

	function get_EstadoPadlocal($id)
	{
		$this->db->where('codigo_de_local', $id );
		$q = $this->db->get('Padlocal');
		return $q;
	}

	function update_estado_dig($id,$data){
		$this->db->where('codigo_de_local',$id);
		$this->db->update('Padlocal', $data);
		return $this->db->affected_rows() > 0;
	}

}