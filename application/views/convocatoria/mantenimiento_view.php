
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">
<script src="<?php echo base_url('js/general/bootstrap.datepicker.js'); ?>"></script>
<script src="<?php echo base_url('js/main.js'); ?>"></script>

<div class="row">
    <?php
    if (!isset($msg)){
    ?>
        <div class="span4 offset4">
             <?php $this->load->view('convocatoria/forms/consulta_form'); ?>
        </div >
    <?php
    }else{
    ?>

            <div class="well modulo">
                <h4>RESULTADO DE CONSULTA DE INSCRIPCIÓN</h4>
                <?php
                    if ($msg == '1'){
                        $this->load->view('convocatoria/forms/update_form');

                ?>
                <?php

                    }else{
                ?>
                    <br>
                    <h4><?php echo $msg; ?></h4>
                <?php
                    }
                ?>
            </div>

    <?php
    }
    ?>
</div>

<script type="text/javascript">

/*
function getdate() {
    var result=null;

    var d = new Date();
            var dia=d.getDate();
            var mes = d.getMonth()+1;
            var anno=d.getFullYear();

    result = dia +'-'+mes+'-'+anno;
    return result;
}*/


$(function(){
$("#conv_consulta").validate({
    rules: {
        dni:{
            required: true,
            digits: true,
            exactlength: 8,
         },
        recaptcha_response_field:{
            required: true,
         },
    },
    messages: {
        dni:{
            required: "Ingrese dni",
            exactlength: "dni: 8 digitos",
         },
     },
   errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
 });

$('#fecha_nac').datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
        startDate: '01-01-1943',
        endDate: '31-07-1995',
        autoclose: true,
        startView: 2
    }).on('changeDate', function(ev){
            var fech=$('#fecha_nac').val();
            var day_nac=fech.substr(0,2);
            var month_nac=fech.substr(3,2);
            var year_nac=fech.substr(6,4);
            var d = new Date();
            var dia=d.getDate();
            var mes = d.getMonth();
            var anno=d.getFullYear();
            var negacion=true;
            if((anno-year_nac>18) || (anno-year_nac==18 && month_nac<mes) || (anno-year_nac==18 && month_nac==mes && day_nac<= dia)){
              negacion=false;
            }
            if(negacion){
                alert("Debes ser mayor de 18 años");
                $(this).val("");
            }
    });

    $('#fecha_exp').datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
        startDate: '01-01-1943',
        endDate: "<?php  echo date('d-m-Y'); ?>",
        autoclose: true,
        startView: 2
    });




 });
</script>