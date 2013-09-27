<?php
class Solicitud_presupuesto extends CI_MODEL{

 	function Get_Solicitud_Presupuesto(){
  		$this->db->select('cod,fuente_financiamiento,cargo_funcional,cargo_contratacion,dependencia,cant_pea_presupuestado,cant_pea_cpp,sueldo,estado');
    	$this->db->order_by('cod','asc');
    	$q = $this->db->get('CredPresupuestario');
		return $q;
    }
    function Get_Cant_Peacpp($cod){

    	$this->db->select_sum('cantidad','cant_pea');
    	$this->db->where('codigo_adm', $cod);
    	$this->db->where('estado', '1');
    	$query = $this->db->get('CredPresupuestario');
    	return $query;
    }

    function insert($req)
	{

		$this->db->insert('CredPresupuestario', $req );
		return $this->db->insert_id();
	}

	function update($code, $columnname, $newvalue)
	{
		if ($columnname != 'codigo_CredPresupuestario')
		{


			$newData = array(
							$columnname => $newvalue
						);
			$this->db->where('cod', $code);
			$this->db->update('CredPresupuestario', $newData);
		}
	}
	function update_oficio($code, $oficio, $date_oficio,$activado)
	{
		if ($columnname != 'codigo_CredPresupuestario')
		{


			$newData = array(
							"oficio" => $oficio,
							"date_oficio" => $date_oficio,
							"activado" => $activado
						);
			$this->db->where('codigo_CredPresupuestario', $code);
			$this->db->update('CredPresupuestario', $newData);

		}
	}
	function delete($code)
	{
			$newData = array(
							'estado' => 0
						);
			$this->db->where('codigo_CredPresupuestario', $code);
			$this->db->update('CredPresupuestario', $newData);
	}

}