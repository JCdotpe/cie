 		
		<ul class="nav nav-tabs" id="Tabs">
		  <li><a href="#grafico"><i class="icon-picture"></i> Gráfico</a></li>
		  <li><a href="#mapa"><i class="icon-globe"></i> Mapa Temático</a></li>
		  <li class="active"><a href="#tabulado"><i class="icon-signal"></i> Tabulado</a></li>
		</ul>

<script type="text/javascript">

	$(function () {// los tabs
		$('#Tabs a').click(function (e) { 
		  e.preventDefault();
		  $(this).tab('show').slow;
		  //$(this).fadeIn('slow');
		})	})

</script>

 		<!-- <div  class="row-fluid" style = "height:83px;">
 				<div style = "float:left;position:relative"><img style="margin-top: 2.5px;height: 123px;" src="<?php echo  base_url('img/inei.gif'); ?>"/></div>
 				<div style = "float:right;position:relative"><img style="margin-top: 2.5px;height: 123px;" src="<?php echo  base_url('img/cenpesco.png'); ?>"/></div>
 		</div> -->