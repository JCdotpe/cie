<?php

class P62_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P6_2',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$pc_f_1,$nro_ed){

        $this->db->select('*');
        $this->db->from('P6_2');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$pc_f_1);
        $this->db->where('P5_Ed_Nro',$nro_ed);
        $q = $this->db->get();
        return $q;

    }

    public function getDataAmbiente($codigo_de_local,$pc_f_1,$nro_ed,$nro_ambiente){

        $this->db->select('*');
        $this->db->from('P6_2');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$pc_f_1);
        $this->db->where('P5_Ed_Nro',$nro_ed);
        $this->db->where('P6_2_1',$nro_ambiente);
        $q = $this->db->get();
        return $q;

    }


}

