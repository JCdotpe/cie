<?php

$txtPeaConvocatoria = array( 
	'name'	=> 'PeaConvocatoria', 
	'id'	=> 'PeaConvocatoria', 
	'value' => set_value('PeaConvocatoria')
);

$txtFechaInicio =array(
	'name'	=> 'fxinicio',
	'id'	=> 'fxinicio',
	'value'	=> set_value('fxinicio'),
	'maxlength'	=> 10,
	'style' => 'width: 70px;',
	'onblur' => 'validaFechaDDMMAAAA(this.value)',
	'onkeypress' => 'return validar_fechas(event)'
);

$txtFechaFinal =array(
	'name'	=> 'fxfinal',
	'id'	=> 'fxfinal',
	'value'	=> set_value('fxfinal'),
	'maxlength'	=> 10,
	'style' => 'width: 70px;',
	'onblur' => 'validaFechaDDMMAAAA(this.value)',
	'onkeypress' => 'return validar_fechas(event)'
);


$traslado =array(
	'name'	=> 'traslado',
	'id'	=> 'traslado',
	'value'	=> set_value('traslado','0'),
	'maxlength'	=> 3,
	'style' => 'width: 60px;',
	'onblur' => 'valida_traslado(this)',
	'onkeypress' => 'return validar_decimales(event)'
);

$trabajo_supervisor =array(
	'name'	=> 'trabajo_supervisor',
	'id'	=> 'trabajo_supervisor',
	'value'	=> set_value('trabajo_supervisor','0'),
	'maxlength'	=> 3,
	'style' => 'width: 60px;',
	'onblur' => 'valida_trabajo(this)',
	'onkeypress' => 'return validar_decimales(event)'
);

$recuperacion =array(
	'name'	=> 'recuperacion',
	'id'	=> 'recuperacion',
	'value'	=> set_value('recuperacion','0'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'onkeypress' => 'return valida_recugabidesc(event)',
	'onblur' => 'calculo_general()'
);

$retorno_sede =array(
	'name'	=> 'retornosede',
	'id'	=> 'retornosede',
	'value'	=> set_value('retornosede','0'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'onkeypress' => 'return valida_retorno(event)',
	'onblur' => 'calculo_general()'
);

$gabinete =array(
	'name'	=> 'gabinete',
	'id'	=> 'gabinete',
	'value'	=> set_value('gabinete','0'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'onkeypress' => 'return valida_recugabidesc(event)',
	'onblur' => 'calcula_totaldias()'
);

$descanso =array(
	'name'	=> 'descanso',
	'id'	=> 'descanso',
	'value'	=> set_value('descanso','0'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'onkeypress' => 'return valida_recugabidesc(event)',
	'onblur' => 'calcula_totaldias()'
);

$total_dias =array(
	'name'	=> 'totaldias',
	'id'	=> 'totaldias',
	'value'	=> set_value('totaldias','0'),
	'maxlength'	=> 2,
	'style' => 'width: 60px;',
	'readonly' => 'true'
);

$movlocal_ma =array(
	'name'	=> 'movilocal_ma',
	'id'	=> 'movilocal_ma',
	'value'	=> set_value('movilocal_ma','0'),
	'maxlength'	=> 10,
	'style' => 'width: 60px;',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'validar_movi_ma(this.value)'
);

$gastoperativo_ma =array(
	'name'	=> 'gastooperativo_ma',
	'id'	=> 'gastooperativo_ma',
	'value'	=> set_value('gastooperativo_ma','0'),
	'maxlength'	=> 10,
	'style' => 'width: 60px;',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'validar_gasto_ma(this.value)'
);

$movlocal_af =array(
	'name'	=> 'movilocal_af',
	'id'	=> 'movilocal_af',
	'value'	=> set_value('movilocal_af','0'),
	'readonly' => 'true',
	'style' => 'width: 60px;',
);

$gastoperativo_af =array(
	'name'	=> 'gastooperativo_af',
	'id'	=> 'gastooperativo_af',
	'value'	=> set_value('gastooperativo_af','0'),
	'readonly' => 'true',
	'style' => 'width: 60px;',
);

$pasaje =array(
	'name'	=> 'pasaje',
	'id'	=> 'pasaje',
	'value'	=> set_value('pasaje','0'),
	'maxlength'	=> 6,
	'style' => 'width: 60px;',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'calcula_totalaf()'
);

$total_af =array(
	'name'	=> 'total_af',
	'id'	=> 'total_af',
	'value'	=> set_value('total_af','0'),
	'maxlength'	=> 10,
	'readonly' => 'true',
	'style' => 'width: 60px;',
);


$observaciones =array(
	'name'	=> 'observaciones',
	'id'	=> 'observaciones',
	'value'	=> set_value('observaciones'),
	'maxlength'	=> 200,
	'style' => 'width: 350px;',
	'rows' => '4',
	'cols' => '6'
);

$btnconsultar = array(
    'name' => 'consulta',
    'id' => 'consulta',
    'type' => 'button',
    'onclick' => 'buscar_local()'
);

$btnagregar = array(
    'name' => 'agregar',
    'id' => 'agregar',
    'onclick' => 'Form_Validar()',
    'type' => 'button',
    'content' => 'Agregar',
    'class' => 'btn btn-primary pull-left'
);

$local =array( 
	'codlocal' => set_value('codlocal')
);

$txtExisteLocal =array(
	'existelocal'	=> set_value('existelocal')
);

$txtExisteRutaLocal =array(
	'existerutalocal'	=> set_value('existerutalocal')
);

$txtRangoFechas =array(
	'rangofechas'	=> set_value('rangofechas')
);

$attr = array('id' => 'frm_registro');
?>
<div class="row-fluid">
	<div class="span11">
		<?php echo form_open('',$attr); ?>
		<table style="text-align:center;">	
			<tbody>
				<tr>
					<td><?php echo form_label('Ingrese Códig  o de Local','lblCodigoLocal'); ?></td>
					<td><?php echo form_input($txtcodigolocal); ?></td>
					<td><?php echo form_button($btnconsultar, 'Consulta'); ?></td>
				</tr>
			</tbody>
		</table>
		<table >
			<tbody>
				<tr>
					<td><?php echo form_label('Codigo de Ruta', 'lblCodRuta'); ?></td>
					<td><?php echo form_label('Departamento', 'lblDepartamento'); ?></td>
					<td><?php echo form_label('Provincia', 'lblProvincia'); ?></td>
					<td><?php echo form_label('Distrito', 'lblDistrito'); ?></td>
					<td><?php echo form_label('Centro Poblado', 'lblCentroPoblado'); ?></td>
					<td><?php echo form_label('Fecha Inicio', 'lblFechaInicio'); ?></td>
					<td><?php echo form_label('Fecha Final', 'lblFechaFinal'); ?></td>
					<td><?php echo form_label('Traslado', 'lblTraslado'); ?></td>
					<td><?php echo form_label('Trabajo', 'lblTrabajo'); ?></td>
					<td><?php echo form_label('Recuperación', 'lblRecuperacion'); ?></td>
				</tr>
				<tr>
					<td><?php echo form_input($txtCodRuta); ?></td>
					<td><?php echo form_input($departamento); ?></td>
					<td><?php echo form_input($provincia); ?></td>
					<td><?php echo form_input($distrito); ?></td>
					<td><?php echo form_input($centro_poblado); ?></td>
					<td><?php echo form_input($fecha_inicio); ?></td>
					<td><?php echo form_input($fecha_final); ?></td>
					<td><?php echo form_input($traslado); ?></td>
					<td><?php echo form_input($trabajo_supervisor); ?></td>
					<td><?php echo form_input($recuperacion); ?></td>
				</tr>
				<tr>
					<td colspan="10"><div id="aviso" style="font-color: red"></div></td>
				</tr>
				<tr>
					<td><?php echo form_label('Retorno a Sede', 'lblRetornoSede'); ?></td>
					<td><?php echo form_label('Gabinete', 'lblGabinete'); ?></td>
					<td><?php echo form_label('Descanso', 'lblDescanso'); ?></td>
					<td><?php echo form_label('Total de Dias', 'lblTotalDias'); ?></td>
					<td><?php echo form_label('Movilidad Local MA', 'lblMovLocalMA'); ?></td>
					<td><?php echo form_label('Gasto Operativo MA', 'lblGastoOpeMA'); ?></td>
					<td><?php echo form_label('Movilidad Local AF', 'lblMovLocalAF'); ?></td>
					<td><?php echo form_label('Gasto Operativo AF', 'lblGastoOpeAF'); ?></td>
					<td><?php echo form_label('Pasaje', 'lblPasaje'); ?></td>
					<td><?php echo form_label('Total AF', 'lblTotalAF'); ?></td>
				</tr>
				<tr>
					<td><?php echo form_input($retorno_sede); ?></td>
					<td><?php echo form_input($gabinete); ?></td>
					<td><?php echo form_input($descanso); ?></td>
					<td><?php echo form_input($total_dias); ?></td>
					<td><?php echo form_input($movlocal_ma); ?></td>
					<td><?php echo form_input($gastoperativo_ma); ?></td>
					<td><?php echo form_input($movlocal_af); ?></td>
					<td><?php echo form_input($gastoperativo_af); ?></td>
					<td><?php echo form_input($pasaje); ?></td>
					<td><?php echo form_input($total_af); ?></td>
				</tr>
				<tr>
					<td colspan="5"><?php echo form_label('Observaciones', 'lblObservaciones'); ?></td>
					<td colspan="5"></td>
				</tr>
				<tr>
					<td colspan="5"><?php echo form_textarea($observaciones); ?></td>
					<td colspan="5">
						<?php echo form_button($btnagregar); ?>
						<?php echo form_hidden($local); ?>
						<?php echo form_hidden($txtExisteLocal); ?>
						<?php echo form_hidden($txtExisteRutaLocal); ?>
						<?php echo form_hidden($txtRangoFechas); ?>
					</td>
				</tr>
			</tbody>
		</table>
		<?php echo form_close(); ?>
	</div>
</div>

<div class="row-fluid">
  <div class="span12">
<table id="t_regs2" cellpadding="0" cellspacing="0" border="0" class="display" style="width: 100%;">
    <thead>
      <tr>
  
<?php

?>        
        <th>Ruta</th>
        <th>Codigo Local</th>
        <th>Fecha Inicio</th>
        <th>Fecha Final</th>
        <th>Traslado</th>      
        <th>Trabajo/Supervisor</th>
        <th>Recuperación</th>
        <th>Retorno a Sede</th>
        <th>Gabinete</th>     
        <th>Descanso</th>
        <th>Total de Dias</th>
        <th>Movilidad Local MA</th>
        <th>Gasto Operativo MA</th>
        <th>Movilidad Local AF</th>
        <th>Gasto Operativo AF</th>
        <th>Pasaje</th>
        <th>Total AF</th>
        <th>Observaciones</th>        
        <th>&nbsp;</th>
        
      </tr>
  </thead>
  <tfoot>
  </tfoot>
  <tbody>
    <td colspan="4" class="dataTables_empty">Cargando...</td>
  </tbody>
</table> 

  </div>
</div>

<script type="text/javascript">
 $(function(){
      
      $.editable.addInputType( 'datepicker', {

          
          element: function( settings, original ) {
            var form = $( this ),
                input = $( '<input />' );
            input.attr( 'autocomplete','off' );
            form.append( input );
            return input;
          },
          
         
          plugin: function( settings, original ) {
            var form = this,
                input = form.find( "input" );

            
             settings.onblur = 'nothing';

            datepicker = {
              dateFormat: 'yy-mm-dd',
              onSelect: function() {
               
                form.submit();
              },
              
              onClose: function() {
                setTimeout( function() {
                  if ( !input.is( ':focus' ) ) {
                    
                    original.reset( form );
                  } else {
                    
                    form.submit();
                  }
                  
                 
                }, 150 );
              }
            };
          
            if (settings.datepicker) {
             $.extend(datepicker, settings.datepicker);
            }

            input.datepicker(datepicker);
          }
      } );



    var productTable = $("#t_regs2").dataTable({
      "sDom": 'T<"clear">lfrtip',
      "oTableTools": {
            "sSwfPath": "extra/copy_csv_xls.swf",
            "aButtons": [
                "copy",
                "xls"
            ]          
        },
      "iDisplayLength":10,
      "sScrollX": "100%",
      "bScrollCollapse": true,       
      
      "bSortClasses": false,
      "bProcessing": false,
      "bServerSide": true,          
      "sAjaxSource": "segmentaciones/rutas/ver_datos",
      "aoColumns": [
          { "sClass": "idruta", "mData": 0},
          { "sClass": "codlocal", "mData": 1 , "bSearchable": true},
          { "sClass": "fxinicio", "mData": 2 },
          { "sClass": "fxfinal", "mData": 3 },
          { "sClass": "traslado", "mData": 4 },
          { "sClass": "trabajo_supervisor", "mData": 5 },
          { "sClass": "recuperacion", "mData": 6 },
          { "sClass": "retornosede", "mData": 7 },
          { "sClass": "gabinete", "mData": 8 },
          { "sClass": "descanso", "mData": 9 },
          { "sClass": "totaldias", "mData": 10 },
          { "sClass": "movilocal_ma", "mData": 11 },
          { "sClass": "gastooperativo_ma", "mData": 12 },
          { "sClass": "movillocal_af", "mData": 13 },
          { "sClass": "gastooperativo_af", "mData": 14 },
          { "sClass": "pasaje", "mData": 15 },
          { "sClass": "total_af", "mData": 16 },
          { "sClass": "observaciones", "mData": 17 },
          { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "70px", "mData": "DT_RowId", 
            "mRender": function(data, type, full) {
              return "<button class='btn btn-danger dtdelete' id='" + data + "' onclick='eliminardatos("+data+");'>Eliminar</button>";
            }
          }
    ],
     "oLanguage": {
        "sLengthMenu": "Mostrar _MENU_ registros por página",
        "sZeroRecords": "No se encontraron registros",
        "sInfo": "Mostrando _START_ - _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 to 0 of 0 records",
        "sInfoFiltered": "(Filtrado de _MAX_ registros en total)",                 
        "sSearch": "Buscar:", 
        "oPaginate": {
              "sNext": "Siguiente", 
              "sPrevious": "Anterior"
            }  
      }, 
     
    }); 

});
</script>