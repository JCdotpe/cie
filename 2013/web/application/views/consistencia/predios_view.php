
<?php 
$pr_view = ($pr == 0)? 'No se encontraron' : $pr;
 ?>
<h4>Codigo de local: <?php echo $cod; ?> - Predio <?php echo $pr_view; ?><button type="button" class="btn btn-success" id="prbtn">+</button></h4>

<ul id="predios" class="predios_views">
</ul>

<script type="text/javascript">
$(function(){


// jQuery Validator



$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
     email: "Ingrese un email válido",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
     number: "Solo se permiten números",
     digits: "Solo se permiten números",
    range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
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

 $.validator.addMethod("val3", function(value, element,arg){
    var length = arg.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(arg[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un valor entre {0}, {1} y {2}");

 $.validator.addMethod("valdia", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','99')
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un día válido");


 $.validator.addMethod("valmes", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','99');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido");


 $.validator.addMethod("valmescen", function(value, element){
    var dias = new Array('08','09');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido(08,09)");

$.validator.addMethod("valnone", function(value, element, arg){
    var flag = true;
    if(value == 1){
        for(var i = 0; i<=arg.length; i++){
            if($('#' + arg[i]).val() == 1)
              flag = false;
        }
    }
    return flag;
 }, "Si ya selecciono una alternativa no debe seleccionar este item");  


$.validator.addMethod("valzero", function(value, element, arg){
    flag = false;
    if(value == 0){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() == 1)
               flag = true;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Debe ingresar al menos una opción, no pueden ser 0 todas las opciones.");  


 $.validator.addMethod("valrango", function(value, element,arg){
    var flag = false;
        if(((value >= arg[0] && value<=arg[1]) || value == arg[2]) && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valjango", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2])
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valrucc", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2] || value == arg[3] || value == arg[4] && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}, {3}, {4}");



// jQuery Validator

	// function(i, data){
	// 	function( fila, valor )
  $.each( <?php echo json_encode($predios->result()); ?>, function(i, data) {
	  	var ahua = 'Principal';
	  	var act = (<?php echo $pr; ?> == data.Nro_Pred)? 'class="active"' : '';
	  	if(data.Nro_Pred != 1){
	  		ahua = (data.P1_B_2A_PredNoCol==0)? 'Colindante' : 'No Colindante';
	  	}

		$('#predios').append('<li ' + act + '><a target="_self"  href="' + CI.site_url + '/consistencia/local/' + data.id_local + '/' + data.Nro_Pred + '">'+ data.Nro_Pred  + ' - ' + ahua + '</a></li>')
	});

}); 
</script>
<?php 

if($pr!=0){


echo form_hidden('id_local', $cod); 
echo form_hidden('Nro_Pred', $pr); 
?>
<div class="row-fluid" id="pesc_tabs" style="margin-top:10px">
	<div class="span12" id="insidetabs" style="text-align:center">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul class="nav nav-tabs" style="text-align:center">
		    <li id="ctab2"><a href="#tabc" data-toggle="tab">Carátula</a></li>
		    <li id="ctab2"><a href="#tab1" data-toggle="tab">Capítulo I</a></li>
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Capítulo II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Capítulo III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Capítulo IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Capítulo V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Capítulo VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Capítulo VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Capítulo VIII</a></li>
		    <li id="ctab9"><a href="#tab9" data-toggle="tab">Capítulo IX</a></li>
		  </ul>
		  <div class="tab-content">
		    <div class="tab-pane" id="tabc">
		      <p><?php $this->load->view('consistencia/forms/car_form'); ?></p>
		    </div>	

		    <div class="tab-pane" id="tab1">
		      <p><?php $this->load->view('consistencia/forms/cap1_form'); ?></p>
		    </div>	

		    <div class="tab-pane" id="tab2">
		      <p><?php $this->load->view('consistencia/forms/cap2_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab3">
		      <p><?php $this->load->view('consistencia/forms/cap3_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab4">
		      <p><?php $this->load->view('consistencia/forms/cap4_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab5">
		      <p><?php $this->load->view('consistencia/forms/cap5_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab6">
		      <p><?php $this->load->view('consistencia/forms/cap6_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab7">
		      <p><?php $this->load->view('consistencia/forms/cap7_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab8">
		      <p><?php $this->load->view('consistencia/forms/cap8_form'); ?></p>
		    </div>  

		    <div class="tab-pane" id="tab9">
		      <p><?php $this->load->view('consistencia/forms/cap9_form'); ?></p>
		    </div>  

		  </div>
		</div>
	</div>
</div>

<?php 
}else{

/////////////////////////////////////////////////////////////////////////////////
//PREDIOS

$P1_B_1_TPred = array(
  'name'  => 'P1_B_1_TPred',
  'id'  => 'P1_B_1_TPred',
  'maxlength' => 1,
);

$P1_B_2_PredCol = array(
  'name'  => 'P1_B_2_PredCol',
  'id'  => 'P1_B_2_PredCol',
  'maxlength' => 1,
);



echo'
      <div id="prediosini" class="hide">';

$attr = array('class' => 'form-vertical form-auth','id' => 'predios_f');
echo form_open($this->uri->uri_string(),$attr); 

echo'
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="text-align:center;">1.</td>
                    <td><strong>¿Cuantos predios ocupa el local escolar?</strong></td>
                    <td>
                      <label>N° de predios</label>
                      '.form_input($P1_B_1_TPred).'
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">2.</td>
                    <td><strong>¿Los predios son colindantes?</strong></td>
                    <td>
                      '.form_input($P1_B_2_PredCol).'
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">2A.</td>
                    <td><strong>¿cuales son los predios no colindantes?</strong></td>
                    <td>
                      <label>N° de predio</label>
                      '.form_input($P1_B_2_PredCol).'
                    </td>
                  </tr>
                </tbody>
            </table>';

echo form_submit('send', 'Guardar','class="btn btn-primary"');
echo form_close(); 
echo '</div>';
} 
?>

<script type="text/javascript">
$(function(){

$('#prbtn').click(function(){
      $('#prediosini').toggle();
  });

}); 
</script>