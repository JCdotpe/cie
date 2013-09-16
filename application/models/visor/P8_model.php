<?php

class P8_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    public function insertBatch($data) {

        $q = $this->db->sql_batch('P8',$data);
        return ($q);

    }

    public function getData($codigo_de_local,$pc_f_1){

        $this->db->select('*');
        $this->db->from('P8');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$pc_f_1);
        $this->db->order_by('P8_2_Tipo','desc');
        $this->db->order_by('P8_2_Nro','asc');
        $q = $this->db->get();
        return $q;
    }

    public function getDataTipoEdif($codigo_de_local,$pc_f_1,$tipo,$numero){

        $this->db->select('*');
        $this->db->from('P8');
        $this->db->where('id_local',$codigo_de_local);
        $this->db->where('Nro_Pred',$pc_f_1);
        $this->db->where('P8_2_Tipo',$tipo);
        $this->db->where('P8_2_Nro',$numero);
        $q = $this->db->get();
        return $q;
    }

}

