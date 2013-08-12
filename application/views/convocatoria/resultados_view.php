	<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/general/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
<script src="<?php echo base_url('js/resultados/resultados.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>

	<div class="row-fluid ">

		<div class="span12 preguntas_n">
			<h3>CENSO  DE INFRAESTRUCTURA EDUCATIVA</h3>
			<h4>RESULTADO: CONVOCATORIA DE PERSONAL</h4>
		</div>

		<div class="form-search" style="float: right; margin-right: 20px;">
		  <input type="text" id="buscardni"  maxlength="8" class="input-medium search-query">
		  <button type="button"  class="btn" onClick="filtro_dni()">Buscar por DNI</button>
		</div>

	</div>
<div class="row-fluid">
  <div id="grid_content" class="span12" style="width: 1170px;">
        <table id="editgrid"></table>
          <div class="span12">
            <table id="list2" style="width: 1170px;"></table>
            <div id="pager2" style="width: 1170px;"></div>
          </div>
  </div>
</div>

<script type="text/javascript">

$(function(){


        $('#redr').click(function() {
				if($('#acept').is(':checked')) {
					window.location = CI.base_url + 'index.php/inscripcion'
				}else{
					alert('Debe aceptar las condiciones para continuar.');
				}
          });
});

</script>