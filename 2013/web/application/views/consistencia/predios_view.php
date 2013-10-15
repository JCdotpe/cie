<h1>Predios - Codigo Local <?php echo $cod; ?></h1>


<div class="row-fluid">
  <div id="grid_content" class="span12" style="width: 900px;">
        <table id="editgrid"></table>
          <div class="span12" id="table_container">
               <!--AJAX-->
          </div>
  </div>
</div>

<?php print_r($predios->result()); ?>