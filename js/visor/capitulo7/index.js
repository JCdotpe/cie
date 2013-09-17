$(document).ready(function(){

	var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
	var cod_local=getLocal();
	Get_List_Edif_Cap06();
	var nro_edif="1";
	Get_cap7(nro_edif);
	//Edificaciones
	$('#edificaciones').on('click','.raw',function(event){

		nro_edif=$(this).attr('id');
		/*Get_Edif_Cap06(token,cod_local,predio,nro_edif);
		Get_Edif_Pisos_Cap06(nro_edif);*/
		$('.raw').removeClass('raw_active');
		$(this).addClass('raw_active');
		Get_cap7(nro_edif);
	});


	$('input').attr({
		disabled : true,
	});

});
//devuelve el listado de eficiaciones
function Get_List_Edif_Cap06(){

	var html="";
	var i=0;
	var cl="";

	$.getJSON(CI.base_url+'index.php/visor/P61/Data/',{token: getToken(),id_local: getLocal()}, function(data) {

				$.each(data, function(index, val) {
					i++;
		  	    	html+='<tr id="'+val.Nro_Ed+'" class="raw '+cl+'">'+
		  	    					'<td style="text-align:center;width:150px;"> Edificación Nro. '+val.Nro_Ed+'.</td>'+
		  	    					'<td style="text-align:center">'+val.P6_1_3+'.</td>'+
		  	    					'<td style="text-align:center">'+val.P6_1_4+'.</td>'+
		  	    				'</tr>';
				});
				if(i==0){
					html+='<tr id="">'+
						'<td colspan="2" style="text-align:center;">No Existen Edificaciones en el Predio '+getPredio()+' </td>'+
						'</tr>';
				}
				$('#edificaciones').html(html);

	});
}

function Get_cap7(nro_edif){

	$.getJSON(CI.base_url+'index.php/visor/P7/Data/',{token: getToken(),id_local: getLocal(), Nro_Pred:getPredio(), NRO_ED:nro_edif}, function(data) {
		$.each(data, function(index, val) {
			$('#P7_2_2').val(val.P7_2_2);
			$('#Nro_Ed').val(val.Nro_Ed);
			check_Radio(val.P7_1_2,'P7_1_2');
			check_Radio(val.P7_1_3,'P7_1_3');
			check_Radio(val.P7_1_4,'P7_1_4');
			check_Radio(val.P7_1_5,'P7_1_5');
			check_Radio(val.P7_1_6,'P7_1_6');
			check_Radio(val.P7_1_7,'P7_1_7');
			check_Radio(val.P7_1_8,'P7_1_8');
			check_Radio(val.P7_1_9,'P7_1_9');
			check_Radio(val.P7_1_9A,'P7_1_9A');
			check_Radio(val.P7_1_9B,'P7_1_9B');
			check_Radio(val.P7_1_9C,'P7_1_9C');
			check_Radio(val.P7_1_9D,'P7_1_9D');
			check_Radio(val.P7_1_10,'P7_1_10');
			check_Radio(val.P7_1_11,'P7_1_11');
			check_Radio(val.P7_1_12,'P7_1_12');
			check_Radio(val.P7_1_13,'P7_1_13');
			check_Radio(val.P7_1_14,'P7_1_14');
			check_Radio(val.P7_1_15,'P7_1_15');
			check_Radio(val.P7_1_15A,'P7_1_15A');
			check_Radio(val.P7_1_15B,'P7_1_15B');
			check_Radio(val.P7_1_15C,'P7_1_15C');
			check_Radio(val.P7_1_15D,'P7_1_15D');
			check_Radio(val.P7_1_16,'P7_1_16');
			check_Radio(val.P7_1_17,'P7_1_17');
			check_Radio(val.P7_1_18,'P7_1_18');
			check_Radio(val.P7_1_19,'P7_1_19');
			check_Radio(val.P7_1_20,'P7_1_20');
			check_Radio(val.P7_1_21,'P7_1_21');
			check_Radio(val.P7_1_22,'P7_1_22');
			check_Radio(val.P7_1_23,'P7_1_23');
			check_Radio(val.P7_1_24,'P7_1_24');
			check_Radio(val.P7_1_25,'P7_1_25');
			check_Radio(val.P7_1_26,'P7_1_26');
			check_Radio(val.P7_1_27,'P7_1_27');
			check_Radio(val.P7_1_28,'P7_1_28');
			check_Radio(val.P7_2_1,'P7_2_1');
		});
	});
}