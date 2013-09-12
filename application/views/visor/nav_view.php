<script type="text/javascript">

	$.import('js/visor/nav.js','js');
	
</script>
<ul class="nav nav-tabs">
  				<li id="tab1" class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  						CIE01 <b class="caret"></b>
  					</a>
  					<ul class="dropdown-menu">
  						<li id="caratula1">
							<a href="<?php echo base_url('index.php/visor/caratula1/?le=').$_REQUEST['le']; ?>">Caratula</a>
						</li>
						<li id="capitulo1">
							<a href="<?php echo base_url('index.php/visor/capitulo1/?le=').$_REQUEST['le']; ?>">Capitulo I</a>
						</li>
						<li id="capitulo2">
							<a href="<?php echo base_url('index.php/visor/capitulo2/?le=').$_REQUEST['le']; ?>">Capitulo II</a>
						</li>
						<li id="capitulo3">
							<a href="<?php echo base_url('index.php/visor/capitulo3/?le=').$_REQUEST['le']; ?>">Capitulo III</a>
						</li>
					</ul>
  				</li>

  				<li id="tab2" class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  						CIE01A <b class="caret"></b>
  					</a>
  					<ul class="dropdown-menu">
  						<li id="caratula2">
							<a href="<?php echo base_url('index.php/visor/caratula2/?le=').$_REQUEST['le']; ?>">Datos Generales</a>
						</li>
						<li id="capitulo4">
							<a href="<?php echo base_url('index.php/visor/capitulo4/?le=').$_REQUEST['le']; ?>">Capítulo IV</a>
						</li>
						<li id="capitulo5">
							<a href="<?php echo base_url('index.php/visor/capitulo5/?le=').$_REQUEST['le']; ?>">Capítulo V</a>
						</li>
					</ul>
  				</li>

  				<li id="tab3" class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  						CIE01B <b class="caret"></b>
  					</a>
  					<ul class="dropdown-menu">
  						<li id="caratula3">
							<a href="<?php echo base_url('index.php/visor/caratula3/?le=').$_REQUEST['le']; ?>">Datos Generales</a>
						</li>
						<li id="capitulo6">
							<a href="<?php echo base_url('index.php/visor/capitulo6/?le=').$_REQUEST['le']; ?>">Capitulo VI</a>
						</li>
						<li id="capitulo7">
							<a href="<?php echo base_url('index.php/visor/capitulo7/?le=').$_REQUEST['le']; ?>">Capitulo VII</a>
						</li>
						<li id="capitulo8">
							<a href="<?php echo base_url('index.php/visor/capitulo8/?le=').$_REQUEST['le']; ?>">Capitulo VIII</a>
						</li>
					</ul>
  				</li>
</ul>