<div class="row-fluid">
  <div id="ap-sidebar" class="span2">
<?php 
$attr = array('class' => 'form-vertical form-auth','id' => 'eliminar');
echo form_open($this->uri->uri_string(),$attr); 

echo'
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="text-align:center;">1.</td>
                    <td><strong>Eliminar Codigo Local</strong></td>
                    <td>
                      <input type="text" class="input6 form-control" maxlength="6" name="cod_local" style="float:left;" id="cod_local">
                    </td>
                  </tr>
                </tbody>
            </table>';
echo form_submit('send', 'Eliminar','class="btn btn-primary pull-right"');

echo form_close(); 

?>
  </div>
</div>


<script type="text/javascript">

//PREDIOS ADD
$(function(){


$("#eliminar").validate({
        rules: {                                                                                                                                                                                                   
              cod_local:{
              	required:true,
              }
        },

        messages: {   
              cod_local:"requerido",
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
            var strc = $("#cod_local").val(); 
            if (confirm('Esta seguro de eliminar el codigo local - ' + strc)) {
                    var eli_data = {
                      cod_local: strc,
                      ajax:1
                    };    
                
                    var bcar = $( "#eliminar :submit" );
                     bcar.attr("disabled", "disabled");
                    $.ajax({
                        url: CI.site_url + "/consistencia/eliminar/del",
                        type:'POST',
                        data:eli_data,
                        dataType:'json',
                        success:function(json){
                            bcar.removeAttr('disabled');
                            alert('El codigo local fue eliminado');
                        },
                    });    
                  
            }
        }       
}); 

}); 

</script>