<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpr_Model extends CI_Model {

	function insert_reg($data)
	{	
		$query="INSERT INTO BPR_Cuestionario VALUES('".$data['cod_cap']."','".$data['cod_sec']."','".$data['cod_preg']."','".$data['CCDD']."','".$data['CCPP']."','".$data['CCDI']."',".$data['cargo'].",'".$data['nombre']."','".$data['dni']."','".$data['consulta']."',getdate(),0)";
		$this->db->query($query);
		return $this->db->affected_rows();
	}

	public function contar_datos($condicion1)
	{
		$sql = "SELECT count(id_cuestionario) as NroRegistros FROM v_BPR_Cuestionario_CIE $condicion1";
		$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	public function mostrar_datos($ord, $ascdesc, $inicio, $final, $condicion1)
	{
		$sql="SELECT id_cuestionario, desc_capitulo, desc_seccion, desc_pregunta, consulta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_BPR_Cuestionario_CIE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_detalle_pregunta($codigo)
	{
		$sql="SELECT id_cuestionario, desc_capitulo, desc_seccion, desc_pregunta, consulta FROM v_BPR_Cuestionario_CIE WHERE id_cuestionario = '$codigo'";
		$q=$this->db->query($sql);
		return $q;
	}

	function get_nro_respuesta()
	{
		$sql = "SELECT count(id_respuesta)+1 as NroRegistros FROM BPR_Respuesta";
		$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	function insert_reg_respuesta($data)
	{	
		$query="INSERT INTO BPR_Respuesta VALUES('".$data['id_cuestionario']."','".$data['id_respuesta']."','".$data['id_usuario']."','".$data['respuesta']."',getdate())";
		$this->db->query($query);
		$query2="UPDATE BPR_Cuestionario SET estado = 1 WHERE id_cuestionario = '".$data['id_cuestionario']."'";
		$this->db->query($query2);
		return $this->db->affected_rows();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */