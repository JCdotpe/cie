$(document).ready(function(){

	$.import('css/basic.css','css');


	/*----------------Carga default-------------------*/

	var token=getToken();
	var predio= getPredio();
	var nro_edif=1;
	var nro_ambiente=1;
	var piso=1;
	var cod_local=getLocal();

	Get_Tot_Edif_Cap05();
	Get_List_Edif_Cap06();
	Get_Edif_Cap06(token,cod_local,predio,nro_edif);
	Get_Edif_Pisos_Cap06(nro_edif);
	Get_Edif_Pisos_Ambiente(nro_edif,nro_ambiente,piso);
	var array_ambiente=null;


	/*--------------------Edificaciones---------------*/

	$('#panel_edificaciones').on('click','.combo_ins',function(event){



		nro_edif=$(this).attr('id');
		Get_Edif_Cap06(token,cod_local,predio,nro_edif);
		Get_Edif_Pisos_Cap06(nro_edif);

		$('.combo_ins').removeClass('active');
		$(this).addClass('active');

	/*	alert('edificacion '+ nro_edif);
		alert('ambiente'+nro_ambiente);
		alert('piso'+piso);*/

		Get_Edif_Pisos_Ambiente(nro_edif,1,1);

	});


	/*-----------------------Ambientes----------------*/

	$('#panel_ambientes').on('click','.combo_ins',function(event){

		nro_ambiente=$(this).attr('id');
		array_ambiente = nro_ambiente.split("p");
		nro_ambiente= array_ambiente[0];
		piso= array_ambiente[1];
		Get_Edif_Pisos_Ambiente(nro_edif,nro_ambiente,piso);

		$('.combo_ins').removeClass('active');
		$(this).addClass('active');
	});





	/*-----------------deshabilita inputs-------------*/

	$('input').attr({
		disabled : true,
	});

	$('input,textarea').attr({
		disabled : true,
	});




});




/*-- devuelve total de edificaciones del capitulo 5 ---*/

function Get_Tot_Edif_Cap05(){

	$.getJSON(CI.base_url+'index.php/visor/P5/DataPredio/',{token: getToken(),id_local: getLocal(),predio:getPredio()}, function(data) {
				var html="";
				var i=1;
				$.each(data, function(index, val) {

					 $('.P5_TOT_E').val(leftceros(val.P5_Tot_E));
				});
	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});
}




/*--devuelve listado de edificiaciones--*/

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
								'<a href="" data-toggle="dropdown"> Edificación Nro:'+ leftceros(val.Nro_Ed)+'</a>'+
							'</li>';
				});

				html+='</ul>'+
					'</div>';

				if(i==1){
					 $("#panel_edificaciones").hide();
				}

				$("#panel_edificaciones").html(html);

				if(i==0){
					$('#panel_edificaciones').html('No Existen Instituciones Edificaciones en el Predio '+getPredio());
				}

	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});
}




function Get_Edif_Pisos_Cap06(nro_edif){

	var html="";
	var i=0;
	var cl="";

	$.getJSON(CI.base_url+'index.php/visor/P62/Data/', {token: getToken(),id_local: getLocal(), predio:getPredio(),P5_Ed_Nro:nro_edif}, function(data) {



				html='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione un ambiente '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

				$.each(data, function(index, val){

					i++;
					if(i==1){

						cl="active";
					}else{
						cl="";
					}

					html+='<li class="combo_ins '+cl+'" id="'+val.P6_2_1+'p'+val.P5_NroPiso+'">'+
									'<a href="" data-toggle="dropdown"> Ambiente N°:'+ leftceros(val.P6_2_1) +' - Piso N°: '+ leftceros(val.P5_NroPiso) +'</a>'+
		  	    			'</li>';

				});
				$("#panel_ambientes").show();

				if(i==1){

					 $("#panel_ambientes").hide();
				}
				$('#panel_ambientes').html(html);

				if(i==0){

					$('#panel_ambientes').html('No Existen Ambientes en la edificación ' + nro_edif);
					$('#pag_seccion_b1').hide();
					$('#pag_seccion_b2').hide();
					$('#aulacomun').hide();

				}else{

					$('#pag_seccion_b1').show();
					$('#pag_seccion_b2').show();
					$('#aulacomun').show();

				}


	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});
}


/*-- devuelve los ambientes y pisos --*/

function Get_Edif_Pisos_Ambiente(nro_edif,nro_ambiente,piso){

	var html="";
	var i=1;
	var radiop15="";
	var radiop15a="";
	var arraychecked16="";


		$.getJSON(CI.base_url+'index.php/visor/P62/DataAmbiente/',{token: getToken(),id_local: getLocal(), predio:getPredio(),P5_Ed_Nro:nro_edif, P6_2_1:nro_ambiente,P5_NroPiso: piso}, function(data) {

				$.each(data, function(index, val){
					$("#P6_2_1").val(leftceros(val.P6_2_1));
					$("#P5_NroPiso").val(leftceros(val.P5_NroPiso));
					check_Radio(val.P6_2_3,'P6_2_3');

					$.each(val.P6_2_4ID, function(index, val){
						check_Radio(val.P6_2_4Turno_M,val.P6_2_4Mod+'P6_2_4Turno_M');
						check_Radio(val.P6_2_4Turno_T,val.P6_2_4Mod+'P6_2_4Turno_T');
						check_Radio(val.P6_2_4Turno_N,val.P6_2_4Mod+'P6_2_4Turno_N');
						i++;
					});
					check_Radio(val.P6_2_5,'P6_2_5');
					switch(val.P6_2_5){
						case 1 :
  									$("#aulacomun").show();
  									$("#espaciopedagogico").hide();
  									$("#administrativo").hide();
  									$("#complementario").hide();
  									$("#servicios").hide();
  									$("#sshh").hide();
  									$("#evasshhh").hide();
							break;
						case 2 :

  									$("#espaciopedagogico").show();
  									$("#aulacomun").hide();
  									$("#administrativo").hide();
  									$("#complementario").hide();
  									$("#servicios").hide();
  									$("#sshh").hide();
  									$("#evasshhh").hide();
  									check_Radio(val.P6_2_6,'P6_2_6');

  									switch(val.P6_2_6){
  										case 4:

  											$("#P6caso5").hide();
  											$("#P6caso6").hide();
  											$("#P6caso7").hide();
  										  	$("#aulacomun").show();


  											break;
  										case 5:
  											$("#P6caso4").hide();
  											$("#P6caso6").hide();
  											$("#P6caso7").hide();
  											$("#aulacomun").show();


  											break;
  										case 6:
  											$("#P6caso4").hide();
  											$("#P6caso5").hide();
  											$("#P6caso7").hide();
  											$("#aulacomun").show();


  											break;
  										case 7:
  											$("#P6caso4").hide();
  											$("#P6caso5").hide();
  											$("#P6caso6").hide();
  											$("#aulacomun").show();

  											break;
  										default :
  											$("#P6caso4").hide();
  											$("#P6caso5").hide();
  											$("#P6caso6").hide();
  											$("#P6caso7").hide();
  											$("#aulacomun").show();

  									}
							break;
						case 3 :

							$("#espaciopedagogico").hide();
							$("#P6caso4").hide();
  							$("#P6caso5").hide();
  							$("#P6caso6").hide();
  							$("#P6caso7").hide();
  							$("#complementario").hide();
  							$("#sshh").hide();
  							$("#evasshhh").hide();
  							$("#servicios").hide();
							$("#administrativo").show();
							$("#aulacomun").show();
							break;
						case 4 :

							$("#espaciopedagogico").hide();
							$("#P6caso4").hide();
  							$("#P6caso5").hide();
  							$("#P6caso6").hide();
  							$("#P6caso7").hide();
  							$("#sshh").hide();
  							$("#evasshhh").hide();
  							$("#servicios").hide();
							$("#administrativo").hide();
							$("#complementario").show();
							if (val.P6_2_12==8){
								$("#sshh").show();
  								$("#evasshhh").show();
  								$("#aulacomun").show();
							}else{
								$("#aulacomun").show();
							}

							break;
						case 5 :

  									$("#espaciopedagogico").hide();
  									$("#administrativo").hide();
  									$("#complementario").hide();
  									$("#sshh").hide();
  									$("#evasshhh").hide();
  									$("#servicios").show();
  									$("#aulacomun").show();
  									if (val.P6_2_13==1 || val.P6_2_13==2) {
  										$("#sshh").show();
  										$("#evasshhh").show();
  									};
							break;
					}
					// if general pregunta 15
					if (val.P6_2_16f==6) {
  										$("#caso5p17").hide();
  										$("#caso5p18").show();
  					};

  					if (val.P6_2_18f==6) {
  										$("#caso5p19").hide();
  					};

					//PREGUNTA 7
									check_Radio(val.P6_2_7,'P6_2_7');
									$("#P6_2_7_O").val(val.P6_2_7_O);
					// PREGUNTA 8
									check_Radio(val.P6_2_8,'P6_2_8');
									$("#P6_2_8_O").val(val.P6_2_8_O);
					//PREGUNTA 9
									check_Radio(val.P6_2_9,'P6_2_9');
									$("#P6_2_9_O").val(val.P6_2_9_O);
					// PREGUNTA 10
									check_Radio(val.P6_2_10,'P6_2_10');
									$("#P6_2_10_O").val(val.P6_2_10_O);
					// PREGUNTA 11
									check_Radio(val.P6_2_11,'P6_2_11');
									$("#P6_2_11_O").val(val.P6_2_11_O);
					// PREGUNTA 12
									check_Radio(val.P6_2_12,'P6_2_12');
									$("#P6_2_12_O").val(val.P6_2_12_O);
					// PREGUNTA 13
									check_Radio(val.P6_2_13,'P6_2_13');
									$("#P6_2_13_O").val(val.P6_2_13_O);
					// PREGUNTA 14
									$("#P6_2_14_1").val(val.P6_2_14_1);
									$("#P6_2_14_2").val(val.P6_2_14_2);
									$("#P6_2_14_3").val(val.P6_2_14_3);
									$("#P6_2_14_4").val(val.P6_2_14_4);
									$("#P6_2_14_5").val(val.P6_2_14_5);
									$("#P6_2_14_6").val(val.P6_2_14_6);
					// PREGUNTA 14A
									$("#P6_2_14a").val(val.P6_2_14a);
					// PREGUNTA 14B
									$("#P6_2_14b_1").val(val.P6_2_14b_1);
									$("#P6_2_14b_2").val(val.P6_2_14b_2);

					//PREGUNTA 15

									check_Radio(val.P6_2_15a,val.P6_2_15+'P6_2_15a');

  									$("#P6_2_15_O").val(val.P6_2_15_O);


  									$("#P6_2_16a_b").val(val.P6_2_16a_b);
  									$("#P6_2_16a_r").val(val.P6_2_16a_r);
  									$("#P6_2_16a_m").val(val.P6_2_16a_m);
  									$("#P6_2_16b_b").val(val.P6_2_16b_b);
  									$("#P6_2_16b_r").val(val.P6_2_16b_r);
  									$("#P6_2_16b_m").val(val.P6_2_16b_m);
  									$("#P6_2_16c_b").val(val.P6_2_16c_b);
  									$("#P6_2_16c_r").val(val.P6_2_16c_r);
  									$("#P6_2_16c_m").val(val.P6_2_16c_m);
  									$("#P6_2_16d_b").val(val.P6_2_16d_b);
  									$("#P6_2_16d_r").val(val.P6_2_16d_r);
  									$("#P6_2_16d_m").val(val.P6_2_16d_m);
  									$("#P6_2_16e_O").val(val.P6_2_16e_O);
  									$("#P6_2_16e_b").val(val.P6_2_16e_b);
  									$("#P6_2_16e_r").val(val.P6_2_16e_r);
  									$("#P6_2_16e_m").val(val.P6_2_16e_m);

  									/*--------------otro----------------*/
  									$("#P6_2_16f").val(val.P6_2_16f);

  									/*$("#P6_2_16f_b").val(val.P6_2_16f_b);
  									$("#P6_2_16f_r").val(val.P6_2_16f_r);
  									$("#P6_2_16f_m").val(val.P6_2_16f_m);*/



  									check_Radio(val.P6_2_16f,'P6_2_16f');


  									$("#P6_2_17a").val(val.P6_2_17a);
  									$("#P6_2_17b").val(val.P6_2_17b);
  									$("#P6_2_17c").val(val.P6_2_17c);
  									$("#P6_2_17d").val(val.P6_2_17d);

  									$("#P6_2_18a_b").val(val.P6_2_18a_b);
  									$("#P6_2_18a_r").val(val.P6_2_18a_r);
  									$("#P6_2_18a_m").val(val.P6_2_18a_m);
  									$("#P6_2_18b_b").val(val.P6_2_18b_b);
  									$("#P6_2_18b_r").val(val.P6_2_18b_r);
  									$("#P6_2_18b_m").val(val.P6_2_18b_m);
  									$("#P6_2_18c_b").val(val.P6_2_18c_b);
  									$("#P6_2_18c_r").val(val.P6_2_18c_r);
  									$("#P6_2_18c_m").val(val.P6_2_18c_m);
  									$("#P6_2_18d_b").val(val.P6_2_18d_b);
  									$("#P6_2_18d_r").val(val.P6_2_18d_r);
  									$("#P6_2_18d_m").val(val.P6_2_18d_m);
  									$("#P6_2_18e_O").val(val.P6_2_18e_O);
  									$("#P6_2_18e_b").val(val.P6_2_18e_b);
  									$("#P6_2_18e_r").val(val.P6_2_18e_r);
  									$("#P6_2_18e_m").val(val.P6_2_18e_m);
  									/*----------------------------------*/

  									/*$("#P6_2_18f_b").val(val.P6_2_18f_b);
  									$("#P6_2_18f_r").val(val.P6_2_18f_r);
  									$("#P6_2_18f_m").val(val.P6_2_18f_m);*/
  									check_Radio(val.P6_2_18f,'P6_2_18f');

  									$("#P6_2_19a").val(val.P6_2_19a);
  									$("#P6_2_19b").val(val.P6_2_19b);
  									$("#P6_2_19c").val(val.P6_2_19c);

  									$("#P6_2_20Obs").val(val.P6_2_20Obs);
				});
	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});
}


