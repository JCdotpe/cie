<?php 
class Principal extends CI_MODEL{

	public function get_predios($id){
        $this->db->where('id_local',$id);
        $q = $this->db->get('P1_B_2A_N');
        return $q;
    }


//CAR
    public function get_car($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('PCar');
        return $q;
    }

    public function get_car_n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('PCar_C_1N');
        return $q;
    }
//CAR




//CAP3
    public function get_cap3($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P3_1');
        return $q;
    }   

    public function get_cap3_n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('P3_1_3N');
        return $q;
    }
//CAP3
 
}