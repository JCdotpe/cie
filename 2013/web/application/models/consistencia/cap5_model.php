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
}

?>