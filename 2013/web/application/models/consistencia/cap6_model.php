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

}

?>