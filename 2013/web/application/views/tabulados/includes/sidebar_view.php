<div class="row-fluid" style="margin-left: 8px;">

    <?php ?>

        <div class="scroll-menu btn-group">
              <button class="btn btn-success">Tabulados </button>
              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
                <span class="caret"></span>
                <span class="sr-only"></span>
              </button>    
            <ul class="dropdown-menu"  role="menu" >
              <?php foreach ($nom_tabulados->result() as $key => $value) {
                    if(  $value->n < 100 ) { echo '<li '. ( ($opcion == $value->n) ? 'class="active"' : '').'><a href="'.  site_url('tabulados/capitulo1/reporte_'. $value->n ) .'">' . utf8_encode($value->reporte) . '</a></li>'; }
              }?>
              


            </ul>
        </div><!--/.well -->





    

</div>
