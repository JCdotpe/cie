<?php
class Seguimiento_adm_model extends CI_Model{

    function get_regs(){
    	$q = $this->db->get('seguimiento_adm');
		return $q;
    }

    function get_fields_regs(){
        $q = $this->db->list_fields('seguimiento_adm');
        return $q;
    }
    function Get_All_By_Cod($param){

    	 $this->db->select('*');
         $this->db->where('codigo_adm',$param);
         $this->db->where('estado',1);
         $q = $this->db->get('seguimiento_adm');
        return $q;
    }


    function Get_Cod_Contratacion(){

         $q=$this->db->query('select a.codigo_adm as num,a.cantidad as total_pea, sum(b.cantidad) as cant_cpp,a.nombre_cf as cargo_funcional,a.DESC_CARG as cargo_contratacion,a.observaciones as requerimiento,a.cantidad,a.tipo_requerimiento,a.nombre_act from
         					v_seguimiento_adm as a left join CredPresupuestario as b on (a.codigo_adm = b.codigo_adm and a.estado= b.estado) where a.estado=1  group by a.codigo_adm,a.cantidad,b.codigo_adm,a.nombre_cf,a.DESC_CARG,a.observaciones,a.cantidad,
							a.tipo_requerimiento,a.nombre_act');

        return $q;
    }

   /* function Get_Saldos($codigo){

    		$q=$this->db->query("select sum(cantidad) as cantidad from CredPresupuestario where codigo_adm=40 and estado=1");
        	return $q;
    }*/
     function update_all($req,$cod)
    {
        $this->db->where('codigo_adm', $cod );
        $this->db->update('seguimiento_adm', $req );
        return $this->db->insert_id();
    }

	function insert($req)
	{

		$this->db->insert('seguimiento_adm', $req );
		return $this->db->insert_id();
	}

	function update($code, $columnname, $newvalue)
	{
		if ($columnname != 'codigo_adm')
		{


			$newData = array(
							$columnname => $newvalue
						);
			$this->db->where('codigo_adm', $code);
			$this->db->update('seguimiento_adm', $newData);
		}
	}

	function delete($code)
	{
			$newData = array(
							'estado' => 0
						);
			$this->db->where('codigo_adm', $code);
			$this->db->update('seguimiento_adm', $newData);
	}




 }