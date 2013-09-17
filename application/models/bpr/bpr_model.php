<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpr_Model extends CI_Model {

	function get_nro_pregunta()
	{
		$sql = "SELECT count(id_cuestionario)+1 as NroRegistros FROM BPR_Cuestionario";
		$q = $this->db->query($sql);
		$row = $q->first_row();
		return $row->NroRegistros;
	}

	function insert_reg($data)
	{	
		$query="INSERT INTO BPR_Cuestionario VALUES(".$data['id_cuestionario'].",1,'".$data['cedula']."','".$data['cod_cap']."','".$data['cod_sec']."','".$data['cod_preg']."','".$data['CCDD']."','".$data['CCPP']."','".$data['CCDI']."',".$data['cargo'].",'".$data['nombre']."','".$data['dni']."','".$data['consulta']."',getdate(),0)";
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
		$sql="SELECT (rtrim(convert(char,id_cuestionario))+'.'+rtrim(convert(char,id_nro))) as id_cuestionario, desc_capitulo, desc_seccion, desc_pregunta, consulta FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY $ord $ascdesc) as row FROM v_BPR_Cuestionario_CIE $condicion1) a WHERE a.row > $inicio and a.row <= $final";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_detalle_pregunta($id_cuestionario,$id_nro)
	{
		$sql="SELECT id_cuestionario, desc_capitulo, desc_seccion, desc_pregunta, consulta FROM v_BPR_Cuestionario_CIE WHERE id_cuestionario = '$id_cuestionario' AND id_nro = '$id_nro'";
		$q=$this->db->query($sql);
		return $q;
	}

	function insert_reg_respuesta($data)
	{	
		$query="INSERT INTO BPR_Respuesta VALUES('".$data['id_cuestionario']."','".$data['id_nro']."','".$data['id_usuario']."','".$data['respuesta']."',getdate())";
		$this->db->query($query);
		$query2="UPDATE BPR_Cuestionario SET estado = 1 WHERE id_cuestionario = '".$data['id_cuestionario']."' AND id_nro = '".$data['id_nro']."'";
		$this->db->query($query2);
		return $this->db->affected_rows();
	}

	public function get_pregunta_principal()
	{
		$sql="SELECT id_cuestionario, id_nro, consulta, convert(char,fecha,103) as fecha_creacion FROM bpr_cuestionario WHERE id_nro = 1 and estado = 1 ORDER BY fecha DESC";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_ultima_respuesta($codigo)
	{ 
		$sql="SELECT TOP 1 id_cuestionario, id_nro, respuesta, convert(char,fecha,103) as fecha_respuesta FROM bpr_respuesta WHERE id_cuestionario = $codigo ORDER BY id_nro DESC";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_pregunta_historial($codigo)
	{
		$sql="SELECT id_cuestionario, id_nro, consulta, convert(char,fecha,103) as fecha_creacion FROM bpr_cuestionario WHERE id_cuestionario = $codigo ORDER BY id_nro";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_respuesta_historial($codigo,$nro)
	{ 
		$sql="SELECT id_cuestionario, id_nro, respuesta, convert(char,fecha,103) as fecha_respuesta FROM bpr_respuesta WHERE id_cuestionario = $codigo and id_nro = $nro";
		$q=$this->db->query($sql);
		return $q;
	}

	public function get_datos_pregunta($codigo)
	{ 
		$sql="SELECT cedula, cod_cap, cod_sec, cod_preg, ccdd, ccpp, ccdi, cargo FROM bpr_cuestionario WHERE id_cuestionario = $codigo";
		$q=$this->db->query($sql);
		return $q;
	}

	function insert_repregunta($data)
	{	
		$sql = "SELECT count(id_nro)+1 as NroRegistros FROM BPR_Cuestionario WHERE id_cuestionario = ".$data['id_cuestionario'];
		$q = $this->db->query($sql);
		$row = $q->first_row();

		$query="INSERT INTO BPR_Cuestionario VALUES(".$data['id_cuestionario'].",".$row->NroRegistros.",'".$data['cedula']."','".$data['cod_cap']."','".$data['cod_sec']."','".$data['cod_preg']."','".$data['CCDD']."','".$data['CCPP']."','".$data['CCDI']."',".$data['cargo'].",'".$data['nombre']."','".$data['dni']."','".$data['consulta']."',getdate(),0)";
		//echo $query;
		$this->db->query($query);
		return $this->db->affected_rows();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */