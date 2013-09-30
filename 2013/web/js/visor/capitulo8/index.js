$(document).ready(function(){


	$.import('css/basic.css','css');

	/*-------------------default ----------------*/

	var token=getToken();
	var cod_local=getLocal();
	var val=null;
	var array=null;
	Get_count_Type_Edif();
	Get_Tot_Edif_Cap05();
	Get_Edif('P',1);
	Get_Edif('LD',1);
	Get_Edif('CTE',1);
	Get_Edif('MC',1);



	/*-------------combos patios------------------*/

	$('#combopatios').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".");
		Get_Edif('P',array[1]);
		$('.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});





	/*-------------Losas deportivas------------------*/

	$('#losasdeportivas').on('click','.combo_ins2',function(event){

		val= $(this).attr('id');
		array=val.split(".");
		Get_Edif('LD',array[1]);
		$('.combo_ins2').removeClass('active');
		$(this).addClass('active');
	});




	/*-------------Cisternas y tanques------------------*/

	$('#cisterna').on('click','.combo_ins3',function(event){

		val= $(this).attr('id');
		array=val.split(".");
		Get_Edif('CTE',array[1]);
		$('.combo_ins3').removeClass('active');
		$(this).addClass('active');
	});




	/*-------------Muros------------------*/

	$('#muros').on('click','.combo_ins4',function(event){

		val= $(this).attr('id');
		array=val.split(".");
		Get_Edif('MC',array[1]);
		$('.combo_ins4').removeClass('active');
		$(this).addClass('active');
	});




	/*-----deshabilita inputs------*/

	$('input').attr({
		disabled : true,
	});

	$('input,textarea').attr({
		disabled : true,
	});



});



function Get_count_Type_Edif(){

		var combopatios="";
		var losasdeportivas="";
		var cisterna="";
		var muros="";

		var icombo=0;
		var ilosa=0;
		var icisterna=0;
		var imuros=0;

		var i=0;
		var cl="";

		$.getJSON(CI.base_url+'index.php/visor/P8/Data/',{token: getToken(),id_local: getLocal(),predio:getPredio()}, function(data) {

			// patios
			combopatios='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione un patio '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';
			// losas
			losasdeportivas='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione una Losas deportivas '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';
			// cisternas
			cisterna='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione una Cisterna - tanque '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';
			// muros
			muros='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione un muro de contención '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

			$.each(data ,function(index, val){

					Tipo_E=trim(val.P8_2_Tipo);

				if (Tipo_E=='P'){

					icombo++;
					if(icombo==1){

						cl="active";
					}else{
						cl="";
					}

					combopatios+='<li class="combo_ins1 '+cl+'" id="'+Tipo_E+'.'+val.P8_2_Nro+'">'+
									'<a href="" data-toggle="dropdown"> '+ Tipo_E +'- '+leftceros(val.P8_2_Nro)+'</a>'+
								'</li>';

				};

				if (Tipo_E=='LD'){

					ilosa++;
					if(ilosa==1){
						cl="active";
					}else{
						cl="";
					}

					losasdeportivas+='<li class="combo_ins2 '+cl+'" id="'+Tipo_E+'.'+val.P8_2_Nro+'">'+
										'<a href="" data-toggle="dropdown"> '+ Tipo_E +'- '+leftceros(val.P8_2_Nro)+'</a>'+
								'</li>';

				};
				if (Tipo_E=='CTE'){

					icisterna++;
					if(icisterna==1){
						cl="active";
					}else{
						cl="";
					}

					cisterna+='<li class="combo_ins3 '+cl+'" id="'+Tipo_E+'.'+val.P8_2_Nro+'">'+
									'<a href="" data-toggle="dropdown"> '+ Tipo_E +'- '+leftceros(val.P8_2_Nro)+'</a>'+
								'</li>';

				};
				if (Tipo_E=='MC'){

					imuros++;
					if(imuros==1){
						cl="active";
					}else{
						cl="";
					}

					muros+='<li class="combo_ins4 '+cl+'" id="'+Tipo_E+'.'+val.P8_2_Nro+'">'+
									'<a href="" data-toggle="dropdown"> '+ Tipo_E +'- '+leftceros(val.P8_2_Nro)+'</a>'+
								'</li>';

				};

			});

			$('#combopatios').html(combopatios);
			$('#losasdeportivas').html(losasdeportivas);
			$('#cisterna').html(cisterna);
			$('#muros').html(muros);

		}).fail(function( jqxhr, textStatus, error ) {

			var err = textStatus + ', ' + error;
			console.log( "Request Failed: " + err);

		});
}




function Get_Edif(prefijo,numero){
		var arr=[];
		$.getJSON(CI.base_url+'index.php/visor/P8/DataTipoEdif/',{token: getToken(),id_local: getLocal(),predio:getPredio(), P8_2_Tipo: prefijo, P8_2_Nro:numero}, function(data) {

			$.each(data ,function(index, val){

					$('#P8_2_Nro'+prefijo).val(prefijo+' - '+leftceros(val.P8_2_Nro));
					if (prefijo!='MC') {
						arr = val.P8_area.split(".");
						$('#P8_area'+prefijo).val(arr[0]);
						$('#P8_area_decimal'+prefijo).val(arr[1]);
					};
					if (prefijo=='MC') {
						$('#P8_altura').val(val.P8_altura);
						$('#P8_longitud').val(val.P8_longitud);
					};


					$('#Nro_Pred'+prefijo).val(leftceros(val.Nro_Pred));
					check_Radio(val.P8_ejecuto,'P8_ejecuto'+prefijo);
					check_Radio(val.P8_Est_E,'P8_Est_E'+prefijo);
					check_Radio(val.P8_Ant,'P8_Ant'+prefijo);
					check_Radio(val.P8_RecTec,'P8_RecTec'+prefijo);
			});


		}).fail(function( jqxhr, textStatus, error ) {

			var err = textStatus + ', ' + error;
			console.log( "Request Failed: " + err);

		});
}

function Get_Tot_Edif_Cap05(){

	$.getJSON(CI.base_url+'index.php/visor/P5/DataPredio/',{token: getToken(),id_local: getLocal(),predio:getPredio()}, function(data) {
				var html="";
				var i=1;
				$.each(data, function(index, val) {

					 $('#P5_Tot_P').val(leftceros(val.P5_Tot_P));
					 $('#P5_Tot_LD').val(leftceros(val.P5_Tot_LD));
					 $('#P5_Tot_CTE').val(leftceros(val.P5_Tot_CTE));
					 $('#P5_Tot_MC').val(leftceros(val.P5_Tot_MC));


				});
	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});
}

