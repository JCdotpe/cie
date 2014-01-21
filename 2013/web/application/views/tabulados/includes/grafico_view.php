<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts-more.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/modules/exporting.js'); ?>"></script>

<!-- <div class="row-fluid"  style="width:100%; height: 100%; margin: 0 auto !important; position:relative;"> -->

<div class="row-fluid" style="height:60px;">
	<div class="span2"><!-- <input id="R1" type="range" min="0" max="90" value="30" /> -->
		<div class="styled-select" style="height:40px;border-radius: 6px;"> <select id="cbo_nac_dep" style="font-size: 20px !important;"><option value="0">NACIONAL</option><option value="1">DEPARTAMENTAL</option> </select> </div>
	</div>
	<div class="span7" style="margin:0px;">
		<div class="span3" style="margin:0px;">
			<div id ="div-graph" class="btn-group">
			    <button class="btn  btn-warning">Variables del tabulado</button>
			    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span></button>
			    <ul id="combo-graf" class=" dropdown-menu">
	  					<?php $v=0;
	  						foreach ($series as  $y) {
	  							foreach ($y as $i => $k) {
	  								echo ( ($i == 'name' &&  $k != 'No especificado' && $k != 'TOTAL' ) ? '<li value='.$v.'><a >'. $k.'</a></li>' :'' );
	  							}
	  							$v++;
	  						}
	  				 	?>
			    </ul>
			</div>
			<input type="hidden" id="hd_variable" name="hd_variable" value="0" >
		</div>
		<div class="span3 " id="div-cbo-graph"  style="margin:0px;">
			<div class="styled-select">
			   <select id="cbo_type_graph">
			      <option value="0">Gráfico de barras</option>
			      <option value="1">Gráfico de líneas</option>
			      <option value="2">Gráfico de líneas curveadas</option>
			      <option value="3">Gráfico de áreas</option>
			      <option value="4">Gráfico de áreas curveadas</option>
			      <option value="5">Gráfico Scatter</option>
			      <!-- <option value="6">Gráfico de barras</option> -->
			   </select>
			</div>
		</div>	
		<div class="span3 " id="div-cbo-graph_nac"  style="margin:0px;">
			<div class="styled-select">
			   <select id="cbo_type_graph_nac">
			      <option value="0">Gráfico de barras</option>
			      <option value="1">Gráfico de paste</option>
			      <!-- <option value="6">Gráfico de barras</option> -->
			   </select>
			</div>
		</div>		
		<div class="span6" style="margin:0px;">	<button class="button-styles-graficos" id="data-labels">Mostrar etiquetas</button>
												<!---<button class="button-styles-graficos" id="data-puntos">Mostrar Puntos de quiebre</button>-->
												<button class="button-styles-graficos" id="btn_plot-line">Mostrar nacional</button>
												<button class="button-styles-graficos" id="data-max-value">+</button>
												<button class="button-styles-graficos" id="data-min-value">-</button></div>
	</div>
	<div class="span3">
		<div class="span3" style="margin:0px;">	<button class="button-styles-graficos" id="btn_data-color">Color</button></div>
		<div class="span7" style="margin:0px 0px 0px 20px;">	
			<button class="button-styles-graficos" id="btn_data-print">Imprimir</button><button class="button-styles-graficos" id="data-download">Descargar</button>
		</div>	
	</div>
</div>
<div  class="row-fluid" style="overflow:auto;" id="chart_parent">

    	<div class="chart-inner" id="chart_div" style=" height: 800px; margin: 0 auto;"></div>
    	<div class="chart-inner" id="chart_div_nac" style="width:1200px;margin-left:260px;"></div>

</div>

