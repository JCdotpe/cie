<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts-more.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/highcharts/modules/exporting.js'); ?>"></script>


<div class="row-fluid"  style="width:100%; height: 100%; margin: 0 auto !important; position:relative;">
<!-- <div class="span12" > -->
	
	    <!-- <div class="chart-wrapper"><div class="chart-inner" id="chart_div"  ></div></div> -->
    <div class="chart-wrapper"><div class="chart-inner" id="chart_div"  style="width:2030px; height: 840px; margin: 0 auto !important"></div></div>
 	<!-- <div class="chart-inner" id="chart_div"  ></div> -->

		<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script> -->


</div>



<script type="text/javascript">


	$(function(){

			//***************************************************************************************************
	        var chart;

	        $(document).ready(function() {
	            chart = new Highcharts.Chart({

	            	//$('#container').highcharts({

	                chart: {
	                    renderTo: 'chart_div',
	                    type: '<?php echo $tipo; ?>',
	                    marginRight: <?php echo ($tipo == 'bar') ? 210 : 0 ; ?>,
	                    marginBottom: <?php echo ($tipo == 'column') ? 120 : 50 ; ?>,

	                },
	                title: {
	                    text: 'GRÁFICO N° '+ "<?php echo sprintf('%02d',$opcion); ?>" + '', 
	                    style: {
							//color: '#3E576F',
							fontSize: "<?php echo ($tipo == 'column') ? '34px' : '30px' ; ?>",
							padding:2, 
						},                   
	                },	                
	                subtitle: {
	                    text: '<?php echo $c_title; ?> ',
					    style: {
					        //color: '#000000',
					        //fontWeight: 'bold',
					        fontSize: "<?php echo ($tipo == 'column' && strlen($c_title)<=100 ) ? '34px' : '20px' ; ?>", 
				    	}		                    
	                },			                
	                xAxis: {
	                    categories: [
	              			'Amazonas','Ancash','Apurimac','Arequipa','Ayacucho','Cajamarca','Cuzco','Huancavelica','Huanuco','Ica','Junin','La Libertad',
	              			'Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno' ,'San Martin','Tacna','Tumbes', 'Ucayali'
	                    ],
	                    tickLength: 25,
	                    tickWidth: 3,
					    style: {
					        fontSize: '22px'
				    	}		                    
					},
	                yAxis: {
	                    min: 0,
	                    max:100,
	                    gridLineWidth: 1.5,
	                    title: {
	                        text: ' Porcentaje %',
		                    style: {
								//color: '#3E576F',
								fontSize: '18px'
							},	                        
	                    },
	                    labels:{
		                    style: {
								fontSize: '16px'
							},	
	                    },

	                },
	                legend: {
	                    backgroundColor: '#FFFFFF',
	                    align:  "<?php echo ($tipo == 'column') ? 'center' : 'right' ; ?>" ,
	                    layout: "<?php echo ($tipo == 'column') ? 'horizontal' : 'vertical' ; ?>" ,
	                    verticalAlign: "<?php echo ($tipo == 'column') ? 'bottom' : 'middle' ; ?>" ,
	                    //x: 0,
	                   	y: <?php echo ($tipo == 'column') ? -20 : 0 ; ?> ,
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
	                            '<strong>' + this.series.name + ': </strong>' + this.y + '%';
	                    }
	                },
	                plotOptions: {
	                    column: {
	                        pointPadding: 0,
	                        borderWidth: 1
	                    },
			            series: {
			                groupPadding: 0,
			                dataLabels: {
			                    enabled: true,			                	
			                    borderRadius: 8,
			                    //color:'black',
			                    overflow: 'none',
			                    backgroundColor: 'rgba(252, 255, 255,255)',
			                    padding: 0,
			                    //borderWidth: 2,
			                    //borderColor: 'rgba(252, 255, 0, 0)',
			                    //y: 30,
			                    x: 1,		                	
			                    //shadow: true,
			                    //inside: true,
			                    style: {
			                        //fontWeight:'bold',
			                        fontName:'arial narrow',
			                    },
			                    formatter: function() {
			                    	if (this.y > 0 && this.y < 1) { return Highcharts.numberFormat(this.y, 1);};
			                    	if (this.y > 1 ) { return Highcharts.numberFormat(this.y, 1);};
			                        
			                    },		                    		                    
			                }			                
			            },	  

	                },
	                exporting: {
	                	scale: 2000,
	                	filename: 'cenpesco_' + <?php echo $opcion; ?> ,
	                	sourceHeight: <?php echo $yy; ?>,
	                	sourceWidth: <?php echo $xx; ?>,
	                },
	                
	                series: <?php echo json_encode($series); ?> ,
	                credits: {
	                    text: "<?php echo ($tipo == 'column') ? 'Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.' : 'I CENPESCO-2013' ; ?>",
					    style: {
					        fontSize: '13px'
				    	}		                    
	                },	                	
	            });



				// $(window).resize(function() {
				//     height = chart.height
				//     width = $("#chartRow").width() / 2
				//     chart.setSize(width, height, doAnimation = true);
				// });


				//tamaño especifico
				chart.setSize( <?php echo $xx; ?>, <?php echo $yy; ?>);

	        });
			
	 }); 	
				




</script>