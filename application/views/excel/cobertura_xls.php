<?php
	//$fechahora = date("d-m-Y H:i:s");
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$fechahora = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." , ".date("H:i:s") ;

	echo "<center><table border=\"1\" align=\"center\">"; 
	echo "<tr>
			<td colspan=\"17\" align=\"left\">&nbsp;$fechahora</td>
		</tr>
		<tr align=\"center\">
			<td colspan=\"17\"><h1>Reporte de Cobertura de Personal - Censo de Infraestructura Educativa - CIE 2013</h1></td>
		</tr>
		<tr bgcolor=\"#336666\" align=\"center\">
		  <td><font color=\"#ffffff\"><strong>Nro</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Departamento</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>Provincia</strong></font></td> 
		  <TD><font color=\"#ffffff\"><strong>ODEI</strong></font></TD> 
		  <td><font color=\"#ffffff\"><strong>Meta Insc.</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Inscritos</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>% Inscritos</strong></font></td>
		  <td><font color=\"#ffffff\"><strong>CV Calificados</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>CV Aprobados</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Meta Cap.</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Asistencia Cap.</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>% Cobertura Meta</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Capacitacion</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>% Cobertura Meta</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Meta Selec.</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>Seleccionado</strong></font></td> 
		  <td><font color=\"#ffffff\"><strong>% Cobertura</strong></font></td> 
		</tr>";

	$i=0;
	foreach ($consulta->result() as $fila )
	{
		$i++;
		if ($fila->meta_insc > 0){ $prct_inscritos = ($fila->inscritos/$fila->meta_insc)*100; }else{ $prct_inscritos = 0; }
		if ($fila->meta_capa > 0){ $prct_asis_capa = ($fila->Asistente_Capacitacion/$fila->meta_capa)*100; }else{ $prct_asis_capa = 0; }
		if ($fila->meta_capa > 0){ $prct_capa = ($fila->Aprobado_Capacitacion/$fila->meta_capa)*100; }else{ $prct_capa = 0; }
		if ($fila->meta_capa > 0){ $prct_selec = ($fila->Titular/$fila->meta_con)*100; }else{ $prct_selec = 0; }

		echo "<tr align=\"center\">";
			echo "<td>".$i."</td>";
			echo "<td>".utf8_encode($fila->departamento)."</td>";
			echo "<td>".utf8_encode($fila->provincia)."</td>";
			echo "<td>".utf8_encode($fila->odei)."</td>";
			echo "<td>".$fila->meta_insc."</td>";
			echo "<td>".$fila->inscritos."</td>";
			echo "<td>".round($prct_inscritos,1)."</td>";
			echo "<td>".$fila->CV_calificado."</td>";
			echo "<td>".$fila->CV_aprobado."</td>";
			echo "<td>".$fila->meta_capa."</td>";
			echo "<td>".$fila->Asistente_Capacitacion."</td>";
			echo "<td>".round($prct_asis_capa,1)."</td>";
			echo "<td>".$fila->Aprobado_Capacitacion."</td>";
			echo "<td>".round($prct_capa,1)."</td>";
			echo "<td>".$fila->meta_con."</td>";
			echo "<td>".$fila->Titular."</td>";
			echo "<td>".round($prct_selec,1)."</td>";
		echo "</tr>";
	}
	echo "<tr><td colspan=\"17\"></td></tr>
		<tr>
			<td colspan=\"17\" align=\"left\">Fuente: Sistema CIE</td>
		</tr>";
	echo "</table>";

	header("Content-type: application/vnd.ms-excel"); 
	header("Content-Disposition: attachment; filename=reporte_cobertura.xls"); 
	header("Pragma: no-cache"); 
	header("Expires: 0");
?>