<script  type="text/javascript">


	// variables declarados para MAPA y GRAFICOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

		var cant_variables 	= <?php echo count($series);?>;
		var num_tabulado = <?php echo $opcion;?>;
		var name_dep = ['Amazonas','Ancash','Apurímac','Arequipa','Ayacucho','Cajamarca','Callao','Cusco','Huancavelica','Huánuco','Ica','Junín','La Libertad','Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martín','Tacna','Tumbes', 'Ucayali'];
		var name_dep_sorter = new Array();
		var num_color = 1; // num de colores
		var enableDataLabels = true; // labels	

		var valor_nac 		= []; // arreglo de valores nacionales
		var valor_nac_sorter 		= []; // arreglo de valores nacionales
		var valor_nac_abs 	= new Array(); // arreglo de valores nacionales
		var data_pie_valor_nac = new Array();
		var valor_nac_abs_sorter 	= new Array(); // arreglo de valores nacionales
		var valor_dep  = new Array();			
		var valor_dep_sorter  = new Array();			
		var valor_dep_abs 	= new Array(); // arreglo de valores departamentales absolutos	
		var valor_dep_abs_sorter 	= new Array(); // arreglo de valores departamentales absolutos	
		var name_mapa = new Array();			
		var name_var = new Array();			
		var name_var_sorter = new Array();		// la variales ordenadas, para nacional.	
		var current_var = 0; // variable actual usada
		var nacional = true;
		var plotline = true;
		var total_nacional = 0;
		var size_nacional = [1200,0];
	// variables declarados para MAPA y GRAFICOS <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	$(function(){

	        var chart;
	        var chart_nac;
			
			<?php 

				//GUARDANDO LOS NOMBRES VARIABLES DEPARTAMENTALES --------------------------------------------------
				$v=0;
				if (isset($nombres_mapa)) {// titulos de los nombres de mapas, en la base de datos
					foreach ($nombres_mapa->result() as $key => $value) {
						echo 'name_mapa['.$key.'] = "'. utf8_encode($value->nombre) . '";';
					}
				}
				foreach ($series as  $y) {// nombres del array PHP
					foreach ($y as $i => $f) {
						echo ( ($i == 'name' && $f != 'TOTAL') ? 'name_var['.$v.'] = "'. $f . '";' :'' );
					}
					$v++;
				}						
				
				// GUARDANDO LOS VALORES NACIONALES Y NOMBRES VARIABLES,  EN SORTER
				$cant_variables = count($series);
				arsort($series[$cant_variables-1]['data']); // ordena desc
				$cc = 0; $td_2 = 5;
				foreach ($series[$cant_variables-1]['data'] as $key => $value) {//array totalles_porc, (totales % nacional)

					if ($key == 1){//1 es el valor nacionaL (TECHO)
						echo 'total_nacional = '. $value . ';';
					}else{
						echo 'valor_nac_abs_sorter['.$cc.']  =  ($("#tabul tbody tr:first-child td:nth-child('.(5+($key-2)*2).')").html()).replace(" ","");';
						echo 'valor_nac_sorter['. $cc .'] = '. $value . ';';
						echo 'name_var_sorter['. $cc .'] = name_var['. ($key-2) . '];';
						echo 'data_pie_valor_nac['.$cc.'] = [name_var_sorter['. $cc .'],valor_nac_sorter['. $cc .']];';$cc++;
					}
				}
				array_pop($series);// QUITANDO LOS TOTALES

				// GUARDANDO ABSOLUTO Y PORCENTUAL NACIONALES  ----------------------------------------------------

				$a = 1; 
				$p = 4;
				for ($i=0; $i < count($series); $i++) {
					$a = 1 + $a; 
					$p+=2;
					echo 'valor_nac_abs['.$i.']  =  ($("#tabul tbody tr:first-child td:nth-child('.$a.')").html()).replace(" ","");';
					echo 'valor_nac['.$i.']  = parseFloat((($("#tabul tbody tr:first-child td:nth-child('.$p.')").html()).replace(",",".") ).replace(" ",""));';
					$a++;
				}

				// GUARDANDO ABSOLUTO DE LOS DEPARTAMENTALES -----------------------------------------------------
		 		$td = 5; // totales especiales solo TAB N°1
				for ($k = 0; $k < count($series); $k++) {
					echo 'var hpd_1 = new Array();';
					$tr = 7;
					for ($i = 0; $i < 25; $i++) {
						if($i==0){echo 'hpd_1['.$i.'] = ($("#tabul tbody tr:nth-child(4) td:nth-child('.$td.')").html());';}
						else{echo 'hpd_1['.$i.'] = ($("#tabul tbody tr:nth-child('.($tr).') td:nth-child('.$td.')").html());'; $tr+=3;}
					};	
					echo 'valor_dep_abs['.$k.'] = hpd_1;';
					$td+=2;
					//if($opcion >1){ $d = 3; }// reiniciando, totales especiales solo TAB N°1
					//else{ $d = 1; ;}
				};		

				// ORDENANDO ..> GUARDANDO PORCENTUAL Y ABSOLUTO DE LOS DEPARTAMENTALES (EN SORTER) -----------------------------------------------------
				$kk = 0; 
				foreach ($series  as $index => $filas){
					echo 'valor_dep['.$index.'] =  new Array();';//alert(valor_dep['.$index.']['.$key.']);
					echo 'valor_dep['.$index.'] = ' . json_encode(array_values($series[$index]['data'])) . ';'; 

					arsort($series[$index]['data']);
					echo 'valor_dep_sorter['.$index.'] =  new Array();';//alert(valor_dep['.$index.']['.$key.']);
					echo 'valor_dep_sorter['.$index.'] = ' . json_encode(array_values($series[$index]['data'])) . ';';	

					echo 'name_dep_sorter['.$index.'] =  new Array();';
					echo 'valor_dep_abs_sorter['.$index.'] =  new Array();';
					foreach ($series[$index]['data'] as $key => $value) {//alert(name_dep_sorter['.$index.']['.$kk.']);//alert(valor_dep_abs_sorter['.$index.']['.$kk.']);
						echo 'name_dep_sorter['.$index.']['.$kk.'] = name_dep['.$key.'];';
						echo 'valor_dep_abs_sorter['.$index.']['.$kk.'] = valor_dep_abs['.$index.']['.$key.'];';$kk++;
					}$kk = 0;
				}
				
			?>
				//
			var valor_max_tab 	= 0; // max value del tab
			for (var k =  0; k < valor_dep.length; k++) { // VALOR_DEP arreglo creado en mapa_view.php, contiene arreglos del php
			    for (var i = 0; i < 24; i++) {
			    	if (valor_dep[k][i] > valor_max_tab) {
			    		valor_max_tab = valor_dep[k][i];
			    	} 
			    };	
			};	
			//console.log(data_pie_valor_nac);
			//$(document).ready(function() {
			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************		
			//START chart
	            chart = new Highcharts.Chart({

		                chart: {
		                    renderTo: 'chart_div',
		                    type: '<?php echo $tipo; ?>',
		                    plotBorderWidth: 0,
		                    marginRight: <?php echo (string) ($tipo == 'bar') ? 210 : 10 ; ?>,
		                    marginBottom:  170,
		                    marginTop:160,
		                    paddingTop:20,

		                },
		                title: {
		                    text: 'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + '', 
		                    style: {
								//color: '#3E576F',
								fontSize: '28px',							
							},  
							marginTop:'60',         
		                },	                
		                subtitle: {
		                    text: name_mapa[0] + "<br>[Porcentaje]",
		                    //useHTML: true,
						    style: {
						        //color: '#000000',
						        //fontWeight: 'bold',
						        fontSize:  "<?php echo ( ( strlen($c_title)<94) ? '31px' : '21px' ) ; ?>" , 
				                'white-space': 'normal',
				                left: '0px',
				                top: '0px',
				                position: 'absolute',						        
					    	}		                    
		                },			                
		                xAxis: {
		                	lineWidth:2,
						    title: {
						        //text: 'DEPARTAMENTOS',
			                    style: {
									fontSize: '20px',
									fontName:'Arial Narrow',
									padding:'12', 
								},  
								marginBottom:'60',   						        
						    },		                	
		                    categories: name_dep_sorter[0],
					    	labels: {
					    		rotation:330,
						        style: {
						            fontSize: '16px',
						        }					    		
					    	},	
		                    tickLength: 1,
		                    tickWidth: 1,					    				    	                    
						},
		                yAxis: {
		                    min: 0,
		                    max:100,
		                    gridLineWidth: 0,
		                    lineWidth:2,
		                    title: {
		                        text: ' PORCENTAJE %',
			                    style: {
									//color: '#3E576F',
									fontSize: '20px'
								},	                        
		                    },
		                    labels:{
			                    style: {
									fontSize: '16px'
								},	
		                    },
		                },
		                legend: {
		                	enabled:false,
		                    backgroundColor: '#FFFFFF',
		                    align:  "<?php echo ($tipo == 'column') ? 'center' : 'right' ; ?>" ,
		                    layout: "<?php echo ($tipo == 'column') ? 'horizontal' : 'vertical' ; ?>" ,
		                    verticalAlign: "<?php echo ($tipo == 'column') ? 'bottom' : 'middle' ; ?>" ,
		                    //x: 0,
		                   	y: -10,
		                    floating: true,
		                    shadow: false,
				            navigation: {
				            	activeColor: '#3E576F',
								animation: true,
								arrowSize: 12,
								inactiveColor: '#CCC',
								style: {
									fontWeight: 'bold',
									color: '#333',
									fontSize: '18px'	
								}
							},
		                },
		                tooltip: {
		                    formatter: function() {//console.log(this);
		                        return ''+
		                            '<strong>' + this.x + ': </strong>' + Highcharts.numberFormat(this.y, 1,',',' ') + '%';
		                    }
		                },
		                plotOptions: {
		                    column: {
		                        //pointWidth: 65,
		                        allowPointSelect: true,
		                        borderWidth: 0,
					            events: {
						            legendItemClick: function () {
						                return false; 
						            }
						        },
		                    },
				            allowPointSelect: true, 		                    
				            series: {
				                groupPadding: 0,
				                //pointWidth: max_ancho,
				                animation: 4000,
				                dataLabels: {
				                    //enabled: true,			                	
				                    //borderRadius: 1,
				                    //color:'black',
				                    crop:false,//labels overflow, lo muestra 
				                    overflow: 'none',//labels overflow, lo muestra 
				                    backgroundColor: 'rgba(252, 255, 255,255)',
				                    padding: 2,
					                animation: {
					                    duration: 4000,
					                },			                    
				                    //borderWidth: 2,
				                    //borderColor: 'rgba(252, 255, 0, 0)',
				                    //y: 30,
				                    x: 1,		                	
				                    //shadow: true,
				                    //inside: true,
				                    style: {
				                        fontName:'arial narrow',
				                        //fontWeight:'bold',
				                        fontSize:'15px',
				                    },
				                    formatter: function() {
				                    	 return Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  + valor_dep_abs_sorter[this.series.index][this.point.x] + ']';
				                    },		                    		                    
				                },
				            },
		                },
		                exporting: {
		                	scale: 2000,
		                	filename: 'CENPESCO_' + num_tabulado ,
		                	sourceHeight: <?php echo $yy; ?>,
		                	sourceWidth: <?php echo $xx; ?>,
		                },
				        navigation: {
				            buttonOptions: {
				                enabled: false
				            }
				        },	                
	                
		                series: [{data: <?php echo json_encode(array_values($series[0]['data'])); ?> } ] ,// por defecto cogera el primer arreglo de SERIES, array_values: para hacer json de solo values sin indices.
		                //series: json_dep,
		                credits: {
		                    text: "<?php echo ($tipo == 'column') ? 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.' : 'I CENPESCO-2013' ; ?>",
						    style: {
						        fontSize: '14px'
					    	}		                    
		                }              	
	           	});
				
			    // var renderer = new Highcharts.Renderer(
			    //     $('#chart_div')[0], 
			    //     400,
			    //     100
			    // );
			    
			    // renderer.image('http://highcharts.com/demo/gfx/sun.png', 100, 100, 30, 30)
			    //     .add();

			//end chart
			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************

			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************
			//end chart

			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************
			//START chart	NACIONAL

	            chart_nac = new Highcharts.Chart({
	            //$('#container').highcharts({
		                chart: {		                	
		                    renderTo: 'chart_div_nac',
		                    type: 'bar',
		                    marginRight:60,
		                    marginTop:130,
		                    marginLeft:200,
		                    marginBottom:120,
					        plotBackgroundColor: null,
			                plotBorderWidth: null,
			                plotShadow: false
		                },
		                title: {
		                   	text: 'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + '', 
		                    style: {
								//color: '#3E576F',
								fontSize: '28px',
								padding:'12', 
							},  
							//marginTop:'60',  
							//height:100,      
		                },	                
		                subtitle: {
		                    //useHTML:true,		                	
		                    text: "<?php echo str_replace('SEGÚN DEPARTAMENTO,','',utf8_encode($c_title)); ?>" + "<br>[Porcentaje]",
				            align: 'center',
				            x: 1,
						    style: {
						    	height:'250px',
						        //color: '#000000',
						        //fontWeight: 'bold',
						       	fontSize:  "<?php echo ( ( strlen($c_title)<90) ? '23px' : '20px' ) ; ?>" , 
				                'white-space': 'nowrap',
				                left: '0px',
				                top: '0px',
				                position: 'absolute',
				                //fontFamily: 'serif',
					    	}		                    
		                },			                
		                xAxis: {
		                    categories: name_var_sorter,
		                    tickLength: 1,
		                    tickWidth: 2,
		                    //lineWidth:2,
		                    useHTML:true,
					    	labels: {
							    //step: 2,
							    // formatter: function () {
							    //     return this.value.replace(/ /g, '<br />');
							    // },				    		
						        style: {
						        	'white-space': 'normal',
						            fontSize: '18px',
					                left: '0px',
					                top: '0px',
					                position: 'absolute',						            
						        }	
					    	}	                    
						},
		                yAxis: {
		                    tickLength: 1,
		                    tickWidth: 2,		                	
		                    min: 0,
		                    //max:100,
		                    //lineWidth:2,
		                    gridLineWidth: 0,
		                    title: {
		                        text: false,

			                  	style: {
									//color: '#3E576F',
									fontSize: '18px'
								},	                        
		                    },
		                    labels:{
			                    style: {
									fontSize: '16px',
								},	
								y:30,	
		                    },
		                },
		                plotOptions: {

		                	bar:{
		                		allowPointSelect: true,
		                		//pointWidth: 30,
		                		borderWidth: 0,
		                		//showInLegend: false,
		                		grouping: false,
		                	},
					        pie: {
					        	grouping: false,
					        	cursor: 'pointer',
					        	allowPointSelect: true,
					            //size:500,
					            dataLabels: {
					                //verticalAlign:'top',
					            },
					            showInLegend: true,
					        },	                	
				            series: {
				                groupPadding: 0,
				                animation: 4000,
					           // innerSize: 200,
					            slicedOffset: 40,
					            //startAngle: -125,			                
				                dataLabels: {
				                	enabled:true,
				                    //borderRadius: 1,
				                    //color:'black',
				                    overflow: 'none',
				                    backgroundColor: 'rgba(252, 255, 255,255)',
				                    padding: 2,
					                animation: {
					                    duration: 4000,
					                },			                    
				                    //borderWidth: 2,
				                    //borderColor: 'rgba(252, 255, 0, 0)',
				                    //y: 30,
				                    x: 1,		                	
				                    style: {
				                        fontName:'arial narrow',
				                        //fontWeight:'bold',
				                        fontSize:'15px',
				                    },
				                    formatter: function() {
				                    	 return  Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  + valor_dep_abs_sorter[this.series.index][this.point.x] + ']';
				                    },		                    		                    
				                },
				            },		                	
		                },
		                tooltip: {
		                    formatter: function() {//console.log(this);
		                        return ''+ '<strong>' +  chart_nac.xAxis[0].categories[this.point.x] +'</strong>:<br>'+  this.y + '%';
		                    }
		                },
				       //  lang: {
				       //  	printChart: 'Imprimir Grafico',
				       //      downloadPNG: 'Descargar imagen como PNG',
				       //      downloadJPEG: 'Descargar imagen como JPEG',
				       //      downloadPDF: 'Descargar imagen como PDF',
				       //      downloadSVG: 'Descargar imagen como SVG'
				      	// }, 		                
		                series: [{
			                name: 'CIE',
			                data:data_pie_valor_nac 
			            	}],
		                credits: {
		                    text: 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.',
						    style: {
						        fontSize: '14px',
					    	}		                    
		                },
				        navigation: {
				            buttonOptions: {
				                enabled: false,
				            }
				        },		
		                legend: {
		                	enabled:false,
		                    backgroundColor: '#FFFFFF',
		                    align:   'right',
		                    layout: 'vertical',
		                    verticalAlign: 'middle',
		                    //x: 0,
		                   	y: -10,
		                    floating: true,
		                    shadow: false,
		                },				        	                
		                // exporting: {
		                // 	scale: 2000,
		                // 	//filename: 'cenpesco_nac',
		                // 	sourceHeight: 800,
		                // 	sourceWidth: 1200,
		                // },		                                
	           		} 
				);
				
			    // var renderer = new Highcharts.Renderer(
			    //     $('#chart_div')[0], 
			    //     400,
			    //     100
			    // );
			    
			    // renderer.image('http://highcharts.com/demo/gfx/sun.png', 100, 100, 30, 30)
			    //     .add();

			//end chart nac
			//******************************************************************************************************************************************************************************************
			//******************************************************************************************************************************************************************************************

			//*****
				size_nacional[1] = valor_nac.length*80 + chart_nac.margin[0] + chart_nac.marginBottom;
				if(size_nacional[1] > 1600){ size_nacional[1] = 1600;} 
				//chart_nac.setSize(size_nacional[0], size_nacional[1], doAnimation = true);
				//
					var valor_max = chart.yAxis[0].getExtremes().dataMax;
					function set_max_y_value(var_num) {
							if (var_num<99) {//el maximo de variable seleccionada
								valor_max = 0;
							    for (var i = 0; i < 24; i++) {
							    	if (valor_dep[var_num][i] > valor_max) {
							    		valor_max = valor_dep[var_num][i];
							    	} 
							    };	
							    if (valor_max<5) {
							    	valor_max = 5;
							    	chart.yAxis[0].setExtremes(0,5);
							    }else if (valor_max<10) {
							    	valor_max = 10;
							    	chart.yAxis[0].setExtremes(0,10);
							    }else if (valor_max<20) {
							    	valor_max = 20;
							    	chart.yAxis[0].setExtremes(0,20);
							    }else if (valor_max<30) {
							    	valor_max = 30;
							    	chart.yAxis[0].setExtremes(0,30);
							    }else if (valor_max<40) {
							    	valor_max = 40;
							    	chart.yAxis[0].setExtremes(0,40);
							    }else if (valor_max<50) {
							    	valor_max = 50;
							    	chart.yAxis[0].setExtremes(0,50);
							    }else if (valor_max<60) {
							    	valor_max = 60;
							    	chart.yAxis[0].setExtremes(0,60);
							    }else if (valor_max<70) {
							    	valor_max = 70;
							    	chart.yAxis[0].setExtremes(0,70);
							    }else if (valor_max<80) {
							    	valor_max = 80;
							    	chart.yAxis[0].setExtremes(0,80);
							    }else if (valor_max<90) {
							    	valor_max = 90;
							    	chart.yAxis[0].setExtremes(0,90);
							    }else if (valor_max<=100) {
							    	valor_max = 100;
							    	chart.yAxis[0].setExtremes(0,100);
							    };	
							}
					}

				    // TTipo de grafico NAC / DEP	
	    			
				    $('#cbo_nac_dep').change(function() {
				    	chart.redraw();					    	
				    	chart_nac.redraw();					    	
				    	if($(this).val() == 0 ){
				    		$("#chart_div").hide('slow');
				    		$("#div-graph").hide();
				    		$("#div-cbo-graph").hide();
				    		$("#btn_plot-line").hide();
				    		$("#data-max-value").hide();
				    		$("#data-min-value").hide();
				    		$("#chart_div_nac").show('slow');
				    		$("#div-cbo-graph_nac").show('slow');
				    		$("#cbo_type_graph_nac").trigger('change');
				    	}else{
				    		$("#cbo_type_graph").trigger('change');
				    		$("#div-cbo-graph_nac").hide('slow');
				    		$("#chart_div_nac").hide();
				    		$("#chart_div").show('slow');
				    		$("#div-graph").show('slow');
				    		$("#div-cbo-graph").show('slow');
				    		$("#btn_plot-line").show('slow');
				    		$("#data-max-value").show('slow');
				    		$("#data-min-value").show('slow');
				    	}
				    	num_color = 0; $('#btn_data-color').trigger('click');
				    });			

					$("ul li").click(function(e) {// Cambio de variable, grafico nacional
						if( $(this).parent().attr('id') == "combo-graf"){
							if( $(this).val() < 99 ){
								var var_num = $(this).val();
								$("#hd_variable").val(var_num);	

								chart.setTitle({text:'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + ''} ,{text: name_mapa[var_num]  + "<br>[Porcentaje]"} );	
								set_max_y_value(var_num);
					       
					            $(chart.series).each(function(){
					            	this.remove(true);
					            	//this.setVisible(false, false);
					            	chart.redraw(); 
					            });
					            chart.addSeries({data: valor_dep_sorter[var_num] });
					            chart.xAxis[0].setCategories(name_dep_sorter[var_num]);
					            $("#cbo_type_graph").trigger('change');
						        chart.series[0].update({// asignar el primer color por defecto
						            color:  Highcharts.getOptions().colors[0]
						        });				            
								
								//TRIGGERS para mantener  la seleccion actual
								plotline = true; $("#btn_plot-line").trigger('click');
								enableDataLabels = true; $("#data-labels").trigger('click');
								chart.redraw(); 
							}
						}
					});

					$("#cbo_type_graph").change(function(){ // cambia el tipo de grafico
						var var_num = 0; // num variable
						//var var_num = 0; // num variable
						if (var_num < 99) { // solo para una variables
							var graph_num = $(this).val();

							if (graph_num == 0) {
								chart.series[var_num].update({type:'column'});
							}else if(graph_num == 1){
								chart.series[var_num].update({type:'line'});
							}else if(graph_num == 2){
								chart.series[var_num].update({type:'spline'});
							}else if(graph_num == 3){
								chart.series[var_num].update({type:'area'});
							}else if(graph_num == 4){
								chart.series[var_num].update({type:'areaspline'});
							}else if(graph_num == 5){
								chart.series[var_num].update({type:'scatter'});
							}
							enableDataLabels = true; $("#data-labels").trigger('click');
							plotline = true;  $("#btn_plot-line").trigger('click');
				            chart.redraw(); 
						}
					})

					$("#cbo_type_graph_nac").change(function(){ // cambia el tipo de grafico del nacional
						//var var_num = 0; // num variable
							var graph_num = $(this).val();
							if (graph_num == 0) {
								chart_nac.series[0].update({type:'bar'});
								chart_nac.margin[0] = 140; // margen TOP del chart
								//chart_nac.setSize(size_nacional[0],size_nacional[1]);
								chart_nac.setSize(size_nacional[0],size_nacional[1]);
							}else if(graph_num == 1){
								chart_nac.series[0].update({type:'pie'});
								chart_nac.margin[0] = 150; // margen TOP del chart
								chart_nac.setSize(size_nacional[0],900);
							}
				            enableDataLabels = true; $('#data-labels').trigger('click') ;
				            chart_nac.redraw();
					})
				    // etiquetas de valores
				    $('#data-labels').click(function() {
				        	if(enableDataLabels){  $(this).html('Quitar  etiquetas '); } else{ $(this).html('Mostrar etiquetas');}					        	
							if($("#cbo_nac_dep").val()== 0){
								//console.log(chart_nac.yAxis[0].options);
								if($("#cbo_type_graph_nac").val()==0){ 
									//Highcharts.charts[0].xAxis[0].update({categories:['some','new','categories']}, true);
									//chart_nac.yAxis[0].options.title.text = "PORCENTAJE  %";
									chart_nac.yAxis[0].options.lineWidth = 2;
									chart_nac.xAxis[0].options.lineWidth = 2;
									//chart_nac.yAxis[0].update({title:'PORCENTAJE %',});	
									chart_nac.redraw();
								}else{
									chart_nac.xAxis[0].update({lineWidth:0,});
									chart_nac.yAxis[0].update({lineWidth:0,});									
								}
								
						        chart_nac.series[0].update({
						            dataLabels: {
						                enabled: enableDataLabels,
						                connectorWidth: 2,
						                verticalAlign:'top',
						                backgroundColor: 'none',
						                distance: 60, // distancias del label
					                    formatter: function() {
					                    	var x=0;
					                    	if($("#cbo_type_graph_nac").val()==0){ 
					                    	 	return Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  +  Highcharts.numberFormat(valor_nac_abs_sorter[this.point.x], 0,',',' ') + ']'; }
					                    	 	//return Highcharts.numberFormat(this.y, 1,',',' ')  + '%'; }
					                    	else{
					                    		return   chart_nac.xAxis[0].categories[this.point.x] + '<br>'+ Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  + Highcharts.numberFormat(valor_nac_abs_sorter[this.point.x], 0,',',' ') + ']';}
					                    		//return   chart_nac.xAxis[0].categories[this.point.x] + '<br>'+ Highcharts.numberFormat(this.y, 1,',',' ')+ '%';}
					                    },			                
						            }
						        });							
							}else{
						        chart.series[0].update({
						            dataLabels: {
						                enabled: enableDataLabels,
					                    formatter: function() {
					                    	var x=0;
					                    	 return Highcharts.numberFormat(this.y, 1,',',' ')+ '%<br>['  + valor_dep_abs_sorter[$("#hd_variable").val()][this.point.x] + ']';
					                    },			                
						            }
						        });	
							}	
							enableDataLabels = !enableDataLabels; 
				    });

				    //nuevos maximo rango
				    $('#data-max-value').click(function() {
				    	if (valor_max<100) {
				    		++valor_max ;
				    		chart.yAxis[0].setExtremes(0,valor_max);
				    	}
				    });		

				    //nuevos minimo rango
				    $('#data-min-value').click(function() {
				    	if (valor_max>1) {
							--valor_max ;
				    		chart.yAxis[0].setExtremes(0,valor_max); 
				    	}
				    });	

				    // Toggle point markers
				    var enableMarkers = false;
				    $('#data-puntos').click(function() {
				        chart.series[$("#hd_variable").val()].update({
				            marker: {
				                enabled: enableMarkers
				            }
				        });
				        enableMarkers = !enableMarkers;
				    });		
				    // Toggle point markers	

				    $('#btn_data-color').click(function() {
				        if($("#cbo_nac_dep").val()== 0){ chart_nac.series[0].update({ color:  Highcharts.getOptions().colors[num_color] }); }else{ chart.series[0].update({ color:  Highcharts.getOptions().colors[num_color] });}
				        num_color++; if (num_color ==11){num_color = 1; };
				    });

				    $('#btn_data-print').click(function() {
				    	if($("#cbo_nac_dep").val()== 0){chart_nac.print();}else{chart.print(); }
				    });

				    $('#data-download').click(function() {
				    	if($("#cbo_nac_dep").val()== 0){// grafico nacional
				    		if ($("#cbo_type_graph_nac").val()== 0) {
				    			chart_nac.exportChart({
				    				type: "image/png",
				                	sourceHeight:size_nacional[1],
				                	sourceWidth:size_nacional[0],				    			
				                	scale:2000,	
				                	filename: 'CENPESCO-'+ num_tabulado ,			    			
				                }); 
				    		}else{
				    			chart_nac.exportChart({
				    				type: "image/png",
				                	sourceHeight:1000,
				                	sourceWidth:1200,				    			
				                	scale:2000,	
				                	filename: 'CENPESCO-'+ num_tabulado ,			    			
				                }); 
				    		}	
				    	}else{
							chart.exportChart({
								type: "image/png",
								filename: 'CENPESCO_' + num_tabulado + '-' + ($("#hd_variable").val()+1),
							});
						}
				    });

				    //Plot line
				    $("#btn_plot-line").click(function() {
				    	chart.yAxis[0].removePlotLine();
				    	var valor_plot = valor_nac[$("#hd_variable").val()];
				        if (plotline) {
				            chart.yAxis[0].addPlotLine({
					            value: valor_plot,
					            color: 'red',
					            width: 1,
					            label: {
					                text: 'Perú: ' + Highcharts.numberFormat(valor_plot,1,',',' ') +'%',						                
					                style: {
					                    color: 'red',
					                    fontSize:'20px',
					                    fontWeight: 'bold',
					                },
					                align: 'right',					                
					            },
					            zIndex: 5,
					            dashStyle: 'longdashdot',
					             //id: 'plot-line-1'
				            });
				            $(this).html('Quitar nacional');
				        } else {
				            $(this).html('Mostrar nacional');
				        }
				        plotline = !plotline;
				    });

				    /* eventos inicializadores ---------------------------------------------------------------------- */
						set_max_y_value(0);// iniciando MAX VALOR con la primera variables
						$('#cbo_nac_dep').trigger('change');
				    /* eventos inicializadores ---------------------------------------------------------------------- */

			//*****		
				

		//});
	
	}); 	
				

</script>