$(document).ready(function(){

	$.import('css/basic.css','css');



	/*----------------------default------------------*/


	var token=getToken();
	var cod_local=getLocal();
	Get_List_Edif_Cap06();
	var nro_edif="1";
	Get_cap7(nro_edif);





	/*-------------------Edificaciones----------------*/


	$('#panel_edificaciones2').on('click','.combo_ins',function(event){

		nro_edif=$(this).attr('id');
		Get_cap7(nro_edif);
		$('.combo_ins').removeClass('active');
		$(this).addClass('active');

		/*--------------- reset  ---------------------*/

		$('#cap7 input').val('');
 		$('#cap7 input').attr('checked', false);



	});



	/*------------------deshabilita inputs--------------*/

	$('input').attr({
		disabled : true,
	});


	$('input,textarea').attr({
		disabled : true,
	});




});




/*--devuelve el listado de eficiaciones--*/

function Get_List_Edif_Cap06(){

	var html="";
	var i=0;
	var cl="";

	$.getJSON(CI.base_url+'index.php/visor/P61/Data/',{token: getToken(),id_local: getLocal(), predio:getPredio()}, function(data) {

				html='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione una edificación '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

				$.each(data, function(index, val) {
					i++;
					if(i==1){

						cl="active";
					}else{
						cl="";
					}
		  	    	html+='<li class="combo_ins '+cl+'" id="'+val.Nro_Ed+'">'+
								'<a href="" data-toggle="dropdown"> Edificación Nro:'+ val.Nro_Ed+'</a>'+
							'</li>';
				});

				html+='</ul>'+
					'</div>';

				if(i==1){
					 $("#panel_edificaciones2").hide();
				}

				$("#panel_edificaciones2").html(html);

				if(i==0){
					$('#panel_edificaciones2').html('No Existen Instituciones Edificaciones en el Predio '+getPredio());
				}
	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});
}






function Get_cap7(nro_edif){

	$.getJSON(CI.base_url+'index.php/visor/P7/Data/',{token: getToken(),id_local: getLocal(), predio:getPredio(), NRO_ED:nro_edif}, function(data) {
		$.each(data, function(index, val) {
			$('#P7_2_2').val(val.P7_2_2);
			$('#P7_Obs').val(val.P7_Obs);
			$('#Nro_Ed').val(leftceros(val.Nro_Ed));
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
	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});

}