<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Export extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		//$this->load->library('PHPExcel');
	}

	public function index()
	{	
		$opcion = $this->input->post('reporte_n');
		if ($opcion >=1 && $opcion <= 99 ) {
			$filename = "pescador_";
		} else if(($opcion >=100 && $opcion <= 197 )){
			$filename = "acuicultor_";
		} else if(($opcion >=198 && $opcion <= 260 )){
			$filename = "comunidad_";
		}
		
		//header("Content-type: application/octet-stream"); 
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: attachment; filename=". $filename . $this->input->post("reporte_n").".xls;");
		header("Cache-Control: max-age=0");
		header("Pragma: no-cache");
		header("Expires: 0");
		//echo "</br></br>";<img src="http://192.168.201.217/cenpesco/img/cenpesco.jpg" style="margin-top: 6.5px;">
		echo  '<table><tr><td width="63px" rowspan="4" colspan="'. ( ($this->input->post("cantidad_var")*2) + (  ($this->input->post("nombre_var") == 'Si' || $this->input->post("nombre_var") == 'SI' ) ? 1 : 0  ) ).'">
				<img src="'. base_url('img/inei.gif') .'"  width="195" height="96" />
  			</td>';
		echo '<td width="63%" rowspan="4" colspan="2">
				<img src="'. base_url('img/cenpesco.png') .'"  width="150" height="130" />
  			</td></tr></table>';
		//echo '<img style="margin-top: 6.5px;" src=" '. base_url('img/inei.png') .'"/>';
		
		echo utf8_decode( $this->input->post("excel_div") );	
  		echo utf8_decode("<tr><td colspan='15'><h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5></td></tr>");	
	/*
		echo "<br><h3>COMENTARIOS</h3><hr>";
		echo utf8_decode( $this->input->post("textn"));
		echo '<br>';
		echo utf8_decode( $this->input->post("textn_2"));
		//echo utf8_decode( $this->input->post("metadata_div") );	

		echo '<h3>METADATOS<h3><hr>';
		echo '<table id="tab_meta" name="tab_meta" >
			<tr>
				<td width="30px"><h5>TABULADO </h5></td><td colspan="10" style="padding-left:2em">'. utf8_decode($this->input->post("txt_tabulado") ). '</td>
			</tr>
			<tr>
				<td width="30px"><h5>CONTENIDO </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_contenido") ). '</td>
			</tr>
			<tr>
				<td width="30px"><h5>CASOS </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_casos") ). '</td>
			</tr>
			<tr>
				<td width="30px"><h5>VARIABLES </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_variables") ). '</td>
			</tr>
			<tr>
				<td width="30px"><h5>ALTERNATIVAS </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_alternativas") ). '</td>
			</tr>
			<tr>
				<td width="30px"><h5>OTRO </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_otro") ). '</td>
			</tr>		
			<tr>
				<td width="30px"><h5>DATOS FALTANTES </h5></td><td colspan="10" style="padding-left:2em">' .utf8_decode( $this->input->post("txt_faltantes") ). '</td>
			</tr>
			<tr>
				<td width="30px"><h5>INSTITUCION </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_productor") ).  '</td>
			</tr>		
			<tr>
				<td width="30px"><h5>DEFINICIONES </h5></td><td colspan="10" style="padding-left:2em">' . utf8_decode($this->input->post("txt_definiciones") ). '</td>
			</tr>
		</table>';
*/
		echo '<br><hr>';
		echo utf8_decode("<tr><td colspan='15'><h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5></td></tr>");	



	}
}

?>