<?php

class P2d5n_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P2_D_5N',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$pc_f_1){

        $this->db->select('*');
        $this->db->from('P2_D_5N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$pc_f_1);
        $q = $this->db->get();
        return $q;

    }

}

