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
			<td colspan=\"22\" align=\"left\">&nbsp;$fechahora</td>
		</tr>
		<tr align=\"center\">
			<td colspan=\"22\"><h1>Reporte de Rutas por Provincia Operativa - Censo de Infraestructura Educativa - CIE 2013</h1></td>
		</tr>
		<tr>
			<td colspan=\"22\"></td>
		</tr>
		<tr>
			<td align=\"center\"><strong>Sede Operativa : </strong></td>
			<td colspan=\"21\" align=\"left\">".$sede."</td>
		</tr>
		<tr>
			<td align=\"center\"><strong>Provincia Operativa : </strong></td>
			<td colspan=\"21\" align=\"left\">".$prov."</td>
		</tr>
		<tr>
			<td align=\"center\"><strong>Codigo de Ruta : </strong></td>
			<td colspan=\"21\" class=\"xl65\" align=\"left\">".$ruta."</td>
		</tr>
		<tr bgcolor=\"#336666\" align=\"center\">
		  <td><font color=\"#ffffff\"><strong>Nro</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Departamento</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Provincia</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Distrito</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Centro Poblado</strong></font></td> 

		  <TD><font color=\"#ffffff\"><strong>Codigo de Local</strong></font></TD>
		  <td><font color=\"#ffffff\"><strong>F. Inicio</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>F. Final</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Traslado</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Trabajo</strong></font></td>   
		  <td><font color=\"#ffffff\"><strong>Recuperaci&oacute;n</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Retorno Sede</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Gabinete</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Descanso</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Total Dias</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Mov. Local MA</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Gasto Op. MA</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Mov. Local AF</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Gasto Op. AF</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Pasaje</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Total AF</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Observaciones</strong></font></td> 
		</tr>";

	$t_traslado = 0;
	$t_trabajo = 0;
	$t_recupera = 0;
	$t_retorno = 0;
	$t_gabinete = 0;
	$t_descanso = 0;
	$t_dias = 0;
	$t_movlocal_ma = 0;
	$t_gatop_ma = 0;
	$t_movlocal_af = 0;
	$t_gastop_af = 0;
	$t_pasaje = 0;
	$t_af = 0;
	$i=0;

	foreach ($consulta->result() as $fila )
	{
		$i++;
		echo "<tr align=\"center\">";
			echo "<td>".$i."</td>";
			echo "<td>".utf8_encode($fila->NomDept)."</td>";
			echo "<td>".utf8_encode($fila->NomProv)."</td>";
			echo "<td>".utf8_encode($fila->NomDist)."</td>";
			echo "<td>".utf8_encode($fila->centroPoblado)."</td>";
			echo "<td class=\"xl65\">".$fila->codlocal."</td>";
			echo "<td>".$fila->fxinicio."</td>";
			echo "<td>".$fila->fxfinal."</td>";
			echo "<td>".$fila->traslado."</td>";
			echo "<td>".$fila->trabajo_supervisor."</td>";			
			echo "<td>".$fila->recuperacion."</td>";
			echo "<td>".$fila->retornosede."</td>";
			echo "<td>".$fila->gabinete."</td>";
			echo "<td>".$fila->descanso."</td>";
			echo "<td>".$fila->totaldias."</td>";
			echo "<td>".$fila->movilocal_ma."</td>";
			echo "<td>".$fila->gastooperativo_ma."</td>";
			echo "<td>".$fila->movilocal_af."</td>";
			echo "<td>".$fila->gastooperativo_af."</td>";
			echo "<td>".$fila->pasaje."</td>";
			echo "<td>".$fila->total_af."</td>";
			echo "<td>".chao_tilde($fila->observaciones)."</td>";
		echo "</tr>";

	$t_traslado += $fila->traslado;
	$t_trabajo += $fila->trabajo_supervisor;
	$t_recupera += $fila->recuperacion;
	$t_retorno += $fila->retornosede;
	$t_gabinete += $fila->gabinete;
	$t_descanso += $fila->descanso;
	$t_dias += $fila->totaldias;
	$t_movlocal_ma += $fila->movilocal_ma;
	$t_gatop_ma += $fila->gastooperativo_ma;
	$t_movlocal_af += $fila->movilocal_af;
	$t_gastop_af += $fila->gastooperativo_af;
	$t_pasaje += $fila->pasaje;
	$t_af += $fila->total_af;

	}
	echo "<tr bgcolor=\"#336666\" align=\"center\">
		  <td colspan=\"8\"><font color=\"#ffffff\"><strong>Totales</strong></font></td>		  
		  <td><font color=\"#ffffff\"><strong>".$t_traslado."</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>".$t_trabajo."</strong></font></td>   
		  <td><font color=\"#ffffff\"><strong>".$t_recupera."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_retorno."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_gabinete."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_descanso."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_dias."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_movlocal_ma."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_gatop_ma."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_movlocal_af."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_gastop_af."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_pasaje."</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>".$t_af."</strong></font></td> 
		  <td></td> 
		</tr>";
	echo "<tr><td colspan=\"22\"></td></tr>
		<tr>
			<td colspan=\"22\" align=\"left\">Fuente: Sistema CIE</td>
		</tr>";
	echo "</table>";

	header("Content-type: application/vnd.ms-excel"); 
	header("Content-Disposition: attachment; filename=reporte_rutas_por_provinciaoperativa.xls"); 
	header("Pragma: no-cache"); 
	header("Expires: 0");
?>