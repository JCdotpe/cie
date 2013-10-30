<?php 
class Principal_model extends CI_MODEL{
	//predios
	function get_predios($id){
        $this->db->where('id_local',$id);
        $q = $this->db->get('P1_B_2A_N');
        return $q;
    }

    //predio i
    function get_predio($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B_3N');
        return $q;
    }

    function insert_pr($data,$tb){
        $this->db->insert($tb, $data);
        return $this->db->affected_rows() > 0;
    }   

    function update_pr($id,$pr,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update('P1_B_3N',$data);
        return $this->db->affected_rows() > 0;
    }

    //predio n
    function get_predio_n($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B_3_12N');
        return $q;
    }
    function delete_predio_n($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->delete('P1_B_3_12N');
        return $this->db->affected_rows() > 0;
    }



    //P1_B
	function get_prct($id,$pr){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $q = $this->db->get('P1_B');
        return $q;
    }

    function update_prct($id,$pr,$data){
        $this->db->where('id_local',$id);
        $this->db->where('Nro_Pred',$pr);
        $this->db->update('P1_B',$data);
        return $this->db->affected_rows() > 0;
    }
    //P1_B


 	function get_fields($c){
        $q = $this->db->list_fields($c);
        return $q;
    }


}