<?php 
class Cap8_model extends CI_MODEL{
	
	public function get_cap8($id,$pr,$tipo,$nro)
	{
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P8_2_Tipo', $tipo );
		$this->db->where('P8_2_Nro', $nro );
		$q = $this->db->get('P8');
		return $q;
	}

	function consulta_cap8($id,$pr,$tipo,$nro){
		$this->db->where('id_local', $id );
		$this->db->where('Nro_Pred', $pr );
		$this->db->where('P8_2_Tipo', $tipo );
		$this->db->where('P8_2_Nro', $nro );
		$q = $this->db->get('P8');
		return $q;
	}

	function insert_cap8($data){
		$this->db->insert('P8', $data);
		return $this->db->affected_rows() > 0;
	}

	function update_cap8($id,$pr,$tipo,$nro,$data){
		$this->db->where('id_local',$id);
		$this->db->where('Nro_Pred',$pr);
		$this->db->where('P8_2_Tipo',$tipo);
		$this->db->where('P8_2_Nro',$nro);
		$this->db->update('P8', $data);
		return $this->db->affected_rows() > 0;
	}
}

?>