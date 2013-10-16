function addfieldFrente(limite)
{
	$('#lindero_frente tr').remove('.entrev');
	//var ahua = $(this).val();
	var ahua = limite;
	if(ahua > 0 && ahua<=99){
		for(var i=1; i<=ahua;i++)
		{
			var asd = '<tr class="entrev">';
			asd +='<td>' + i + '</td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_' + i + '" id="P4_2_1A_NroTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_' + i + '" id="P4_2_1B_LongTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_' + i + '" id="P4_2_1C_Cerco' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_' + i + '" id="P4_2_1D_Estruc' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_' + i + '" id="P4_2_1E_EstCons' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_' + i + '" id="P4_2_1F_Opin' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_frente > tbody').append(asd);
	  }
	}else if(ahua==''){
		//
	}else{
		alert('99 Linderos Máximo');
	}


// var as = 1;
// $.each( <?php echo json_encode($car_n->result()); ?>, function(i, data) {
// 	   $('#PC_C_1_Et_Fecha' + '_' + as).val(data.PC_C_1_Et_Fecha);
// 	   $('#PC_C_1_Et_Hini' + '_' +  as).val(data.PC_C_1_Et_Hini);
// 	   $('#PC_C_1_Et_Hfin' + '_' +  as).val(data.PC_C_1_Et_Hfin);
// 	   $('#PC_C_1_Et_Fecha_Prox' + '_' +  as).val(data.PC_C_1_Et_Fecha_Prox);
// 	   $('#PC_C_1_Et_Hora_Prox' + '_' +  as).val(data.PC_C_1_Et_Hora_Prox);
// 	   $('#PC_C_1_Et_Res' + '_' +  as).val(data.PC_C_1_Et_Res);
// 	   $('#PC_C_1_Jb_Fecha' + '_' +  as).val(data.PC_C_1_Jb_Fecha);
// 	   $('#PC_C_1_Jb_Hini' + '_' +  as).val(data.PC_C_1_Jb_Hini);
// 	   $('#PC_C_1_Jb_Hfin' + '_' +  as).val(data.PC_C_1_Jb_Hfin);
// 	   as++;
// });
}

function addfieldDerecha(limite)
{
	$('#lindero_derecha tr').remove('.entrev');
	//var ahua = $(this).val();
	var ahua = limite;
	if(ahua > 0 && ahua<=99){
		for(var i=1; i<=ahua;i++)
		{
			var asd = '<tr class="entrev">';
			asd +='<td>' + i + '</td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_' + i + '" id="P4_2_1A_NroTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_' + i + '" id="P4_2_1B_LongTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_' + i + '" id="P4_2_1C_Cerco' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_' + i + '" id="P4_2_1D_Estruc' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_' + i + '" id="P4_2_1E_EstCons' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_' + i + '" id="P4_2_1F_Opin' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_derecha > tbody').append(asd);
	  }
	}else if(ahua==''){
		//
	}else{
		alert('99 Linderos Máximo');
	}
}

function addfieldFondo(limite)
{
	$('#lindero_fondo tr').remove('.entrev');
	//var ahua = $(this).val();
	var ahua = limite;
	if(ahua > 0 && ahua<=99){
		for(var i=1; i<=ahua;i++)
		{
			var asd = '<tr class="entrev">';
			asd +='<td>' + i + '</td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_' + i + '" id="P4_2_1A_NroTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_' + i + '" id="P4_2_1B_LongTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_' + i + '" id="P4_2_1C_Cerco' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_' + i + '" id="P4_2_1D_Estruc' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_' + i + '" id="P4_2_1E_EstCons' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_' + i + '" id="P4_2_1F_Opin' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_fondo > tbody').append(asd);
	  }
	}else if(ahua==''){
		//
	}else{
		alert('99 Linderos Máximo');
	}
}

function addfieldIzquierda(limite)
{
	$('#lindero_izquierda tr').remove('.entrev');
	//var ahua = $(this).val();
	var ahua = limite;
	if(ahua > 0 && ahua<=99){
		for(var i=1; i<=ahua;i++)
		{
			var asd = '<tr class="entrev">';
			asd +='<td>' + i + '</td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_' + i + '" id="P4_2_1A_NroTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_' + i + '" id="P4_2_1B_LongTramo' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_' + i + '" id="P4_2_1C_Cerco' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_' + i + '" id="P4_2_1D_Estruc' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_' + i + '" id="P4_2_1E_EstCons' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_' + i + '" id="P4_2_1F_Opin' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_izquierda > tbody').append(asd);
	  }
	}else if(ahua==''){
		//
	}else{
		alert('99 Linderos Máximo');
	}
}