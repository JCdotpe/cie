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
	'value'	=> set_value('formularios'),
	'maxlength'	=> 5,
	'class' => $span_class,
);

// CARGAR COMBOS

	$depaArray = NULL;
	$selected_NOM_DD = (set_value('NOM_DD_f')) ?  set_value('NOM_DD_f') : '';

		foreach($departamento->result() as $filas)
		{
			//$depaArray[substr(($filas->UBIGEO),0,2)]=strtoupper($filas->DEPARTAMENTO);
            $depaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);

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

	if ($this->session->flashdata('msgbox')===1){
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-success">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>EXITOSO! </strong>';
			    echo ' El registro fue guardado satisfactoriamente';
		    echo '</div>';
	    echo '</div>';
	}elseif ($this->session->flashdata('msgbox')===2) {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' Inesperado, no se pudo guardar';
		    echo '</div>';
	    echo '</div>';
	}elseif ($this->session->flashdata('msgbox')===3) {
		echo '<div class="row-fluid">';
		    echo '<div class="alert alert-info">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>ERROR! </strong>';
			    echo ' El centro poblado ya fue registrado';
		    echo '</div>';
	    echo '</div>';
	}

	echo '<div class="row-fluid ">';
		echo '<div class="span12 preguntas_n">';
			echo '<h3>REGISTRO DE PESCADORES </h3>';
		echo '</div>';	
	echo '</div>'; 

	echo '<div class="well modulo">';

		//A.-----------------------------------------
		echo '<div class="row-fluid">';

			echo '<div class="span12 titulos">';
				echo '<h5>A. UBICACION GEOGRAFICA</h5>';
			echo '</div>';							
	
			echo '<div class="row-fluid span11">';

				echo '<div class="control-group grupos span4">';
					echo form_label('DEPARTAMENTO','NOM_DD_f',$label1);
					echo '<fieldset>';
						echo '<div class="controls span2 grupos">';
							echo form_input($CCDD); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($CCDD['name']) . '</div>';
						echo '</div>';	
						echo '<div class="controls span10 grupos">';
							echo form_dropdown('NOM_DD_f', $depaArray, $selected_NOM_DD,'class=" span12" id="NOM_DD_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_DD_f') . '</div>';
							echo '<input type="hidden" name="NOM_DD" id="NOM_DD" />';

						echo '</div>';
					echo '</fieldset>';
				echo '</div>';

				echo '<div class="control-group grupos span4">';

					echo form_label('PROVINCIA','NOM_PP_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span2">';
							echo form_input($CCPP); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($CCPP['name']) . '</div>';
						echo '</div>';	

						echo '<div class="controls span10">';
							echo form_dropdown('NOM_PP_f', $provArray, $selected_NOM_PP,'class="span12" id="NOM_PP_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_PP_f') . '</div>';
							echo '<input type="hidden" name="NOM_PP" id="NOM_PP" />';
						echo '</div>';	

					echo '</fieldset>';

				echo '</div>'; 

				echo '<div class="control-group grupos span4">';

					echo form_label('DISTRITO','NOM_DI_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span2">';
							echo form_input($CCDI); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($CCDI['name']) . '</div>';
						echo '</div>';	

						echo '<div class="controls span10">';
							echo form_dropdown('NOM_DI_f', $distArray, $selected_NOM_DI,'class="span12" id="NOM_DI_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_DI_f') . '</div>';
							echo '<input type="hidden" name="NOM_DI" id="NOM_DI" />';
						echo '</div>';	

					echo '</fieldset>';

				echo '</div>'; 

			echo '</div>'; 	

			echo '<div class="row-fluid span11">';

				echo '<div class="control-group grupos span5">';

					echo form_label('CENTRO POBLADO','NOM_CCPP_f',$label1);

					echo '<fieldset>';
						echo '<div class="controls span2">';
							echo form_input($COD_CCPP); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($COD_CCPP['name']) . '</div>';
						echo '</div>';	
						echo '<div class="controls span9">';
							echo form_dropdown('NOM_CCPP_f', $ccppArray, $selected_NOM_CCPP,'class="span12" id="NOM_CCPP_f"'); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('NOM_CCPP_f') . '</div>';
							echo '<input type="hidden" name="NOM_CCPP" id="NOM_CCPP" />';
						echo '</div>';	

					echo '</fieldset>';

				echo '</div>'; 

				echo '<div class="control-group grupos offset3 span3">';
					echo form_label('CANTIDAD FORMULARIOS','formularios',$label1);
					echo '<div class="controls grupos span5">';
						echo form_input($formularios); 
						echo '<span class="help-inline"></span>';
						echo '<div class="help-block error">' . form_error($CCDD['name']) . '</div>';
					echo '</div>';	
				echo '</div>';						

			echo '</div>'; 

		echo '</div>'; // A
			
	echo '</div>'; 

		//echo anchor('/udra', 'inicio','class="btn btn-primary pull-left"');  

		echo form_submit('send', 'Registrar','class="btn btn-primary pull-right"');  

echo form_close();



		
		echo '<div class="row-fluid">';

			echo '<div class="span12">';
                echo '<table border="1" class="table table-hover table-condensed">';
                    echo '<thead>';
                        echo '<tr>';
                        echo '<th>N°</th>';
                        echo '<th>COD SEDE</th>';
                        echo '<th>SEDE</th>';                        
                        echo '<th>COD ODEI</th>';
                        echo '<th>ODEI</th>';
                        echo '<th>CODIGO</th>';
                        echo '<th>DEPARTAMENTO</th>';
                        echo '<th>CODIGO</th>';
                        echo '<th>PROVINCIA</th>';
                        echo '<th>CODIGO</th>';
                        echo '<th>DISTRITO</th>';
                        echo '<th>CODIGO</th>';
                        echo '<th>CENTRO POBLADO</th>';
                        echo '<th>N° FORMULARIOS</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    $id = 1;
                    foreach($tables as $row){
                        echo "<tr>";
                        echo "<td>". $id++ ."</td>";
                        echo "<td>". $row->SEDE_COD ."</td>";
                        echo "<td>". $row->NOM_SEDE ."</td>";                        
                        echo "<td>". $row->ODEI_COD ."</td>";
                        echo "<td>". $row->NOM_ODEI ."</td>";
                        echo "<td>". $row->CCDD ."</td>";
                        echo "<td>". $row->DEPARTAMENTO ."</td>";
                        echo "<td>". $row->CCPP ."</td>";
                        echo "<td>". $row->PROVINCIA ."</td>";
                        echo "<td>". $row->CCDI ."</td>";
                        echo "<td>". $row->DISTRITO ."</td>";
                        echo "<td>". $row->COD_CCPP ."</td>";
                        echo "<td>". $row->CENTRO_POBLADO ."</td>";
                        echo "<td>". $row->FORMULARIOS ."</td>";
                        echo "</tr>";  }
                    echo '</tbody>';
                echo '</table>';

			echo '</div>'; 	

		echo '</div>'; 

	// TABLA DETALLE <---------------------------


?>



<script type="text/javascript">

// U D R A ---------------------------------------------------------------------------------------->
$(function(){


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

 $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo se permiten letras"); 

 $.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
}, jQuery.format("Ingrese {0} caracteres."));

 $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
}, "Seleccione un valor");



// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

$("#NOM_DD_f, #NOM_PP_f, #NOM_DI_f, #NOM_CCPP_f").change(function(event) {
        var sel = null;
        var dep = $('#NOM_DD_f');
        var prov = $('#NOM_PP_f');
        var dist = $('#NOM_DI_f');
        var url = null;
        var cod = null;
        var op =null;

        switch(event.target.id){
            case 'NOM_DD_f':
                sel     = $("#NOM_PP_f");
                $('#CCDD').val($(this).val()); 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;
  
               $('#NOM_DD').val($('#NOM_DD_f option:selected').text());   

                break;

            case 'NOM_PP_f':
                sel     = $("#NOM_DI_f");
                $('#CCPP').val($(this).val()); 
                $('#NOM_PP').val($('#NOM_PP_f option:selected').text());                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI_f':
                sel     = $("#NOM_CCPP_f");
                $("#CCDI").val($(this).val());  
                $('#NOM_DI').val($('#NOM_DI_f option:selected').text());                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'NOM_CCPP_f':
                $("#COD_CCPP").val($(this).val());  
                $('#NOM_CCPP').val($('#NOM_CCPP_f option:selected').text());                 
                break;  
        }     
        
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            prov:prov.val(),
            dist:dist.val(),
            ajax:1
        };

        if(event.target.id != 'NOM_CCPP_f')
        {

        $.ajax({
            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
            
                // sel.empty();
                // if (op==3){
                //     sel.append('<option value=" -"> - </option>');
                // }                
                // $.each(json_data, function(i, data){
                //     if (op==1){
                //         sel.append('<option value="' + (data.UBIGEO).substring(2,4) + '">' + data.PROVINCIA + '</option>');
                //     }
                //     if (op==2){
                //         sel.append('<option value="' + (data.UBIGEO).substring(4,6)  + '">' + data.DISTRITO + '</option>');
                //    }
                //     if (op==3){
                //         sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                // });
               
                // if (op==1){
                //     $("#NOM_PP_f").trigger('change');
                //     }  
                // if (op==2){
                //     $("#NOM_DI_f").trigger('change');
                // }
                // if (op==3){
                //     $("#NOM_CCPP_f").trigger('change');
                // }

                sel.empty();
                if (op==3){
                    sel.append('<option value=" -"> - </option>');
                }                
                $.each(json_data, function(i, data){
                    if (op==1){
                        sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.CCDI+ '">' + data.DISTRITO + '</option>');
                   }
                    if (op==3){
                        sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                });
               
                if (op==1){
                    $("#NOM_PP_f").trigger('change');
                    }  
                if (op==2){
                    $("#NOM_DI_f").trigger('change');
                }
                if (op==3){
                    $("#NOM_CCPP_f").trigger('change');
                }


            }
        });   
     }
  
}); 

// CARGA COMBOS UBIGEO <-----------------------------

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
    // submitHandler: function(form) {
    //     ('#form_udra_pes').submit(); //submit it the form

    // }       
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

$("#NOM_DD_f").trigger('change');

});

// UDRA <--------------------------

</script>



