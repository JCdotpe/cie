<?php 
class Cap5_model extends CI_MODEL{
	
	public function get_cap5($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P5');
		return $q;
	}

	public function get_cap5_f($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr ); 	
		$q = $this->db->get('P5_F');
		return $q;
	}

	public function get_cap5_n($id,$pr,$piso)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_NroPiso', $piso );
		$q = $this->db->get('P5_N');
		return $q;
	}

	function consulta_cap5($id,$pr){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P5');
		return $q;
	}

	function insert_cap5($data){
		$this->db->insert('P5', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap5($id,$pr,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->update('P5', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap5_f($id,$pr,$nropiso,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P5_NroPiso',$nropiso);
		$this->db->update('P5_F', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap5_n($id,$pr,$nropiso,$nroedif,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P5_NroPiso',$nropiso);
		$this->db->where('P5_Ed_Nro',$nroedif);
		$this->db->update('P5_N', $data);
		return $this->db->affected_rows() > 0;
	}

	public function get_cap5n_for_p6_2($id,$pr,$nroedif)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_Ed_Nro', $nroedif );
		$q = $this->db->get('P5_N');
		return $q;
	}

}

?>