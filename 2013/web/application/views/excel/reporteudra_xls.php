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
	echo "<tr>
			<td colspan=\"10\" align=\"left\">&nbsp;$fechahora</td>
		</tr>
		<tr>
			<td colspan=\"10\" align=\"center\"><h1>Resumen</h1></td>
		</tr>
		<tr bgcolor=\"#336666\">
			<td><font color=\"#ffffff\"><strong>Proyecto</strong></font></td>
		    <td><font color=\"#ffffff\"><strong>Entrada</strong></font></td>
		    <td><font color=\"#ffffff\"><strong>Salida</strong></font></td>
		    <td><font color=\"#ffffff\"><strong>Saldo</strong></font></td>
		</tr>";
		$entrada_resu=0;
		$salida_resu=0;
		$saldo_resu=0;
		$saldo_actual=0;
		foreach ($resumen->result() as $fila) {
			# code...
			$entrada_resu = $fila->Entrada;
			$salida_resu = $fila->Salida;
			$saldo_resu= $fila->Saldo;
			$saldo_actual+=$saldo_resu;
			echo "<tr>";
			echo "<td>".utf8_encode($fila->Proyecto)."</td>";
			echo "<td>". $entrada_resu ."</td>";
			echo "<td>".$salida_resu."</td>";
			echo "<td>".$saldo_resu."</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<table>";
		echo "<tr bgcolor=\"#336666\">
				<td><font color=\"#ffffff\"><strong>Saldo actual</strong></font></td>
			  </tr>";
		echo "<td>".$saldo_actual."</td>";
		echo "</tr>";
		echo "</table>";

	echo "&nbsp;<center><table border=\"1\" align=\"center\">";
	echo "
		<tr>
			<td colspan=\"10\" align=\"center\"><h1>Reporte de Udra</h1></td>
		</tr>
		<tr bgcolor=\"#336666\">
			<td><font color=\"#ffffff\"><strong>Nro</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Fecha</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Activo</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Movimiento</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Naturaleza</strong></font></td>
		  <TD><font color=\"#ffffff\"><strong>Destino</strong></font></TD>
		  <td><font color=\"#ffffff\"><strong>Proyecto</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Ingreso</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Salida</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Glosa</strong></font></td>
		</tr>";

	$i=0;
	$tipo_mov="";
	$codigo_naturaleza="";
	$codigo_destino="";
	$estado="";
	$ingreso=0;
	$salida=0;

	foreach ($consulta->result() as $fila )
	{
		$i++;
		$ingreso=0;
		$salida=0;
			switch ($fila->tipo_mov) {
				case 1:
					# code...
					$tipo_mov="Ingreso";
					$ingreso=$fila->cantidad;
					break;

				case 2:
					# code...
					$tipo_mov="Salida";
					$salida=$fila->cantidad;
					break;
			}
			switch ($fila->codigo_Naturaleza) {
				case 1:
					# code...
					$codigo_naturaleza="Adquisición";
					break;

				case 2:
					# code...
				$codigo_naturaleza="Prestamo";
					break;
				case 3 :
					# code...
				$codigo_naturaleza="Traslado";
					break;
			}

			switch ($fila->codigo_destino) {
				case 1:
					# code...
					$codigo_destino="Campo";
					break;

				case 2:
					# code...
				$codigo_destino="Capacitación";
					break;
				case 3 :
					# code...
				$codigo_destino="Oficina";
					break;
				case 4:
						# code...
				$codigo_destino="Publicidad";
						break;
				case 5:
					# code...
					$codigo_destino="Digitación";
					break;
				case 6:
					# code...
					$codigo_destino="Udra";
					break;
			}
			$tipo_documento="";
			switch ($fila->tipo_documento) {
				case 1:
					# code...
					$tipo_documento="Factura";
					break;

				case 2:
					# code...
				$tipo_documento="Cargo";
					break;
				case 3 :
					# code...
				$tipo_documento="Guia de remisión";
					break;
				case 4:
						# code...
				$tipo_documento="Orden de salida";
						break;
			}
			switch ($fila->estado) {

				case 1:
					# code...
					$estado="Nuevo";
					break;

				case 2:
					# code...
					$estado="Usado";
					break;

				case 3:
					# code...
					$estado="Dañado";
					break;
			}
		echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".utf8_encode($fila->fecha_registro)."</td>";
			echo "<td>".chao_tilde($fila->nombre_act)."</td>";
			echo "<td>".utf8_encode($tipo_mov)."</td>";
			echo "<td>".chao_tilde($codigo_naturaleza)."</td>";
			echo "<td class=\"xl65\">".chao_tilde($codigo_destino)."</td>";
			echo "<td class=\"xl65\">".chao_tilde($fila->NombreProyecto)."</td>";
			echo "<td>".$ingreso."</td>";
			echo "<td>".$salida."</td>";
			echo "<td>".chao_tilde($fila->glosa)."</td>";
		echo "</tr>";
	}
	echo "</table>";

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=reporte_udra.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>