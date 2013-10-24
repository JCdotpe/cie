<?php 
class Cap6_model extends CI_MODEL{
	
	public function get_cap6($id,$pr,$edi)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P6_1');
		return $q;
	}

	public function get_cap6_1_8n($id,$pr,$edi)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P6_1_8N');
		return $q;
	}

	public function get_cap6_1_10n($id,$pr,$edi)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P6_1_10N');
		return $q;
	}

	public function get_cap6_2($id,$pr,$edi,$piso,$amb)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_Ed_Nro', $edi );
		$this->db->where('P5_NroPiso', $piso );
		$this->db->where('P6_2_1', $amb );
		$q = $this->db->get('P6_2');
		return $q;
	}

	public function get_cap6_2_4n($id,$pr,$edi,$piso,$amb)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_Ed_Nro', $edi );
		$this->db->where('P5_NroPiso', $piso );
		$this->db->where('P6_2_1', $amb );
		$q = $this->db->get('P6_2_4N');
		return $q;
	}

	function consulta_cap6($id,$pr,$edi){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P7');
		return $q;
	}

	function insert_cap6($data){
		$this->db->insert('P6_1', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap6($id,$pr,$edi,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('Nro_Ed', $edi);
		$this->db->update('P6_1', $data);
		return $this->db->affected_rows() > 0;
	}

	function delete_cap6_1_8n($id,$pr,$edi){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );       
		$this->db->where('Nro_Ed', $edi );
		$this->db->delete('P6_1_8N');
		return $this->db->affected_rows() > 0;
	}

	function insert_cap6_1_8n($data){
		$this->db->insert('P6_1_8N', $data);
		return $this->db->affected_rows() > 0;
	}

	function delete_cap6_1_10n($id,$pr,$edi){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );       
		$this->db->where('Nro_Ed', $edi );
		$this->db->delete('P6_1_10N');
		return $this->db->affected_rows() > 0;
	}

	function insert_cap6_1_10n($data){
		$this->db->insert('P6_1_10N', $data);
		return $this->db->affected_rows() > 0;
	}

	function consulta_cap6_2($id,$pr,$edi,$piso,$amb){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P5_Ed_Nro', $edi );
		$this->db->where('P5_NroPiso', $piso );
		$this->db->where('P6_2_1', $amb );
		$q = $this->db->get('P6_2');
		return $q;
	}


	function insert_cap6_2($data){
		$this->db->insert('P6_2', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap6_2($id,$pr,$edi,$piso,$amb,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P5_Ed_Nro', $edi );
		$this->db->where('P5_NroPiso', $piso );
		$this->db->where('P6_2_1', $amb );
		$this->db->update('P6_2', $data);
		return $this->db->affected_rows() > 0;
	}

	function delete_cap6_2_4n($id,$pr,$edi,$piso,$amb){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );       
		$this->db->where('P5_Ed_Nro', $edi );
		$this->db->where('P5_NroPiso', $piso );
		$this->db->where('P6_2_1', $amb );
		$this->db->delete('P6_2_4N');
		return $this->db->affected_rows() > 0;
	}

	function insert_cap6_2_4n($data){
		$this->db->insert('P6_2_4N', $data);
		return $this->db->affected_rows() > 0;
	}

}

?>