/*function check_Radio(value,id){

    if(value!=null && value!=0){

       document.getElementById(id+value).checked=true;
    }
}*/

function check_Radio2(value){

    if(value!=null){

       document.getElementById(value).checked=true;

    }
}

function check_Radio3(arrayvalue){
	if(arrayvalue!=null){
	    for (var i in arrayvalue) {

	    	 if ($('#'+arrayvalue[i]).length>0) {

	    		document.getElementById(arrayvalue[i]).checked=true;
	    	}
	    }
    }
}

function check_Radio4(arrayvalue){
	if(arrayvalue!=null){
	    for (var i in arrayvalue) {
	    	 if ($('#'+arrayvalue[i]).length>0) {

	    		document.getElementById(arrayvalue[i]).checked=true;
	    	}
	    }
    }
}



// devuelve la edificacion filtrado por numero de edificacion

function Get_Edif_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=0;

	var numero_pisos = {
			  0: '8A',
			  1: '8B',
			  2: '8C',
			  3: '8D',
			  4: '8E',
			  5: '8F',
			  6: '8G',
			  7: '8H',
			  8: '8I',
			  9: '8J'
			};
	var nombre_pisos = {
			  0: ' El primer ',
			  1: ' El segundo ',
			  2: ' El tercer ',
			  3: ' El cuarto ',
			  4: ' El quinto ',
			  5: ' El sexto ',
			  6: ' El séptimo ',
			  7: ' El octavo ',
			  8: ' El noveno ',
			  9:' El décimo '
			};

	var x=0;
	var arraychecked;
	var arraycheckpisos=[];
	var arr="";


		$.getJSON(CI.base_url+'index.php/visor/P61/DataNroEdif/',{token: getToken(),id_local: getLocal(), predio:getPredio(), NRO_ED:nro_edif}, function(data) {


				$.each(data, function(index, val) {
					arraychecked= {
									  0: 'P6_1_5'+val.P6_1_5,
									  1: 'P6_1_6'+val.P6_1_6,
									  2: 'P6_1_7'+val.P6_1_7
									};
					i++;
					arr = val.P6_1_3.split(".");

					check_Radio(val.P6_3_1,'P6_3_1');
					check_Radio(val.P6_3_1A,'P6_3_1A');
					check_Radio(val.P6_3_2,'P6_3_2');
					check_Radio(val.P6_3_2A,'P6_3_2A');
					check_Radio(val.P6_3_2B,'P6_3_2B');
					check_Radio(val.P6_3_2C,'P6_3_2C');
					check_Radio(val.P6_3_2D,'P6_3_2D');
					check_Radio(val.P6_3_3,'P6_3_3');
					$('#P6_3_3A').val(val.P6_3_3A);
					check_Radio(val.P6_4_1,'P6_4_1');
					check_Radio(val.P6_4_1A,'P6_4_1A');
					check_Radio(val.P6_4_2,'P6_4_2');
					check_Radio(val.P6_5_1,'P6_5_1');
					check_Radio(val.P6_5_1A,'P6_5_1A');
					$('#P6_Obs').val(val.P6_Obs);
					if (val.P6_3_1==2) {
						$('#distribucion').hide();
					};
					if (val.P6_3_2==2) {
						$('#distribucionp2a').hide();
						$('#distribucionp2b').hide();
						$('#distribucionp2c').hide();
						$('#distribucionp2d').hide();
						$('#distribucionp3').hide();
						$('#distribucionp3a').hide();
					}else{

						if (val.P6_3_3==2) {
							$('#distribucionp3a').hide();
						};
					};
					if (val.P6_4_1==2) {
						$('#secciondp1a').hide();
					};
					if (val.P6_5_1==2) {
						$('#seccionep1a').hide();
					};

		  	    	html+='<table class="table table-bordered">'+
		  	    			'<tbody>'+
			  	    			'<tr>'+
				  	    			'<td><strong>2.</strong></td>'+
				  	    			'<td><strong>Código de la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control Nro_Ed"  value="E - '+leftceros(val.Nro_Ed)+'" disabled>'+
				  	    			'</td>'+
			  	    			'</tr>'+
			  	    			'<tr>'+
			  	    				'<td><strong>3.</strong></td>'+
			  	    				'<td><strong>Area techada del primer piso de la edificación </strong></td>'+
				  	    			'<td>'+
				  	    					'<label>Área en m2</label>'+
											'<table class="table table-bordered">'+
												'<tr>'+
												'</tr>'+
												'<tr>'+
													'<th style="text-align:center;">Enteros</th>'+
													'<th style="text-align:center;">Decimales</th>'+
												'</tr>'+
												'<tr>'+
													'<td> <input style="width:100px;" type="text" class="form-control P6_1_3" value="'+arr[0]+'" disabled> </td>'+
													'<td> <input style="width:100px;" type="text" class="form-control P6_1_3_D" value="'+arr[1]+'" disabled> </td>'+
												'</tr>'+
											'</table>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>4.</strong></td>'+
			  	    				'<td><strong>Predio en el que se ubica la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<label>Predio N° </label>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_4" value="'+leftceros(val.P6_1_4)+'" disabled>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>5.</strong></td>'+
			  	    				'<td><strong>Esta edificación es parte del patrimonio cultural inmueble reconocido por el ministerio de cultura? </strong></td>'+
				  	    			'<td>'+
				  	    					'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_51" name="P6_1_5" value="option1" disabled> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_52" name="P6_1_5" value="option2" disabled> 2. No'+
											'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>6.</strong></td>'+
			  	    				'<td><strong>¿La edificación  fue inspeccionada por defensa civil? </strong></td>'+
				  	    			'<td>'+
				  	    					'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_61" name="P6_1_6" value="option1" disabled> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_62" name="P6_1_6" value="option2" disabled> 2. No'+
											'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>7.</strong></td>'+
			  	    				'<td><strong>¿La edificación  se encuentra declarada inhabitable (alto riesgo) ? </strong></td>'+
				  	    			'<td>'+
				  	    				'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_71" name="P6_1_7" value="option1" disabled> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_72" name="P6_1_7" value="option2" disabled> 2. No'+
										'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>8.</strong></td>'+
			  	    				'<td><strong>Nro de pisos de esta edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8" value="'+leftceros(val.P6_1_8)+'" disabled>'+
				  	    			'</td>'+
				  	    		'</tr>';

				  	    		$.each(val.P6_1_8_N, function(index, val) {

											arraycheckpisos[x]='P6_1_8_Accesibilidad'+numero_pisos[x]+val.P6_1_8_Accesibilidad;
													html+='<tr>'+
				  	    									'<td><strong>'+numero_pisos[x]+'.</strong></td>'+
									  	    				'<td><strong>'+nombre_pisos[x]+'Nro de pisos de esta edificación </strong></td>'+

										  	    			'<td>'+
										  	    					'<label class="checkbox-inline">'+
																		'<input type="radio" id="P6_1_8_Accesibilidad'+numero_pisos[x]+'1" name="check'+numero_pisos[x]+'" value="option1" disabled> 1. Si'+
																	'</label>'+
																	'<label class="checkbox-inline">'+
																		'<input type="radio" id="P6_1_8_Accesibilidad'+numero_pisos[x]+'2" name="check'+numero_pisos[x]+'" value="option2" disabled> 2. No'+
																	'</label>'+
															'</td>'+
										  	    		'</tr>';
										  	    		x++;

								});
								html+='<tr>'+
						  	    				'<td><strong>9.</strong></td>'+
						  	    				'<td><strong>¿ Cuántos  niveles o modalidades hacen uso de esta edificación? </strong></td>'+
							  	    			'<td>'+
							  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8" value="'+leftceros(val.P6_1_9)+'" disabled>'+
							  	    			'</td>'+
				  	    				  '</tr>';
				  	    		$.each(val.P6_1_10_e, function(index, val) {

				  	    			check_Radio(val.P6_1_10_e,'P6_1_10_e');
								});

					});


				$('#seccion_a').html(html);
				check_Radio3(arraychecked);
				check_Radio4(arraycheckpisos);


	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});


}

//==============================FINCAPITULO 6=================================