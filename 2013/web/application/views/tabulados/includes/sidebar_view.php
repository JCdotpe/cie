<div class="row-fluid" style="margin-left: 8px;">

    <?php if($opcion<100) { ?>

        <div class="scroll-menu btn-group">
              <button class="btn btn-success">Tabulados de Capitulo 7</button>
              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
                <span class="caret"></span>
                <span class="sr-only"></span>
              </button>    
            <ul class="dropdown-menu"  role="menu" >
              <?php foreach ($nom_tabulados->result() as $key => $value) {
                    if(  $value->n < 100 ) { echo '<li '. ( ($opcion == $value->n) ? 'class="active"' : '').'><a href="'.  site_url('tabulados/capitulo7/reporte'. $value->n ) .'">' . $value->reporte . '</a></li>'; }
              }?>
              


            </ul>
        </div><!--/.well -->

    <?php }else if ($opcion<198) { ?>


        <div class="scroll-menu btn-group">
              <button class="btn btn-success">Tabulados de Capitulo 8 </button>
              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
                <span class="caret"></span>
                <span class="sr-only"></span>
              </button>    
            <ul class="dropdown-menu"  role="menu" >
              
              <?php foreach ($nom_tabulados->result() as $key => $value) {
                    if ( $value->n > 99 && $value->n < 198 ) {echo '<li '. ( ($opcion == $value->n) ? 'class="active"' : '').'><a href="'.  site_url('tabulados/capitulo8/reporte_'. $value->n ) .'">' . $value->reporte . '</a></li>'; }
              }?>              

        </div>

    <?php } ?>
    

</div>
