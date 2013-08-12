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
	echo "&nbsp;<center><table border=\"1\" align=\"center\">";

	echo "
		<tr>
			<td colspan=\"3\" align=\"left\">&nbsp;$fechahora</td>
			<td colspan=\"32\" align=\"center\"><h1>PROYECTOS<h1></td>
		</tr>
		<tr>
			<td colspan=\"3\" align=\"left\"  bgcolor=\"#336666\"> <font color=\"#ffffff\"></td>
			<td colspan=\"7\" align=\"center\" bgcolor=\"#336666\"> <font color=\"#ffffff\"><h1>INFRAESTRUCTURA</h1></td>
			<td colspan=\"7\" align=\"center\" bgcolor=\"#336666\"> <font color=\"#ffffff\"><h1>CENPESCO</h1></td>
			<td colspan=\"7\" align=\"center\" bgcolor=\"#336666\"> <font color=\"#ffffff\"><h1>BOSQUE</h1></td>
			<td colspan=\"7\" align=\"center\" bgcolor=\"#336666\"> <font color=\"#ffffff\"><h1>ECE</h1></td>
			<td colspan=\"7\" align=\"center\" bgcolor=\"#336666\"> <font color=\"#ffffff\"><h1>EDNOM</h1></td>
		</tr>
		<tr>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>Nro</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>ACTIVOS</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>TOTAL</td>

			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>OFICINA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>METODOLOGIA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>SEGMENTACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>CAPACITACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>CAMPO</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>UDRA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>TOTAL</td>

			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>OFICINA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">METODOLOGIA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">SEGMENTACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">CAPACITACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>CAMPO</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">UDRA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">TOTAL</td>

			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">OFICINA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">METODOLOGIA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">SEGMENTACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">CAPACITACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>CAMPO</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">UDRA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">TOTAL</td>

			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">OFICINA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">METODOLOGIA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">SEGMENTACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">CAPACITACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>CAMPO</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">UDRA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">TOTAL</td>

			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">OFICINA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">METODOLOGIA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">SEGMENTACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">CAPACITACION</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\"><strong>CAMPO</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">UDRA</td>
			<td bgcolor=\"#336666\"> <font color=\"#ffffff\">TOTAL</td>
		</tr>";
	$i=0;
	$ingreso=0;
	$salida=0;
	$saldo=0;
	foreach ($consulta->result() as $fila )
	{
		$i++;
		echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td align=\"left\">".chao_tilde($fila->ACTIVOS)."</td>";
			echo "<td>".$fila->TOTAL_ACTIVOS."</td>";

			/* INFRAESTRUCTURA */

			echo "<td align=\"right\">".$fila->Infra_Oficina."</td>";
			echo "<td align=\"right\">".$fila->Infra_Metodologia."</td>";
			echo "<td align=\"right\">".$fila->Infra_Segmentacion."</td>";
			echo "<td align=\"right\">".$fila->Infra_Capacitacion."</td>";
			echo "<td align=\"right\">".$fila->Infra_Campo."</td>";
			echo "<td align=\"right\">".$fila->Infra_Udra."</td>";
			echo "<td align=\"right\">".$fila->Infra_TOTAL."</td>";

			/* CENPESCO */


			echo "<td align=\"right\">".$fila->CENPESCO_Oficina."</td>";
			echo "<td align=\"right\">".$fila->CENPESCO_Metodologia."</td>";
			echo "<td align=\"right\">".$fila->CENPESCO_Segmentacion."</td>";
			echo "<td align=\"right\">".$fila->CENPESCO_Capacitacion."</td>";
			echo "<td align=\"right\">".$fila->CENPESCO_Campo."</td>";
			echo "<td align=\"right\">".$fila->CENPESCO_Udra."</td>";
			echo "<td align=\"right\">".$fila->CENPESCO_TOTAL."</td>";

			/* BOSQUE */

			echo "<td align=\"right\">".$fila->BOSQUE_Oficina."</td>";
			echo "<td align=\"right\">".$fila->BOSQUE_Metodologia."</td>";
			echo "<td align=\"right\">".$fila->BOSQUE_Segmentacion."</td>";
			echo "<td align=\"right\">".$fila->BOSQUE_Capacitacion."</td>";
			echo "<td align=\"right\">".$fila->BOSQUE_Campo."</td>";
			echo "<td align=\"right\">".$fila->BOSQUE_Udra."</td>";
			echo "<td align=\"right\">".$fila->BOSQUE_TOTAL."</td>";

			/* ECE */

			echo "<td align=\"right\">".$fila->ECE_Oficina."</td>";
			echo "<td align=\"right\">".$fila->ECE_Metodologia."</td>";
			echo "<td align=\"right\">".$fila->ECE_Segmentacion."</td>";
			echo "<td align=\"right\">".$fila->ECE_Capacitacion."</td>";
			echo "<td align=\"right\">".$fila->ECE_Campo."</td>";
			echo "<td align=\"right\">".$fila->ECE_Udra."</td>";
			echo "<td align=\"right\">".$fila->ECE_TOTAL."</td>";

			/*EDNUM*/

			echo "<td align=\"right\">".$fila->EDNOM_Oficina."</td>";
			echo "<td align=\"right\">".$fila->EDNOM_Metodologia."</td>";
			echo "<td align=\"right\">".$fila->EDNOM_Segmentacion."</td>";
			echo "<td align=\"right\">".$fila->EDNOM_Capacitacion."</td>";
			echo "<td align=\"right\">".$fila->EDNOM_Campo."</td>";
			echo "<td align=\"right\">".$fila->EDNOM_Udra."</td>";
			echo "<td align=\"right\">".$fila->EDNOM_TOTAL."</td>";


		echo "</tr>";
	}
	echo "</table>";

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=reporte_saldos_udra.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>