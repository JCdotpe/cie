<?php

class Pcar_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
            //$this->db_b = $this->load->database('conexion_B', true);
    }

    public function insertBatch($data) {

        $q = $this->db_b->sql_batch('PCar',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$predio){

        $this->db_b->select('*');
        $this->db_b->from('PCar');
        $this->db_b->where('id_local',$codigo_de_local);
        $this->db_b->where('PC_F_1',$predio);
        $q = $this->db_b->get();
        return $q;

    }

}

