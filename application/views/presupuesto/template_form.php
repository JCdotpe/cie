<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">
<script src="<?php echo base_url('js/vendor/bootstrap.datepicker.js'); ?>"></script>

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
    <?php $this->load->view('presupuesto/forms/presupuesto_regform');?>
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
        autoclose: true,
        startView: 2
    });

} );
</script>