<style type="text/css">
<!--
.xl65
 {mso-style-parent:style0;
 mso-number-format:"\@";}
-->
</style>
<?php
	include 'configuracion.php';
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$fechahora = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." , ".date("H:i:s") ;

	echo "<center><table border=\"1\" align=\"center\">"; 
	echo "<tr>
			<td colspan=\"10\" align=\"left\">&nbsp;$fechahora</td>
		</tr>
		<tr align=\"center\">
			<td colspan=\"10\"><h1>Listado de Ruta - Censo de Infraestructura Educativa - CIE 2013</h1></td>
		</tr>
		<tr>
			<td colspan=\"10\"></td>
		</tr>
		<tr>
			<td align=\"center\"><strong>Sede Operativa : </strong></td>
			<td colspan=\"9\" align=\"left\">".$sede."</td>
		</tr>
		<tr>
			<td align=\"center\"><strong>Provincia Operativa : </strong></td>
			<td colspan=\"9\" align=\"left\">".$prov."</td>
		</tr>
		<tr>
			<td align=\"center\"><strong>Codigo de Ruta : </strong></td>
			<td colspan=\"9\" class=\"xl65\" align=\"left\">".$ruta."</td>
		</tr>
		<tr bgcolor=\"#336666\" align=\"center\">
		  <td><font color=\"#ffffff\"><strong>Nro</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Departamento</strong></font></td> 
		  <TD><font color=\"#ffffff\"><strong>Provincia</strong></font></TD> 
		  <td><font color=\"#ffffff\"><strong>Distrito</strong></font></td> 		  
		  <td><font color=\"#ffffff\"><strong>Centro Poblado</strong></font></td> 		  
		  <td><font color=\"#ffffff\"><strong>Codigo de Local</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Direcci&oacute;n</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Nivel Educativo</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>UGEL</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>AREA</strong></font></td>
		</tr>";

	$i=0;
	foreach ($consulta->result() as $fila )
	{
		$i++;
		echo "<tr align=\"center\">";
			echo "<td>".$i."</td>";
			echo "<td>".chao_tilde($fila->NomDept)."</td>";
			echo "<td>".chao_tilde($fila->NomProv)."</td>";
			echo "<td>".chao_tilde($fila->NomDist)."</td>";
			echo "<td>".chao_tilde($fila->centroPoblado)."</td>";
			echo "<td class=\"xl65\">".$fila->codlocal."</td>";
			echo "<td>".chao_tilde($fila->direccion)."</td>";
			echo "<td>".chao_tilde($fila->Nivel_Educativo)."</td>";
			echo "<td>".chao_tilde($fila->ugel)."</td>";
			echo "<td>".chao_tilde($fila->area)."</td>";
		echo "</tr>";
	}
	echo "<tr><td colspan=\"10\"></td></tr>
		<tr>
			<td colspan=\"10\" align=\"left\">Fuente: Sistema CIE</td>
		</tr>";
	echo "</table>";

	header("Content-type: application/vnd.ms-excel"); 
	header("Content-Disposition: attachment; filename=Listado_Rutas.xls"); 
	header("Pragma: no-cache"); 
	header("Expires: 0");
?>