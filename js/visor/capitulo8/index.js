$(document).ready(function(){

	var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
	var cod_local=getLocal();

	 Get_count_Type_Edif()

	$('input').attr({
		disabled : true,
	});
	$('#combopatios,#losasdeportivas,#cisterna,#muros').change(function(event) {
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
	});

});

function Get_count_Type_Edif(){

		$.getJSON(CI.base_url+'index.php/visor/P8/Data/',{token: getToken(),id_local: getLocal(),Nro_Pred:getPredio()}, function(data) {
			console.log(data);
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

		$.getJSON(CI.base_url+'index.php/visor/P8/DataTipoEdif/',{token: getToken(),id_local: getLocal(),Nro_Pred:getPredio(), P8_2_Tipo: prefijo, P8_2_Nro:numero}, function(data) {
			console.log(data);
			$.each(data ,function(index, val){
				if (val.P8_2_Tipo==prefijo){
					$('#P8_2_NroP').val(val.P8_2_Nro);
					$('#P8_areaP').val(val.P8_2_Nro);
					$('#P8_area_decimalP').val(val.P8_2_Nro);
					$('#Nro_PredP').val(val.Nro_Pred);

					check_Radio(val.P8_ejecuto,'P8_ejecutoP');
					check_Radio(val.P8_Est_E,'P8_Est_EP');
					check_Radio(val.P8_Ant,'P8_AntP');
					check_Radio(val.P8_RecTec,'P8_RecTecP');


					//
					$('#P8_2_NroLD').val(val.P8_2_Nro);
					$('#P8_areaLD').val(val.P8_2_Nro);
					$('#P8_area_decimalLD').val(val.P8_2_Nro);
					$('#Nro_PredLD').val(val.Nro_Pred);

					check_Radio(val.P8_ejecuto,'P8_ejecutoLD');
					check_Radio(val.P8_Est_E,'P8_Est_ELD');
					check_Radio(val.P8_Ant,'P8_AntLD');
					check_Radio(val.P8_RecTec,'P8_RecTecLD');

					/*$('#P8_2_NroCTE').val(val.P8_2_Nro);
					$('#P8_areaCTE').val(val.P8_2_Nro);
					$('#P8_area_decimalCTE').val(val.P8_2_Nro);
					$('#Nro_PredCTE').val(val.Nro_Pred);

					check_Radio(val.P8_ejecuto,'P8_ejecutoCTE');
					check_Radio(val.P8_Est_E,'P8_Est_ECTE');
					check_Radio(val.P8_Ant,'P8_AntCTE');
					check_Radio(val.P8_RecTec,'P8_RecTecCTE');*/


				};

			});


		});
}


