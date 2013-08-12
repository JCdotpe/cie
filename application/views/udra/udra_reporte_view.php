<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/seleccion.js'); ?>"></script>
<script src="<?php echo base_url('js/udra/udra.js'); ?>"></script>
<script src="<?php echo base_url('js/general/jquery-litelighter.js'); ?>"></script>
<script src="<?php echo base_url('js/general/jquery-waiting.js'); ?>"></script>
<?php
  $label_class =  array('class' => 'control-label');
  $span_class =  'span10';
  $span_class2 =  'span10';
  $Arrayactivo="";
  foreach ($activos->result() as $filas) {
    # code...
      $Arrayactivo[$filas->codigo_act]=utf8_encode(trim($filas->nombre_act));
  }
  $selected_activo = (set_value('comboactivo')) ? set_value('comboactivo') : '' ;
 ?>

<style type="text/css">
      /*body,img,p,h1,h2,h3,h4,h5,h6,form,table,td,ul,ol,li,dl,dt,dd,pre,blockquote,fieldset,label{
        margin:0;
        padding:0;
        border:0;
      }
      body{ background-color: #f8f7ec; border-top: solid 10px #777; font: 90% Helvetica, sans-serif; padding: 20px; }
      h1,h2,h3,h4{ margin: 10px 0; font-family: Plantin, "Plantin std", "Plantin", "Baskerville", Georgia, "Times New Roman", serif; font-weight: normal; }
      h1{font-size: 2.2em;margin: 0 0 20px 0; }
      h2{ background-color: #D95656; line-height: 18px; font-size: 18px; letter-spacing: 1px; padding: 5px 10px; margin: 10px 0 10px -60px; color: #fff; display: inline-block; border-radius: 4px; -moz-border-radius: 4px;-webkit-border-radius: 4px; }
      h3{ color: #D95656; font-size: 18px; letter-spacing: 1px;  margin: 15px 0 15px -20px; }
      h4{ color: #777; font-size: 18px; letter-spacing: 1px; }
      p{ margin: 10px 0; line-height: 150%; }
      a{ color: #7b94b2; }
      ul,ol{ margin: 10px 0 10px 40px; }
      li{ margin: 4px 0; }
      dl{ margin: 10px 0; }
      dl dt{ font-weight: bold; line-height: 20px; margin: 10px 0 0 0; }
      dl dd{ margin: -20px 0 10px 120px; padding-bottom: 10px; border-bottom: solid 1px #eee;}
      pre{ font-size: 12px; line-height: 16px; padding: 5px 5px 5px 10px; margin: 10px 0; border-left: solid 5px #9EC45F; overflow: auto; }

      .wrapper{ background-color: #ffffff; width: 600px; border: solid 1px #eeeeee; padding: 20px 20px 20px 40px; margin: 0 auto; border-radius: 6px; -moz-border-radius: 6px;-webkit-border-radius: 6px; }
      .header{ text-align: center;position: relative; margin: 0 -20px 0 -40px; }
      .header ul{ margin: 10px 0; display: block; }
      .header ul li{ display: inline-block; list-style: none; margin: 10px 0; width: 100px; }
      .header ul li a{ text-transform: uppercase; color: #777; text-decoration: none; font-size: 12px; }
      .header ul li a:hover{ color: #555; }
      .header .tour{ color: #fff; background-color: #9ec45f; padding: 4px 10px; margin: 10px 0; font-size: 18px; line-height: 18px; text-decoration: none;border-radius: 4px; -moz-border-radius: 4px;-webkit-border-radius: 4px;}
      .header .tour:hover{ background-color: #8eb44f; }
      .header ul.scrollnav{ position: fixed; top: 0px; left: 50%; background-color: #777; display: none; margin: 0 0 0 -185px; border-radius: 0 0 0 6px; -moz-border-radius: 0 0 0 6px;-webkit-border-radius: 0 0 0 6px;}
      .header ul.scrollnav li a{ color: #fff; }
      .header ul.scrollnav.scrolled{ display: inline; }
      .clear{ clear: both; }

      .waiting{ padding: 0; display: inline-block; }
      .waiting-element{ margin: 0 2px 2px 0; background-color: #ccc;
        width: 10px; height: 20px; display: inline-block;}
      .waiting-play-0{ margin-bottom: 0; background-color: #999; }
      .waiting-play-1{ margin-bottom: 1px; background-color: #aaa; }
      .waiting-play-2{ margin-bottom: 2px; background-color: #bbb; }

      .waiting-blocks{ padding: 0; display: inline-block; }
      .waiting-blocks-element{ background-color: #caddfb; border: solid 1px #c9ccdb;
        margin: 0 2px 0 0; width: 10px; height: 10px; display: inline-block;
        -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;}
      .waiting-blocks-play-0{ background-color: #b0c5ee; }
      .waiting-blocks-play-1{ background-color: #caddfb; }

      .waiting-nonfluid{ padding: 0; display: inline-block; }
      .waiting-nonfluid-element{ margin: 0 2px 0 0; background-color: #ccc;
        width: 10px; height: 20px; display: inline-block;}
      .waiting-nonfluid-play-0,
      .waiting-nonfluid-play-1,
      .waiting-nonfluid-play-2,
      .waiting-nonfluid-play-3,
      .waiting-nonfluid-play-4,
      .waiting-nonfluid-play-5{ background-color: #999; }

      .waiting-circles{ padding: 0; display: inline-block; position: relative; width: 60px; height: 60px;}
      .waiting-circles-element{ margin: 0 2px 0 0; background-color: #e4e4e4; border: solid 1px #f4f4f4;
        width: 10px; height: 10px; display: inline-block;
        -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;}
      .waiting-circles-play-0{ background-color: #9EC45F; }
      .waiting-circles-play-1{ background-color: #aEd46F; }
      .waiting-circles-play-2{ background-color: #bEe47F; }*/
      .waiting{ padding: 0; display: inline-block; }
      .waiting-element{ margin: 0 2px 2px 0; background-color: #ccc;
        width: 10px; height: 20px; display: inline-block;}
      .waiting-play-0{ margin-bottom: 0; background-color: #999; }
      .waiting-play-1{ margin-bottom: 1px; background-color: #aaa; }
      .waiting-play-2{ margin-bottom: 2px; background-color: #bbb; }

    </style>
<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
            <?php $this->load->view('udra/includes/sidebar_view.php'); ?>
    </div>
     <div id="ap-content" class="span10">
        <div class="row-fluid well top-conv">
        <?php

            $attr = array('class' => 'form-val','id' => 'udra_registro', 'style' => 'overflow: auto;');
            echo form_open($this->uri->uri_string(), $attr);  ?>
             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="comboactivo">Activo</label>

                  <div class="controls">
                  <?php echo  form_dropdown('departamento', $Arrayactivo, $selected_activo, 'class="' . $span_class . '" id="comboactivo" autocomplete="off"');?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php echo   form_error('comboactivo') ?> </div>
                  </div>
                </div>
             </div>

             <div class="span1">
              <?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar_udra()"'); ?>
              <?php echo form_close();  ?>
            </div>
            <div>
                <div id="waiting1"></div>
            </div>
        </div>
      </div>
    <!-- </div> -->
    <p><tt id="results"></tt></p>
    <div id="grid_content" class="span12">
      <div class="span6">
        <table id="list2"></table>
        <div id="pager2"></div>
      </div>
    </div>
    <div class="span2">
      <?php echo form_button('expo','Kardex por activo','class="btn btn-inverse" id="expo" style="margin-top:20px" onClick="exportExcel()"'); ?>
    </div>
    <div class="span2">
      <?php echo form_button('expo','Saldo general','class="btn btn-inverse" id="expo-all-activos" style="margin-top:20px" onClick="exportExcel_All_Activos()"'); ?>
    </div>

</div>

