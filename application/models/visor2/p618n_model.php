<?php

class P618n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P6_1_8N',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$predio,$edififacion){

        $this->db->select('*');
        $this->db->from('P6_1_8N');
        $this->db->where('id_local', $codigo_de_local);
        $this->db->where('Nro_Pred', $predio);
        $this->db->where('Nro_Ed', $edififacion);
        $q = $this->db->get();
        return $q;
    }

}

