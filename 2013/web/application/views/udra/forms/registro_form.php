<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/general/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
<script src="<?php echo base_url('js/udra/udra.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>

<?php


$label1=  array('class' => 'preguntas_sub2');
//$span_class =  'span10';
$span_class2 =  'span6';
$span_class =  'span11';


// A.  UBICACION GEOGRAFICA ----------------------------------

$CCDD = array(
	'name'	=> 'CCDD',
	'id'	=> 'CCDD',
	'value'	=> set_value('CCDD'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCPP = array(
	'name'	=> 'CCPP',
	'id'	=> 'CCPP',
	'value'	=> set_value('CCPP'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCDI = array(
	'name'	=> 'CCDI',
	'id'	=> 'CCDI',
	'value'	=> set_value('CCDI'),
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

//B.  CENTRO POBLADO ---------------------------------------

$COD_CCPP = array(
	'name'	=> 'COD_CCPP',
	'id'	=> 'COD_CCPP',
	'value'	=> set_value('COD_CCPP'),
	'maxlength'	=> 10,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$formularios = array(
	'name'	=> 'formularios',
	'id'	=> 'formularios',
	'value'	=> 1,
	'maxlength'	=> 6,
	'class' => $span_class,
);

$ambito = array(
    'name'  => 'ambito',
    'id'    => 'ambito',
    'maxlength' => 50,
    'class' => $span_class,
);



// CARGAR COMBOS

    $depaArray=array(-1 => '-');
	$selected_NOM_DD = (set_value('NOM_DD_f')) ?  set_value('NOM_DD_f') : '';

		foreach($departamento->result() as $filas)
		{

            $depaArray[$filas->CCDD]=strtoupper($filas->Nombre);
		}
	$provArray = array();
	$selected_NOM_PP = (set_value('NOM_PP_f')) ?  set_value('NOM_PP_f') : '';

	$distArray = array();
	$selected_NOM_DI = (set_value('NOM_DI_f')) ?  set_value('NOM_DI_f') : '';

	$ccppArray = array();
	$selected_NOM_CCPP = (set_value('NOM_CCPP_f')) ?  set_value('NOM_CCPP_f') : '';

// FORM 1 --------------------------------------------------------------------------------------------->
$attr = array('class' => 'form-val','id' => 'form_udra_pes', 'style' => 'overflow: auto;');
echo form_open($this->uri->uri_string(),$attr);

	echo '<div class="row-fluid ">';
		echo '<div class="span12 preguntas_n">';
			echo '<h3>UDRA PARA</h3>';
			echo '<h3>REGISTRO DE CENSO DE INFRAESTRUCTURA </h3>';
		echo '</div>';
	echo '</div>';

	echo '<div class="well modulo">';



		//A.-----------------------------------------
		echo '<div class="row-fluid">';

			echo '<div class="span12 titulos">';
				echo '<h5>A. UBICACION GEOGRAFICA</h5>';
			echo '</div>';

			echo '<div class="row-fluid span11">';

				echo '<div class="control-group grupos span3">';
					echo form_label('DEPARTAMENTO','NOM_DD_f',$label1);
					echo '<fieldset>';

						echo '<div class="controls span10 grupos">';
							echo form_dropdown('NOM_DD_f', $depaArray, $selected_NOM_DD,'class=" span12" id="NOM_DD_f"');
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_DD_f') . '</div>';
							echo '<input type="hidden" name="NOM_DD" id="NOM_DD" />';
                            echo '<input type="hidden" name="ODEI_COD" id="ODEI_COD" />';
                            echo '<input type="hidden" name="NOM_ODEI" id="NOM_ODEI" />';
						echo '</div>';
					echo '</fieldset>';
				echo '</div>';

				echo '<div class="control-group grupos span3">';

					echo form_label('PROVINCIA','NOM_PP_f',$label1);

					echo '<fieldset>';

						echo '<div class="controls span10">';
							echo form_dropdown('NOM_PP_f', $provArray, $selected_NOM_PP,'class="span12" id="NOM_PP_f"');
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_PP_f') . '</div>';
							echo '<input type="hidden" name="NOM_PP" id="NOM_PP" />';
						echo '</div>';

					echo '</fieldset>';

				echo '</div>';

				echo '<div class="control-group grupos span6">';

					echo form_label('AMBITO CENSAL','NOM_DI_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span6">';
							echo form_input($ambito);
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($ambito['name']) . '</div>';
						echo '</div>';

					echo '</fieldset>';

				echo '</div>';

			echo '</div>';

			echo '<div class="row-fluid span5">';

				echo '<div class="control-group grupos span">';
					echo form_label('FORMULARIOS','formularios',$label1);
					echo '<div class="controls grupos span3">';
						echo form_input($formularios);
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($CCDD['name']) . '</div>';
					echo '</div>';

          echo '<div class="span1">';
            echo form_submit('send', 'Registrar','class="btn btn-inverse" ');
          echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>'; // A

	echo '</div>';

		//echo anchor('/udra', 'inicio','class="btn btn-primary pull-left"');
    echo '<div>';
      echo form_button('excel', 'Exportar a Excel','class="btn btn-primary pull-right" onClick="exportExcel_All_formularios()"');
    echo '</div>'; // A

echo form_close();

?>


<div id="grid_content">
        <table id="editgrid"></table>
        <table id="list"></table>
        <div id="pager2" ></div>
</div>

<div>
    <input type="BUTTON" id="bedata2" value="Editar" />
    <input type="BUTTON" id="elim_bedata2" value="Eliminar" />
</div>

<script type="text/javascript">

// U D R A ---------------------------------------------------------------------------------------->

// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->
$(function(){

jQuery("#list").jqGrid({
              type:"POST",
              url:'udra/udra/get_datatables_udra_registro',
              datatype: "json",
              height: 255,
              colNames:['Num','Departamento','Provincia','AMBITO CENSAL','FORMULARIOS ','FECHA'],
              colModel:[
                {name:'id',index:'id', width:5,editable:false, editoptions:{readonly:true}},
                {name:'dpto',index:'dpto', width:10,editable:false},
                {name:'prov',index:'prov', width:10,editable:false,edittype:"select",editoptions:{value:"1:Adquisición;2:Prestamo;3:Traslado"}},
                {name:'AMBITO_CENSAL',index:'AMBITO_CENSAL', width:10,editable:true},
                {name:'CANTIDAD_FORMULARIOS',index:'CANTIDAD_FORMULARIOS', width:10,editable:true},
                {name:'fecha_registro',index:'fecha_registro', width:20,editable:false},
              ],
              rowNum:30,
              rowList:[10,20,30],
              pager: '#pager2',
              sortname: 'fecha_registro',
              viewrecords: true,
              sortorder: "asc",
              autowidth: false,
              caption:"Editar",
              shrinkToFit:false,
              caption:"Resumen",
              editurl:"udra/udra/update_udra_registro"
          });

          jQuery("#list").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})
          $("#list").setGridWidth($('#grid_content').width(), true);
          $('#list').trigger( 'reloadGrid' );

         $("#bedata2").click(function(){
            var gr = jQuery("#list").jqGrid('getGridParam','selrow');
            if( gr != null )
              jQuery("#list").jqGrid('editGridRow',gr,{height:250,width:350,reloadAfterSubmit:true,closeAfterEdit: true}); else alert("Por favor, selecciona un registro");
          });

         $("#elim_bedata2").click(function(){
            var gr = jQuery("#list").jqGrid('getGridParam','selrow');
             if( gr != null ) jQuery("#list").jqGrid('delGridRow',gr,{reloadAfterSubmit:true, url:"udra/udra/update_registro_estado"});
             else alert("Please Select Row to delete!");
         });

$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
    // email: "Please enter a valid email address.",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
    //number: "Solo se permiten números",
     digits: "Solo se permiten números",
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
$.validator.addMethod("year", function(value, element, param) {
    return this.optional(element) || ( value > 1950 && value <= CI.year ) ;
}, "Ingrese un año válido");
$.validator.addMethod("valueEquals", function (value, element, param) {
    return param == value;
}, "Acepta la declaración de veracidad?");

$.validator.addMethod("peruDate",function(value, element) {
    return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
}, "Ingrese fecha: dd-mm-yyyy");

 $.validator.addMethod("validName", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/.test(value);
}, "Caracteres no permitidos");

$.validator.addMethod("validName2", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð .-123456789]+$/.test(value);
}, "Caracteres no permitidos");

 $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo se permiten letras");

 $.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
}, jQuery.format("Ingrese {0} caracteres."));

 $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
}, "Seleccione un valor");

// CARGA COMBOS UBIGEO <-----------------------------
function reg_formularios(){

        var form_data= new Array();
        form_data.push(
            {name: 'ajax',value:1},
            {name: 'cod_pto',value:$( "#NOM_DD_f" ).val()},
            {name: 'cod_prov',value:$( "#NOM_PP_f" ).val()},
            {name: 'ambito_censal',value:$( "#ambito" ).val()},
            {name: 'cantidad_formularios',value:$( "#formularios" ).val()}
        );

        form_data = $.param(form_data);
        $.ajax({
            url: CI.base_url + "index.php/udra/udra_registro/save",
            type:'POST',
            data:form_data,
            success:function(data){
              $('#list').trigger('reloadGrid');
              alert("se inserto correctamente");
            }
        });
}

$("#form_udra_pes").validate({
    rules: {

        NOM_DD_f:{
            valueNotEquals: -1,
        },
        CCDD:{
            required: true,
            number: true,
            maxlength:2,
        },
        NOM_PP_f:{
            required: true,
            valueNotEquals: -1,
        },
        CCPP:{
            required: true,
            number: true,
            maxlength:2,
        },
        NOM_DI_f:{
            valueNotEquals: -1,
        },
        CCDI:{
            required: true,
            number: true,
            maxlength:2,
        },
        NOM_CCPP_f:{
            valueNotEquals: -1,
        },
        COD_CCPP:{
            required: true,
            number: true,
            maxlength:6,
        },
        ambito:{
            required: true,
            validName2: true,
        },
        formularios:{
            required: true,
            number: true,
            maxlength:5,
            range: [0,99999]
        },

    //FIN RULES
    },

    messages: {

        NOM_DD_f:{
            valueNotEquals: "Ingrese DEPARTAMENTO",
        },
        CCDD:{
            required: "Código",
            number: "Solo números",
            maxlength:"Longitud maxima (02)",
        },
        NOM_PP_f:{
            required: "Ingrese PROVINCIA",
            valueNotEquals: "Ingrese PROVINCIA",
        },
        CCPP:{
            required: "Código",
            number: "Solo números",
            maxlength:"Longitud maxima (02)",
        },
        NOM_DI_f:{
            valueNotEquals: "Ingrese DISTRITO",
        },
        CCDI:{
            required: "Código",
            number: "Solo números",
            maxlength:"Longitud maxima (02)",
        },
        NOM_CCPP_f:{
            valueNotEquals: "Ingrese CENTRO POBLADO",
        },
        COD_CCPP:{
            required: "Código",
            number: "Solo números",
            maxlength:"Longitud maxima (6)",
        },
        formularios:{
            required: 'Ingrese cantidad',
            number: 'Solo números',
            maxlength:"Longitud maxima (5)",
        },
        ambito:{
            required: 'Ingrese el ámbito censal',
        },
    //FIN MESSAGES
    },
    errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
    invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
          ? 'Por favor corrige estos errores:\n'
          : 'Por favor corrige los ' + errors + ' errores.\n';
        var errors = "";
        if (validator.errorList.length > 0) {
            for (x=0;x<validator.errorList.length;x++) {
                errors += "\n\u25CF " + validator.errorList[x].message;
            }
        }
        alert(message + errors);
      }
      validator.focusInvalid();
    },
     submitHandler: function(form) {
        reg_formularios(); //submit it the form
       // $form[0].reset();
       $('#form_udra_pes')[0].reset();
       //$('#list').trigger('reloadGrid');

    }
});

$("#formularios").keydown(function(event) {
    // PERMITE: backspace, delete, tab, escape,  enter
    if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13){
             return;
    }
    // PERMITE: 0 - 9
    else if ((event.keyCode >= 96 && event.keyCode <= 105)|| (event.keyCode >= 48 && event.keyCode <= 57)) {
             return;
    }
    else {
        event.preventDefault();
    }
});

});


// UDRA <--------------------------

</script>


