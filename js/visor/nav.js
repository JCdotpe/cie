$(document).ready(function() {
	
	nav_Active();
	comboPredios();
	

	function nav_Active(){

	    pos_array=6;
	    var delimiter="/";
	    var loc = document.location.href;
	    var url = loc.split(delimiter);
	    $('#'+url[pos_array]).addClass('active');

	    if(url[pos_array]=="caratula1" || url[pos_array]=="capitulo1" || url[pos_array]=="capitulo2" || url[pos_array]=="capitulo3"){

	    	$('#tab1').addClass('active');	

	    }
	    
	    if(url[pos_array]=="caratula2" || url[pos_array]=="capitulo4" || url[pos_array]=="capitulo5"){

	    	$('#tab2').addClass('active');	

	    }

	    if(url[pos_array]=="caratula3" || url[pos_array]=="capitulo6" || url[pos_array]=="capitulo7" || url[pos_array]=="capitulo8"){

	    	$('#tab3').addClass('active');	

	    }
	                
	}

	function combo_Active(){
		pos_array=1;
	    var delimiter="pr=";
	    var loc = document.location.href;
	    var url = loc.split(delimiter);
	    if(url[pos_array]==undefined || url[pos_array]==null || url[pos_array]==''){
	    }else{
	    	$('#p'+url[pos_array]).addClass('active');	
	    }
	    
	
	}

	function comboPredios(){

		$.getJSON(urlRoot('index.php')+'/visor/Procedure/Lista_Predio/', {token: getToken(),id_local: getLocal()}, function(data, textStatus) {

			var combo='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'+
							'Seleccione un Predio para cargar las Cedulas'+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

			$.each(data, function(index, val) {

				if(val.Nro_Pred==1){
					tipo="Predio Principal";
				}else{
					tipo=tipoPredio(val.Colindante);
				}

				if(val.Inmueble_Cod==null || val.Inmueble_Cod==undefined || val.Inmueble_Cod==''){
					inmueble=inmueble_Predio(val.Inmueble_Tip);
				}else{
					inmueble=val.Inmueble_Cod;
				}

				combo+='<li class="combo_predio" id="p'+val.Nro_Pred+'">'+
							'<a href="'+urlCombo()+'?le='+getLocal()+'&pr='+val.Nro_Pred+'">Predio Nro:'+val.Nro_Pred+' ('+tipo+') - Propietario: '+prop_Predio(val.Pred_Prop,val.Pred_Prop_O)+' - Inmueble: '+inmueble+'</a>'+
						'</li>';

			});

			combo+='</ul>'+
					'</div>';

			$('#predios_Combo').html(combo)

			combo_Active();
			/*$('.combo_predio').click(function(){
				$('title').html($(this).html());	
			})*/
			

		});
	

	}

});