$(document).ready(function(){

	var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
	var cod_local=getLocal();

	 Get_count_Type_Edif();

	$('input').attr({
		disabled : true,
	});
	Get_Tot_Edif_Cap05();

	$('#losasdeportivas,#cisterna,#muros').change(function(event) {
		var tipo=null;
		var prefijo=null;
		var val=null;
		switch(event.target.id){
		 	case 'combopatios':
		 		tipo= $('#combopatios');
		 		prefijo='P';
		 		val= $('#combopatios').val();
		 		break;

		 	case 'losasdeportivas':
		 		tipo= $('#losasdeportivas');
		 		prefijo='LD';
		 		val= $('#losasdeportivas').val();

		 		break;

		 	case 'cisterna':
		 		tipo= $('#cisterna');
		 		prefijo='CTE';
		 		val= $('#cisterna').val();
		 		break;

		 	case 'muros':
		 		tipo= $('#muros');
		 		prefijo='MC';
		 		val= $('#muros').val();
		 		break;
		}

		 Get_Edif(tipo,prefijo,val);
	}).change();

	$('#combopatios').change(function(event) {
		var tipo=null;
		var prefijo=null;
		var val=null;
		tipo= $('#combopatios');
		prefijo='P';
		val= $('#combopatios').val();
		Get_Edif(tipo,prefijo,val);

	}).change();
	

});

function Get_count_Type_Edif(){

		$.getJSON(CI.base_url+'index.php/visor/P8/Data/',{token: getToken(),id_local: getLocal(),Nro_Pred:getPredio()}, function(data) {			
			$.each(data ,function(index, val){
				if (val.P8_2_Tipo=='P'){
					$('#combopatios').append('<option value="' + val.P8_2_Nro + '">' + val.P8_2_Tipo +'- '+val.P8_2_Nro+ '</option>');
				};

				if (val.P8_2_Tipo=='LD'){
					$('#losasdeportivas').append('<option value="' + val.P8_2_Nro + '">' + val.P8_2_Tipo +'- '+val.P8_2_Nro+ '</option>');
				};
				if (val.P8_2_Tipo=='CTE'){
					$('#cisterna').append('<option value="' + val.P8_2_Nro + '">' + val.P8_2_Tipo +'- '+val.P8_2_Nro+ '</option>');
				};
				if (val.P8_2_Tipo=='MC'){
					$('#muros').append('<option value="' + val.P8_2_Nro + '">' + val.P8_2_Tipo +'- '+val.P8_2_Nro+ '</option>');
				};

			});


		});
}

function Get_Edif(tipo,prefijo,numero){
		var arr=[];
		$.getJSON(CI.base_url+'index.php/visor/P8/DataTipoEdif/',{token: getToken(),id_local: getLocal(),Nro_Pred:getPredio(), P8_2_Tipo: prefijo, P8_2_Nro:numero}, function(data) {
			
			$.each(data ,function(index, val){
					
					$('#P8_2_Nro'+prefijo).val(val.P8_2_Nro);
					if (prefijo!='MC') {
						arr = val.P8_area.split(".");
						$('#P8_area'+prefijo).val(arr[0]);
						$('#P8_area_decimal'+prefijo).val();
					};
					
					
					$('#Nro_Pred'+prefijo).val(val.Nro_Pred);
					$('#P8_altura').val(val.P8_altura);
					$('#P8_longitud').val(val.P8_longitud);

					check_Radio(val.P8_ejecuto,'P8_ejecuto'+prefijo);
					check_Radio(val.P8_Est_E,'P8_Est_E'+prefijo);

					check_Radio(val.P8_Ant,'P8_Ant'+prefijo);
					check_Radio(val.P8_RecTec,'P8_RecTec'+prefijo);
			});


		});
}

function Get_Tot_Edif_Cap05(){

	$.getJSON(CI.base_url+'index.php/visor/P5/DataPredio/',{token: getToken(),id_local: getLocal(),Nro_Pred:getPredio()}, function(data) {
				var html="";
				var i=1;
				$.each(data, function(index, val) {

					 $('#P5_Tot_P').val(val.P5_Tot_P);
					 $('#P5_Tot_LD').val(val.P5_Tot_LD);
					 $('#P5_Tot_CTE').val(val.P5_Tot_CTE);
					 $('#P5_Tot_MC').val(val.P5_Tot_MC);


				});
	});
}

