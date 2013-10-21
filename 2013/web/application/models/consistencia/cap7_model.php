<?php 
class Cap7_model extends CI_MODEL{
	
	public function get_cap7($id,$pr,$edi)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('Nro_Ed', $edi );
		$q = $this->db->get('P7');
		return $q;
	}
}

?>