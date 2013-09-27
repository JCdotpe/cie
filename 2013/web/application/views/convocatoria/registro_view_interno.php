
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">
<script src="<?php echo base_url('js/general/bootstrap.datepicker.js'); ?>"></script>
<script src="<?php echo base_url('js/main.js'); ?>"></script>

<div id="mymodal" class="modal hide fade in">
    <div class="modal-header">
    </div>
    <div class="modal-body">
    	<div id="mcontent">
		<div class="progress progress-striped active">
		  <div class="bar" style="width: 100%"></div>
		</div>
    	<p style="margin-top:10px">Procesando...</p>
    	</div>
    </div>
    <div class="modal-footer">
    </div>
</div>
<div id="freg">
<?php $this->load->view('convocatoria/forms/registro_form_interno.php');?>
</div>


<script type="text/javascript" charset="utf-8">
$(function(){


    $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
    });



    $('#fecha_nac').datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
        //startDate: '-70y',
        startDate: '01-01-1943',
        //endDate: '-18y',
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
        endDate: '31-08-2013',
        autoclose: true,
        startView: 2
    }).change();

});
    </script>