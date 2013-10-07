<?php

class Pcar_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('PCar',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$predio){

        $this->db->select('*');
        $this->db->from('PCar');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $q = $this->db->get();
        return $q;

    }

}

