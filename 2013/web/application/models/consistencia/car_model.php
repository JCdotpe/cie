<?php 
class Car_model extends CI_MODEL{

//CAR
    public function get_car($id,$pr){
		$this->db->select('pc.*');
		$this->db->select('d.CCDD, d.Nombre as departamento');
		$this->db->select('p.CCPP, p.Nombre as provincia');
		$this->db->select('di.CCDI, di.Nombre as distriton');
		$this->db->from('PCar pc');
        $this->db->join('DPTO d','pc.PC_A_1_Dep = d.CCDD','inner');	    	
        $this->db->join('PROV p','pc.PC_A_1_Dep = p.CCDD and pc.PC_A_2_Prov = p.CCPP','inner');	    	
        $this->db->join('DIST di','pc.PC_A_1_Dep = di.CCDD and pc.PC_A_2_Prov = di.CCPP and pc.PC_A_3_Dist = di.CCDI','inner');	    	
        $this->db->where('pc.id_local', $id );
        $this->db->where('pc.Nro_Pred', $pr );
        $q = $this->db->get();
        return $q;
    }

    public function get_car_n($id,$pr){
        $this->db->where('id_local', $id );
        $this->db->where('Nro_Pred', $pr );
        $q = $this->db->get('PCar_C_1N');
        return $q;
    }

    public function get_car_distritos($d,$p){
        $this->db->where('CCDD', $d );
        $this->db->where('CCPP', $p);
        $this->db->order_by('Nombre asc');
        $q = $this->db->get('DIST');
        return $q;
    }    
//CAR

}