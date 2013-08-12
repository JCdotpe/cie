

<div class="row">
    <?php 
    if (!isset($msg))
    {
    ?>
        <div class="span4 offset4">
             <?php $this->load->view('convocatoria/forms/consulta_form'); ?>
        </div >
    <?php
    }else{
    ?>
        <div class="span5 offset4">
            <div class="well modulo">
                <h4>RESULTADO DEL CONSULTA DE INSCRIPCIÓN</h4>
                <?php 
                    if ($msg == '1')
                    {
                ?>
                    <div class="control-group">
                        <address>
                            <strong>Nombres: </strong><?php echo $nombre1." ".$nombre2; ?><br>
                            <strong>Apellidos: </strong><?php echo $ap_paterno." ".$ap_materno; ?><br>
                            <strong>Nombre de ODEI: </strong><?php echo $ODEI; ?><br>
                            <strong>Dirección del ODEI: </strong><?php echo $Lugar; ?><br>
                            <strong>Cargo Funcional: </strong><?php echo $cargoFuncional; ?><br>
                            <strong>Profesión: </strong><?php echo $Profesion; ?><br>
                            <strong>Estado: </strong><?php echo $NEstado; ?><br>
                        </address>
                    </div>
                <?php        
                    }else{
                ?>
                    <br>
                    <h4><?php echo $msg; ?></h4>
                <?php
                    }
                ?>           
            </div>
            <button class="btn btn-inverse pull-right" type="button" onclick="javascript:window.print();">Imprimir Consulta</button>
        </div>
    <?php
    }
    ?>

</div>

<script type="text/javascript">
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


 });   	
</script>