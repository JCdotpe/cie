<?php

class P6N_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P6_N',$data);
        return ($q);

    }

    public function getData($codigo_de_local){

        $this->db->select('*');
        $this->db->from('P6_N');
        $this->db->where('id_local',$codigo_de_local);
        $q = $this->db->get();
        return $q;

    }
   function getDataNroEdif($codigo_de_local,$pc_f_1,$nro_ed){
        $this->db->select('*');
        $this->db->from('P6_N');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('PC_F_1',$pc_f_1);
        $this->db->where('NRO_ED',$nro_ed);
        $q = $this->db->get();
        return $q;

   }

}

