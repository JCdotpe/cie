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
							$cant_v = ($NEP == 0) ? 4 : 5; // cantidad de variables (incluir NEP y Total)
						// PREGUNTAS MULTIPLES
							$respuesta_unica = TRUE;

			    		echo form_open("/tabulados/export");
			    			$c_title = 'PERÚ: PESCADORES POR ACTIVIDAD ECONÓMICA ADICIONAL QUE REALIZA, SEGÚN DEPARTAMENTO, 2013';

							$this->load->view('tabulados/includes/tab_logo_view.php');

							echo '<div class="row-fluid" style="overflow:auto;"><table border="1" class="table table-striped box-header" id="tabul" >';
								echo '<caption><h3>
												CUADRO N° '. sprintf("%02d",$opcion) .'
												<br><strong>
												'. $c_title  .' </strong>
								     </h3></caption>';

								echo '<thead>';
									echo '<tr>';
									echo '<th rowspan="3" style="vertical-align:middle;text-align:center">Departamento</th>';					
									echo '<th rowspan="2" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
									echo '<th colspan="'. ( ($NEP == 0) ? ($cant_v - 1)*2 : ($cant_v - 2)*2 ).'" style="text-align:center">Percepción en la variación de la cantidad de peces</th>';
									echo ($NEP>0) ? ('<th colspan="2" rowspan="2" style="vertical-align:middle;text-align:center">No especificado</th>'): '';																																														
									echo '</tr>';
									echo '<tr>';
										echo '<th colspan="2" style="text-align:center">'. ($variable_1 = 'Mantenimiento (rehabilitación menor)') .'</th>';										
										echo '<th colspan="2" style="text-align:center">'. ($variable_2 = 'Reforzamiento estructural (rehabilitación mayor)' ) .'</th>';						
										echo '<th colspan="2" style="text-align:center">'. ($variable_3 = 'Demolición' ) .'</th>';																												
									echo '</tr>';

									echo '<tr>';
										for ($i=1; $i <=$cant_v ; $i++) { 
									echo '<th style="text-align:center">Abs</th>';										
									echo '<th style="text-align:center;">%</th>';					
										}																															
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';

									$x = 1; $z = 0;  $u = 0;
									$totales = array_fill(1, $cant_v,0); 
									$array_porc=null; $index = null;$diff = 0;
									$array_porc_tot=null; $index_tot = null;$diff_tot = 0;

									foreach($tables->result() as $filas){
										echo '<tr>';
											if($respuesta_unica){// tabular al 100% en respuestas unicas
												foreach ($filas as  $key => $value) {
													if($key == 'CCDD' || $key == 'DEPARTAMENTO' || $key == 'TOTAL' ){}
													else{
														$array_porc[$key]= ( ($filas->TOTAL>0) ? round( ($value*100/ $filas->TOTAL),1)  : 0  ) ; 
													}
												}
												if ( round(array_sum($array_porc),1) > 100 ) {
													$index = array_keys($array_porc,max($array_porc));//echo  $filas->DEPARTAMENTO .   '_mayor_ '.$index[0] . '<br>';
													$diff = round( (100-array_sum($array_porc)),1);
												}else if( round(array_sum($array_porc),1) < 100){
													$diff = round( (100-array_sum($array_porc)),1);
													array_pop($array_porc);//delete NEP
													$array_porc =  array_filter($array_porc); //solo valores no ceros
													$index = (!empty($array_porc)) ? ( array_keys($array_porc,min($array_porc)) ) :  null;//echo $filas->DEPARTAMENTO . '  '. $diff .'_menor_'.  $index[0] . '<br>';
												}
											}
											foreach ($filas as  $key => $value) {
												if($key != 'CCDD'){
														if($key == 'NEP' && $NEP == 0 ){}else{echo '<td style="text-align:'. ( ($key == 'DEPARTAMENTO') ? 'left' : 'center') .'">' . ( ( $key == 'DEPARTAMENTO') ? $value : number_format( $value, 0 ,',',' ') ) . '</td>';}	
													if($key != 'DEPARTAMENTO'){ if(isset($totales[$x])){ $totales[$x]+= $value; $x++; } 
														if($key == 'NEP' && $NEP == 0 ){}else{
															echo '<td style="text-align:center;">' . number_format( ( ($key == 'TOTAL') ? ( ($filas->TOTAL==0) ? 0 : 100 )  :  $datas[$z++][$u] = ( ( ($filas->TOTAL>0) ? round( ($value*100/ $filas->TOTAL),1) : 0 ) +  ( ( $diff<>0 && $key == $index[0] ) ? $diff : 0 ) ) ),1,',',' ' ) .'</td>'; }
													};
													
												}
											} $x = 1; $z = 0; $u++;

											$array_porc=null; $index = null;$diff = 0;
											$total_dep[] = $filas->TOTAL;
										echo '</tr>';
									}	
									//TOTALES
									echo '<tr>';
									echo '<td>Total</td>';						
										if($respuesta_unica){// tabular al 100% en respuestas unicas
											for ($i = 2; $i<=$cant_v ; $i++) {
													$array_porc_tot[$i]=  round( ($totales[$i]*100/$totales[1] ),1); 
											}
											if ( round(array_sum($array_porc_tot),1) > 100 ) {
												$index_tot = array_keys($array_porc_tot,max($array_porc_tot));
												$diff_tot = round( (100-array_sum($array_porc_tot)),1);
											}else if( round(array_sum($array_porc_tot),1) < 100){
												$diff_tot = round( (100-array_sum($array_porc_tot)),1);
												array_pop($array_porc_tot);//delete NEP 
												$array_porc_tot =  array_filter($array_porc_tot);//solo valores no ceros
												$index_tot = ( array_keys($array_porc_tot,min($array_porc_tot)) );
											}
										}							

										for ($i=1; $i <= $cant_v ; $i++) { 
									echo '<td style="text-align:center">' . number_format($totales[$i],0,',',' ') . '</td>';										
									echo '<td style="text-align:center;"> '. number_format($totales_porc[$i] = (round( ( ($i==1) ? ( ($filas->TOTAL==0) ? 0 : 100 ) : $totales[$i]*100/$totales[1] ),1) + ( ($diff_tot<>0 && $i == $index_tot[0]) ? $diff_tot : 0 ) ),1,',', ' ' ).'</td>';	
										}$totales_porc[1] = $totales[1];//guardando nacional (TECHO)
									echo '</tr>';
									echo '</tr>';

								echo '</tbody>';
							echo '</table></div>';

							$series = array(
											array("name" => $variable_1 	,"data" => $datas[0]),
											array("name" => $variable_2 	,"data" => $datas[1]),
											array("name" => $variable_3 	,"data" => $datas[2]),);
							if ($NEP > 0) { array_push( $series, array("name" => 'No especificado'	,"data" => $datas[($cant_v-2)]) ); }//agrega NEP al arreglo para los graficos
							array_push($series, array("name" => 'TOTAL'	,"data" => $totales_porc));

							$data['tipo'] =  'column';// << column >> or << bar >> 
							$data['xx'] =  2030; // ancho
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

