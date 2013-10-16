<?php 
class Cap4_model extends CI_MODEL{
	
	public function get_cap4($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P4');
		return $q;
	}

	public function get_cap4_n($id,$pr)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$q = $this->db->get('P4_2N');
		return $q;
    }
}

?>