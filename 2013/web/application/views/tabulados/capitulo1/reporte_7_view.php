<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">

<?php $this->load->view('tabulados/includes/sidebar_view'); ?> <!-- SIDE BAR -->
<div class="row-fluid">


 	<div class="span12" id="ap-content">

		<?php $this->load->view('tabulados/includes/tabs_view.php');?> <!--include tabs y logos	-->
		
		<div class="tab-content" style="clear:both">
		  	<div class="tab-pane active" id="tabulado">
				<!-- INICIO TABULADO -->
			    	<?php
		    			//EVALUAR NEP					
							$NEP = 0;
							foreach ($tables->result() as $value) {
										$NEP += $value->NEP;
								}
							//***************************************************************************************************************************
							$cant_v = ($NEP == 0) ? 15 : 16; // cantidad de variables (incluir NEP y Total)
								// PREGUNTAS MULTIPLES
							$respuesta_unica = FALSE;
							//***************************************************************************************************************************

			    		echo form_open("/tabulados/export");
			    			//$c_title = 'PERÚ: PESCADORES POR ACTIVIDAD ECONÓMICA ADICIONAL QUE REALIZA, SEGÚN DEPARTAMENTO, 2013';

							$this->load->view('tabulados/includes/tab_logo_view.php');

							echo '<div class="row-fluid" style="overflow:auto;"><table border="1" class="table table-striped box-header" id="tabul" >';
								echo '<caption><h3>
												CUADRO N° '. sprintf("%02d",$opcion) .'
												<br><strong>
												'. utf8_encode($c_title)  .' </strong>
								     </h3></caption>';

								echo '<thead>';
									echo '<tr>';
									echo '<th rowspan="3" style="vertical-align:middle;text-align:center">Departamento</th>';					
									echo '<th rowspan="3" style="vertical-align:middle;text-align:center">Área</th>';					
									echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
									echo '<th colspan="'. ( ($NEP == 0) ? ($cant_v - 1)*2 : ($cant_v - 2)*2 ).'" style="text-align:center">EDIFICACIONES EVALUADAS PARA SU DEMOLICIÓN SEGÚN NIVEL O MODALIDAD, POR DEPARTAMENTO Y ÁREA</th>';
									echo ($NEP>0) ? ('<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">No especificado</th>'): '';																																														
									echo '</tr>';
									echo '<tr>'; //***************************************************************************************************************************
										echo '<th colspan="2" style="text-align:center">'. ($variable_1 = 'Inicial cuna') .'</th>';										
										echo '<th colspan="2" style="text-align:center">'. ($variable_2 = 'Inicial jardin' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_3 = 'inicial cuna jardin' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_4 = 'Primaria' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_5 = 'Secundaria' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_6 = 'Educación Básica Alternativa(EBA)' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_7 = 'Educación Básica Especial(EBE)' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_8 = 'Educación Superior de Formación(ESFA)' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_9 = 'Educación Superior Tecnológico' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_10 = 'Instituto Superior Pedagógico (ISP)' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_11 = 'Centro de Educación Técnico Productivo (CETPRO)' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_12 = 'Programa No Escolarizado de Educación Inicial (PRONOEI)' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_13 = 'Sala de Educación Temprana' ) .'</th>';																												
										echo '<th colspan="2" style="text-align:center">'. ($variable_14 = 'Ludoteca' ) .'</th>';																												
									echo '</tr>';//***************************************************************************************************************************

									echo '<tr>';
										for ($i=1; $i <=$cant_v ; $i++) { 
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';					
										}																															
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';

									$x = 1; $z = 0;  $u = 0; $c = 0; $f = 1; $c_fila = 0;
									//$totales = array_fill(1, $cant_v,0); 
									$totales = array(
										'Total' => array_fill(1, $cant_v,0),
										'Urbano' => array_fill(1, $cant_v,0),
										'Rural' => array_fill(1, $cant_v,0) );
									$array_porc=null; $index = null;$diff = 0;
									$array_porc_tot=null; $index_tot = null;$diff_tot = 0;
									$array_porc_dep = null;$index_porc_dep = null; $diff_tot_dep = 0;

									foreach($tables->result()  as $ki =>$filas){

										echo '<tr>';
											if($respuesta_unica){// tabular al 100% en respuestas unicas
												foreach ($filas as  $key => $value) {
													if($key == 'CCDD' || $key == 'DEPARTAMENTO' || $key == 'TOTAL' || $key == 'AREA' ){}
													else{
														$array_porc[$key]= ( ($filas->TOTAL>0) ? round( ($value*100/ $filas->TOTAL),1)  : 0  ) ; 
													}
												}
												if ( round(array_sum($array_porc),1) > 100 ) {
													$index = array_keys($array_porc,max($array_porc));//echo  $filas->DEPARTAMENTO .   '_mayor_ '.$index[0] . '<br>';
													$diff = round( (100-array_sum($array_porc)),1);
												}else if( round(array_sum($array_porc),1) < 100){
													$diff = round( (100-array_sum($array_porc)),1);
													if ($NEP>0){array_pop($array_porc);}//delete NEP
													$array_porc =  array_filter($array_porc); //solo valores no ceros
													$index = (!empty($array_porc)) ? ( array_keys($array_porc,min($array_porc)) ) :  null;//echo $filas->DEPARTAMENTO . '  '. $diff .'_menor_'.  $index[0] . '<br>';
												}
											}
											foreach ($filas as  $key => $value) {// absolutos filas ($f)desde 1, cols ($c) desde 0
												if($key != 'CCDD'){
													if($key == 'NEP' && $NEP == 0 ){}else{echo '<td '.( ($key == 'DEPARTAMENTO' )?'class="td_remove"':'').' style="text-align:'. ( ($key == 'DEPARTAMENTO' || $key == 'AREA') ? 'left' : 'center') .'">' . ( ( $key == 'DEPARTAMENTO' || $key == 'AREA') ? $value :  number_format( $absolutos[$c++][$f] = $value, 0 ,',',' ') ) . '</td>';}	
													if($key != 'DEPARTAMENTO' && $key != 'AREA'){
														//TOTALES,URBANO, RURAL,  NO LIMA METRO NI LIMA PROV
														if( $filas->CCDD != 'LM' && $filas->CCDD != 'LP' ){ $totales['Total'][$x]+= $value; if($filas->AREA == 'Urbano'){$totales['Urbano'][$x]+= $value;}else if($filas->AREA == 'Rural'){$totales['Rural'][$x]+= $value;}$x++; } 
														if($key == 'NEP' && $NEP == 0 ){}else{
															echo '<td style="text-align:center;">' . number_format( ( ($key == 'TOTAL') ? ( ($filas->TOTAL==0) ? 0 : 100 )  :  $datas[$z++][$u] = ( ( ($filas->TOTAL>0) ? round( ($value*100/ $filas->TOTAL),1) : 0 ) +  ( ( $diff<>0 && $key == $index[0] ) ? $diff : 0 ) ) ),1,',',' ' ) .'</td>'; }													
													};
												}
											}
										echo '</tr>';
											$array_porc=null; $index = null;$diff = 0; // reiniciando valores
											$array_porc_dep = null; $index_porc_dep = null; $diff_tot_dep = 0; // reiniciando valores
											$total_dep[] = $filas->TOTAL; // guarda Total absoluto departamental

											if ($filas->AREA == 'Rural') {
												$acum_total_dep = $absolutos[0][$ki] + $absolutos[0][$ki + 1] ;
												if($respuesta_unica){// tabular al 100% en respuestas unicas
													for ($vb=1; $vb < $cant_v ; $vb++) { //desde 1
														$acum = $absolutos[$vb][$ki] + $absolutos[$vb][$ki + 1] ; $porcen = round( ( ($acum_total_dep >0) ? $acum*100/$acum_total_dep : 0),1) ; 
														$array_porc_dep[$vb] =  ($acum_total_dep >0) ?  round(($acum*100/$acum_total_dep),1) : 0 ;
													}
													if(round(array_sum($array_porc_dep),1)>100){
														$index_porc_dep =  array_keys($array_porc_dep,max($array_porc_dep));
														$diff_tot_dep = round((100-array_sum($array_porc_dep)),1);
													}else if(round(array_sum($array_porc_dep),1)<100){
														$diff_tot_dep = round((100-array_sum($array_porc_dep)),1);
														if ($NEP>0){array_pop($array_porc_dep);}; // delete el NEP, para sea el caso no aumentar al NEP
														$array_porc_dep = array_filter($array_porc_dep); // solo valores no ceros, para sea el caso no aumentar a los ceros
														$index_porc_dep = (!empty($array_porc_dep)) ? array_keys($array_porc_dep,min($array_porc_dep))  : null;
													}
												}

										echo '<tr '. (($filas->CCDD == "LM")? 'class="td_lima"' : '').'><td class="to_rowspan">'.$filas->DEPARTAMENTO.'</td><td>Total</td>';
												for ($h=0; $h < $cant_v ; $h++) { 
													$acum = $absolutos[$h][$ki] + $absolutos[$h][$ki + 1] ; 
													$porcen = round( ( ($acum_total_dep >0) ? $acum*100/$acum_total_dep + ( ( $diff_tot_dep<>0 && $h == $index_porc_dep[0] ) ? $diff_tot_dep : 0 ) : 0),1) ;
													echo '<td style="text-align:center;">'. number_format($acum,0,',',' ') .'</td><td style="text-align:center;">'.number_format((($h == 0) ? ( ($acum>0)? 100 : 0) :  $porcen ),1,',',' ').'</td>';
														if( $h > 0  && $filas->CCDD != 'LM' && $filas->CCDD != 'LP' ){ // no guardar en datas_tot los valores de LIMA METRO y LIMA PROV
															$datas_tot[$h-1][$c_fila] =  $porcen ;
														}
												}
										echo '</tr>'; $c_fila++;
											}
											$x = 1; $z = 0; $u++; $f++ ; $c = 0; 

									}	
									//TOTALES
									foreach ($totales as $idx => $celda){
										echo '<tr>';
											echo '<td class="'.( ($idx == 'Total' )?'to_rowspan"':'td_remove"').'>NACIONAL</td>';						
											echo '<td>'.$idx.'</td>';

										if($respuesta_unica){// tabular al 100% en respuestas unicas
											for ($i = 2; $i<=$cant_v ; $i++) {
												$array_porc_tot[$i]=  round( ($totales[$idx][$i]*100/$totales[$idx][1] ),1); 
											}
											if ( round(array_sum($array_porc_tot),1) > 100 ) {
												$index_tot = array_keys($array_porc_tot,max($array_porc_tot));
												$diff_tot = round( (100-array_sum($array_porc_tot)),1);
											}else if( round(array_sum($array_porc_tot),1) < 100){
												$diff_tot = round( (100-array_sum($array_porc_tot)),1);
												if ($NEP>0){array_pop($array_porc_tot);}//delete NEP 
												$array_porc_tot =  array_filter($array_porc_tot);//solo valores no ceros
												$index_tot = ( array_keys($array_porc_tot,min($array_porc_tot)) );
											}
										}
											for ($i=1; $i <= $cant_v ; $i++) { 
											echo '<td style="text-align:center">' . number_format($totales[$idx][$i],0,',',' ') . '</td>';		
												if($idx == 'Total'){ // solo guardar los totales % del nacional								
											echo '<td style="text-align:center;"> '. number_format($totales_porc[$i] = (round( ( ($i==1) ? ( ($filas->TOTAL==0) ? 0 : 100 ) : $totales[$idx][$i]*100/$totales[$idx][1] ),1) + ( ($diff_tot<>0 && $i == $index_tot[0]) ? $diff_tot : 0 ) ),1,',', ' ' ).'</td>';	
												}else{
											echo '<td style="text-align:center;"> '. number_format( (round( ( ($i==1) ? ( ($filas->TOTAL==0) ? 0 : 100 ) : $totales[$idx][$i]*100/$totales[$idx][1] ),1) + ( ($diff_tot<>0 && $i == $index_tot[0]) ? $diff_tot : 0 ) ),1,',', ' ' ).'</td>';	
												}
											}$totales_porc[1] = $totales['Total'][1];//guardando total nacional absoluto (TECHO)
										echo '</tr>';

										$array_porc_tot=null; $index_tot = null;$diff_tot = 0;// reiniciando valores
									}			
								echo '</tbody>';
							echo '</table></div>';

							// $series = array(
							// 				array("name" => $variable_1 	,"data" => $datas[0]),
							// 				array("name" => $variable_2 	,"data" => $datas[1]),
							// 				array("name" => $variable_3 	,"data" => $datas[2]),);
							// if ($NEP > 0) { array_push( $series, array("name" => 'No especificado'	,"data" => $datas[($cant_v-2)]) ); }//agrega NEP al arreglo para los graficos
							// array_push($series, array("name" => 'TOTAL'	,"data" => $totales_porc));var_dump($datas_tot[0]);
							//***************************************************************************************************************************
							$series = array(
											array("name" => $variable_1 	,"data" => $datas_tot[0]),
											array("name" => $variable_2 	,"data" => $datas_tot[1]),
											array("name" => $variable_3 	,"data" => $datas_tot[2]),
											array("name" => $variable_4 	,"data" => $datas_tot[3]),
											array("name" => $variable_5 	,"data" => $datas_tot[4]),
											array("name" => $variable_6 	,"data" => $datas_tot[5]),
											array("name" => $variable_7 	,"data" => $datas_tot[6]),
											array("name" => $variable_8 	,"data" => $datas_tot[7]),
											array("name" => $variable_9		,"data" => $datas_tot[8]),
											array("name" => $variable_10	,"data" => $datas_tot[9]),
											array("name" => $variable_11 	,"data" => $datas_tot[10]),
											array("name" => $variable_12 	,"data" => $datas_tot[11]),
											array("name" => $variable_13 	,"data" => $datas_tot[12]),
											array("name" => $variable_14 	,"data" => $datas_tot[13]),
											);
							//***************************************************************************************************************************
							if ($NEP > 0) { array_push( $series, array("name" => 'No especificado'	,"data" => $datas_tot[($cant_v-2)]) ); }//agrega NEP al arreglo para los graficos
							array_push($series, array("name" => 'TOTAL'	,"data" => $totales_porc));


							$data['tipo'] =  'column';// << column >> or << bar >> 
							$data['xx'] =  2000; // ancho
							$data['yy'] =  840; // altura
							$data['series'] =  $series;
							$data['c_title'] = $c_title;
							$this->load->view('tabulados/includes/text_view.php'); 

							$this->load->view('tabulados/includes/metadata_view.php', $data); 

						echo form_close(); 
					?>		  		
		  		<!-- FIN TABULADO -->
		  	</div>
		  
			<div class="tab-pane" id="grafico">
				  	<!-- INICIO GRAFICO -->
							<?php 
								$this->load->view('tabulados/includes/grafico_view.php', $data); 
							?>
							<h5>Fuente: Instituto Nacional de Estadística e Informática - Censo Nacional de Infraestructura Educativa 2013.</h5>
				  	<!-- FIN GRAFICO -->
			</div>

			<div class="tab-pane" id="mapa">
				  	<!-- INICIO MAPA -->
				  			<?php  
				  				$this->load->view('tabulados/includes/mapa_view.php', $data); 
				  			?>
				  	<!-- FIN MAPA -->
			</div>

		</div>

	</div>
</div>

 <?php //$this->load->view('convocatoria/includes/footer_view.php'); ?>

