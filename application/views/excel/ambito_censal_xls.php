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
			<td colspan=\"9\" align=\"left\">&nbsp;$fechahora</td>
		</tr>
		<tr align=\"center\">
			<td colspan=\"9\"><h1>Listado Ambito Censal </h1></td>
		</tr>
		<tr bgcolor=\"#336666\" align=\"center\">
		  <td><font color=\"#ffffff\"><strong>Nro</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Departamento</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Provincia</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Ambito censal</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Total Formularios</strong></font></td>
		</tr>";

	$i=0;
	foreach ($consulta->result() as $fila )
	{
		$i++;
		echo "<tr align=\"center\">";
			echo "<td>".$i."</td>";
			echo "<td>".chao_tilde($fila->Departamento)."</td>";
			echo "<td>".chao_tilde($fila->Provincia)."</td>";
			echo "<td>".chao_tilde($fila->AMBITO_CENSAL)."</td>";
			echo "<td align=\"right\">".utf8_encode($fila->Total_Formularios)."</td>";
		echo "</tr>";
	}
	echo "<tr><td colspan=\"9\" align=\"left\"></td></tr>
		<tr>
			<td colspan=\"9\" align=\"left\">Fuente: Sistema CIE</td>
		</tr>";
	echo "</table>";

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=ambitocensal.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>