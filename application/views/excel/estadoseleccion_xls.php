<style type="text/css">
<!--
.xl65
{
    mso-style-parent:style0;
    mso-number-format:"\@";
}
-->
</style>
<?php
	include 'configuracion.php';
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$fechahora = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." , ".date("H:i:s") ;

	echo "<center><table border=\"1\" align=\"center\">"; 
	echo "<tr>
			<td colspan=\"20\" align=\"left\">&nbsp;$fechahora</td>
		</tr>
		<tr align=\"center\">
			<td colspan=\"20\"><h1>Formato 2 de Estado de Selecci&oacute;n - Censo de Infraestructura Educativa - CIE 2013</h1></td>
		</tr>
		<tr><td colspan=\"20\"></td></tr>
		<tr>
			<td colspan=\"20\" align=\"left\"><strong>Estado de Selecci&oacute;n : </strong> $estado_seleccion</td>
		</tr>
		<tr><td colspan=\"20\"></td></tr>
		<tr align=\"center\">
			<td></td>
			<td></td>
			<td colspan=\"8\"><strong>DATOS PERSONALES</strong></td>
			<td colspan=\"6\"><strong>LUGAR DE RESIDENCIA</strong></td>
			<td colspan=\"3\"><strong>NIVEL ACADEMICO</strong></td>
			<td align=\"center\"><strong>OPERATIVO</strong></td>
		</tr>
		<tr bgcolor=\"#336666\" align=\"center\">
		  <td><font color=\"#ffffff\"><strong>Nro</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>ODEI</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>DNI</strong></font></td> 
		  <TD><font color=\"#ffffff\"><strong>RUC</strong></font></TD> 
		  <td><font color=\"#ffffff\"><strong>APELLIDO PATERNO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>APELLIDO MATERNO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>NOMBRES</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>ESTADO CIVIL</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>SEXO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>FECHA NACIMIENTO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>DEPARTAMENTO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>PROVINCIA</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>DISTRITO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>DIRECCION</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>TELEFONO FIJO</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>NRO CELULAR</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>GRADO INSTRUCCION</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>PROFESION/CARRERA</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>UNIVERSIDAD/CENTRO DE ESTUDIOS</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>CARGO SEGUN TDR</strong></font></td>
		</tr>";

	$i=0;
	foreach ($consulta->result() as $fila )
	{
		$i++;
		echo "<tr align=\"center\">";
			echo "<td>".$i."</td>";
			echo "<td>".utf8_encode(strtoupper($fila->ODEI))."</td>";
			echo "<td class=\"xl65\">".$fila->dni."</td>";
			echo "<td class=\"xl65\">".$fila->ruc."</td>";
			echo "<td>".chao_tilde(strtoupper($fila->ap_paterno))."</td>";
			echo "<td>".chao_tilde(strtoupper($fila->ap_materno))."</td>";
			echo "<td>".chao_tilde(strtoupper($fila->nombre1))." ".chao_tilde(strtoupper($fila->nombre2))."</td>";			
			echo "<td>".strtoupper($fila->estadocivil)."</td>";
			echo "<td>".strtoupper($fila->sexo)."</td>";
			echo "<td>".$fila->fechanacimiento."</td>";
			echo "<td>".utf8_encode(strtoupper($fila->departamento_dom))."</td>";
			echo "<td>".utf8_encode(strtoupper($fila->provincia_dom))."</td>";
			echo "<td>".utf8_encode(strtoupper($fila->distrito_dom))."</td>";
			echo "<td>".chao_tilde(strtoupper($fila->direccion))."</td>";
			echo "<td class=\"xl65\">".$fila->nro_tel."</td>";
			echo "<td class=\"xl65\">".$fila->nro_cel."</td>";
			echo "<td>".utf8_encode(strtoupper($fila->grado))."</td>";
			echo "<td>".chao_tilde(strtoupper($fila->profesion))."</td>";
			echo "<td>".chao_tilde(strtoupper($fila->lugar_estudios))."</td>";
			echo "<td>".utf8_encode(strtoupper($fila->cargofuncional))."</td>";
		echo "</tr>";
	}
	echo "<tr><td colspan=\"20\"></td></tr>
		<tr>
			<td colspan=\"20\" align=\"left\">Fuente: Sistema CIE</td>
		</tr>";
	echo "</table>";

	header("Content-type: application/vnd.ms-excel"); 
	header("Content-Disposition: attachment; filename=reporte_f2_estadoseleccion.xls"); 
	header("Pragma: no-cache"); 
	header("Expires: 0");
?>