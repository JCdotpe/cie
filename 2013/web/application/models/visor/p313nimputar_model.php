<?php

class P313nimputar_model extends CI_MODEL{

    public function __construct() {
            parent::__construct();
            $this->load->database();
    }

    function update($local,$predio,$req)
    {
        $this->db->where('id_local', $local );
        $this->db->where('Nro_Pred', $predio );
        $this->db->update('P3_1_3N_Imputar', $req );
        return $this->db->insert_id();
    }

}
