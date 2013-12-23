<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');

	// $depaArray = array(-1 => 'Seleccione...', 99 => 'Departamentos');
	// foreach($depa->result() as $filas)
	// {
	// 	$depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Nombre));
	// }
	// $provArray = array(-1 => '');

	//$periodoArray = array(-1 => 'Seleccione...', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14', 99 => 'Todos');

	$fecha_min = array(
		'name'	=> 'fecha_min',
		'id'	=> 'fecha_min',
		'maxlength'	=> 10,
		'class' => 'input10 fechap',
		'onKeyUp' => "javascript:this.value=formateafecha(this.value);",
	);

	// $fecha_max = array(
	// 	'name'	=> 'fecha_max',
	// 	'id'	=> 'fecha_max',
	// 	'maxlength'	=> 10,
	// 	'class' => 'input10 fechap',
	// 	'onKeyUp' => "javascript:this.value=formateafecha(this.value);",
	// );

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('consistencia/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<?php echo form_open('','id="frm_reporte"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Fecha de Inicio', 'fxinicio', $label_class); ?>
						<div class="controls">
							<?php echo form_input($fecha_min); ?>
						</div>
					</div>
				</div>
				<!-- <div class="span2">
					<div class="control-group">
						<?php //echo form_label('Fecha de Fin', 'fxfin', $label_class); ?>
						<div class="controls">
							<?php //echo form_input($fecha_max); ?>
						</div>
					</div>
				</div> -->
				<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="Reportar()"'); ?>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div id="grid_content" class="span10">
			<!-- <table id="lista" style="width:950px;" class="display">
				<thead>
					<tr>
						<th rowspan="2">Departamento</th>
						<th rowspan="2">Meta</th>
						<th colspan="2">Numero de Locales Escolares</th>
						<th>%</th>
						<th>Número de Cédulas Faltantes</th>
						<th>%</th>
					</tr>
					<tr>
						<th>Digitado Dia</th>
						<th>Digitado Acumulado</th>
						<th>Avance</th>
						<th>Falta Digitar</th>
						<th>Avance</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center">val.departamento</td>
						<td class="center">val.meta</td>
						<td class="center">val.digitado_dia</td>
						<td class="center">val.digitado_acumulado</td>
						<td class="center">val.avance</td>
						<td class="center">val.falta_digitar</td>
						<td class="center">val.avance</td>
					</tr>
				</tbody>
			</table> -->
		</div>
		<div class="span12">
			<?php echo form_button('expo','Exportar a Excel','class="btn btn-inverse pull-right" id="expo" style="margin-top:20px" disabled="disabled" onClick="exportExcel()"'); ?>
		</div>
	</div>
</div>
<script type="text/javascript">

function Reportar()
{
	var fecha_min = $('#fecha_min').val();
	// var fecha_max = $('#fecha_max').val();
	$('#expo').removeAttr('disabled');

	ViewResultado(fecha_min);
}

function ViewResultado(fxmin)
{
	$.getJSON(urlRoot('index.php')+'/consistencia/avance_digitacion/digitacion/' , {v_fxmin:fxmin}, function(data, textStatus) {

			table='<table id="lista" style="width:950px;" class="display">'+
			'<thead>'+
				'<tr>'+
					'<th rowspan="2">Departamento</th>'+
					'<th rowspan="2">Meta</th>'+
					'<th colspan="2">Numero de Locales Escolares</th>'+
					'<th>%</th>'+
					'<th>Número de Cédulas Faltantes</th>'+
					'<th>%</th>'+
				'</tr>'+
				'<tr>'+
					'<th>Digitado Dia</th>'+
					'<th>Digitado Acumulado</th>'+
					'<th>Avance</th>'+
					'<th>Falta Digitar</th>'+
					'<th>Avance</th>'+
				'</tr>'+
			'</thead>'+
			'<tbody>';

			$.each(data, function(index, val) {

				table+='<tr>'+
						'<td class="center">'+val.Sede_Operativa+'</td>'+
						'<td class="center">'+val.Meta+'</td>'+
						'<td class="center">'+val.Digit_Dia+'</td>'+
						'<td class="center">'+val.Digit_Acum+'</td>'+
						'<td class="center">'+val.Avance1+'</td>'+
						'<td class="center">'+val.Falta_Dig+'</td>'+
						'<td class="center">'+val.Avance2+'</td>'+
					'</tr>';
			});

			table+='</tbody>'+
			'</table>';
		
		$("#grid_content").html(table);
		$('#lista').dataTable( {
			"bJQueryUI": false,
			"bFilter": false,
			"bLengthChange": false,
			"sPaginationType": "full_numbers",
			"bScrollCollapse": true,
			"sScrollY": "300px"
		} );
	});
}
	function exportExcel()
	{
		var fecha_min = $('#fecha_min').val();
		// var fecha_max = $('#fecha_max').val();

		if ( fecha_min == '' )
		{ 
			alert("Ud. No ha Ingresado Parámetros de Búsqueda");
		}else{
			document.forms[0].method='POST';
			document.forms[0].action=urlRoot('index.php')+"/consistencia/csvExport/exp_avance_digitacion?v_fxmin="+fecha_min;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}



//*******************************************************
  function IsNumeric(valor) 
  { 
    var log=valor.length; var sw="S"; 
    for (x=0; x<log; x++) 
    { v1=valor.substr(x,1); 
    v2 = parseInt(v1); 
    //Compruebo si es un valor numérico 
    if (isNaN(v2)) { sw= "N";} 
    } 
    if (sw=="S") {return true;} else {return false; } 
  }

  function IsRange(dia, mes) 
  {
    var sw=0;
    switch(mes)
    {
      case '01':
        if (dia<=31){ sw=1; }
      break;    
      case '02':
        if (dia<=29){ sw=1; }
      break;          
      case '03':
        if (dia<=31){ sw=1; }
      break;
      case '04':
        if (dia<=30){ sw=1; }
      break;
      case '05':
        if (dia<=31){ sw=1; }
      break;
      case '06':
        if (dia<=30){ sw=1; }
      break;
      case '07':
        if (dia<=31){ sw=1; }
      break;
      case '08':
        if (dia<=31){ sw=1; }
      break;
      case '09':
          if (dia<=30){ sw=1; }
        break;
        case '10':
        if (dia<=31){ sw=1; }
      break;
      case '11':
        if (dia<=30){ sw=1; }
      break;
      case '12':
        if (dia<=31){ sw=1; }
      break;
    }
    
    if (sw==1) {return true;} else {return false; } 
  }

  var primerslap=false; 
  var segundoslap=false; 

  function formateafecha(fecha) 
  { 
    var long = fecha.length; 
    var dia; 
    var mes; 
    var ano;
    var d = new Date();
    var diaactual = d.getDate();
    var mesactual = d.getMonth()+1;
    var anoactual = d.getFullYear();
    if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
    if ((IsNumeric(dia)==true) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
    else { fecha=""; primerslap=false;} 
    } 
    else 
    { dia=fecha.substr(0,1); 
    if (IsNumeric(dia)==false) 
    {fecha="";} 
    if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
    } 
    if ((long>=5) && (segundoslap==false)) 
    { mes=fecha.substr(3,2); dia=fecha.substr(0,2);
    if ((IsNumeric(mes)==true) && (mes!="00") && (IsRange(dia,mes)==true)) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
    else { fecha=fecha.substr(0,3);; segundoslap=false;} 
    } 
    else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
    if (long>=7) 
    { ano=fecha.substr(6,4); 
    if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
    else { if (long==10){ if ((ano==0) || (ano>anoactual)) { fecha=fecha.substr(0,6); } } } 
    }
    if (long==5)
    {
      if (mes==mesactual){
        if (dia>diaactual){ fecha=fecha.substr(0,3);; segundoslap=false; }
      }else if(mes>mesactual){ fecha=fecha.substr(0,3);; segundoslap=false; }
    }

    if (long==10)
    {
      dia=fecha.substr(0,2);
      mes=fecha.substr(3,2);
      // if ((ano!=2013)){ fecha=""; }
      // if ((ano<=2013) && (mes<9)){ fecha=""; }
      // if ((ano==2013) && (mes==9) && (dia<9)){ fecha=""; }
    }
    if (long>=10) 
    { 
      fecha=fecha.substr(0,10); 
      dia=fecha.substr(0,2); 
      mes=fecha.substr(3,2); 
      ano=fecha.substr(6,4); 
      // Año no viciesto y es febrero y el dia es mayor a 28 
      // if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
    } 
    return (fecha); 
  }
 //*******************************************************

</script>