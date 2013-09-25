<?php

class P624n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P6_2_4N',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$predio,$edififacion,$piso){

        $this->db->select('*');
        $this->db->from('P6_2_4N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred', $predio);
        $this->db->where('P5_Ed_Nro', $edififacion);
        $this->db->where('P5_NroPiso', $piso);
        $q = $this->db->get();
        return $q;

    }

}

