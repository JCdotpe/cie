<?php 

class Pescador_model extends CI_MODEL
{
	
	function consulta($nro,$dep,$prov,$dist,$ccpp)
	{
		$this->db->select('id');
		$this->db->where('id',$dep . $prov . $dist . $ccpp . $nro);
        $this->db->where('NFORM',$nro);
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);
        $this->db->where('activo',1);        
        $q = $this->db->get('pescador');
		return $q;
	}

    function insert_pesc($data){
		$this->db->insert('pescador', $data);
		return $this->db->affected_rows() > 0;
    }   

    function seccion_disponible($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP,$seccion){
		$this->db->select('s.pescador_id');
		$this->db->from('pescador p');
        $this->db->join($seccion . ' s','s.pescador_id = p.id','inner');
        $this->db->where('p.NFORM',$NFORM);
        $this->db->where('p.CCDD',$CCDD);
        $this->db->where('p.CCPP',$CCPP);
        $this->db->where('p.CCDI',$CCDI);
        $this->db->where('p.COD_CCPP',$COD_CCPP);
        $this->db->where('p.activo',1);        
        $q = $this->db->get();
		return $q->num_rows();
    }   
    
    function get_fields($table){
        $q = $this->db->list_fields($table);
        return $q;
    }   

    function insert_pesc_seccion($table,$data){
        $this->db->insert($table, $data);
        return $this->db->affected_rows() > 0;
    }   
    function insert_no_emb($data){
        $this->db->insert('pesc_seccion9', $data);
        return $this->db->affected_rows() > 0;
    } 

    function consulta_udra($dep,$prov,$dist,$ccpp)
    {
        $this->db->select('FORMULARIOS');
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);       
        $q = $this->db->get('udra_pescador');
        return $q;
    }

    function get_ccpp($dpto,$prov,$dist)
    {
        $sql = 'SELECT SUBSTRING(CCPP, 7) as CCPP, CENTRO_POBLADO FROM (marco_pesca) WHERE CCPP LIKE ? ORDER BY CENTRO_POBLADO asc';
        $q = $this->db->query($sql, array( $dpto . $prov . $dist .'%'));

      
        return $q;
    }    
}
?>