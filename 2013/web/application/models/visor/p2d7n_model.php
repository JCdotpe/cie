<?php

class P2d7n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P2_D_7N',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$predio){

        $this->db->select('*');
        $this->db->from('P2_D_7N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$predio);
        $q = $this->db->get();
        return $q;

    }

}

