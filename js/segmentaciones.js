function buscar_local(){
  var codigo = $("#codigolocal").val();
  var sede = $("#sedeoperativa").val();
  var provope = $("#provoperativa").val();
  
  if (sede == -1 || provope == -1 || codigo == '')
  {
    alert("Algunos de los Datos a Consultas son Incorrectos");
  }else{
    consultabd();
  }
  
}

function consultabd()
{
        var doLoginMethodUrl = 'registro_rutas/consulta_ubicacion';
        var codigo = $("#codigolocal").val();
        var sede = $("#sedeoperativa").val();
        var provope = $("#provoperativa").val();
        $.ajax({
          type: "POST",
          url: doLoginMethodUrl,
          dataType: "json",
          data: "local="+codigo+"&sede="+sede+"&provope="+provope,
          cache: false,
          success: function(data){
            $("#codigolocal").val('');
            $("#frm_registro :input").val('');
            if (data.cantidad > 0 ) 
            {
              alert("El Local Consultado ya fue asignado a una Ruta!.");
              $("#codigolocal").focus();
            }else{
              if (data.codigo_de_local=='')
              {
                alert("No se Encontró el Local Buscado, Revise el Código y los datos de Ubigeo!.");
                $("#codigolocal").focus();
              }else{
                $("#ecodlocal").val(data.codigo_de_local);
                $("#depa").val(data.nombre_dpto);
                $("#prov").val(data.nombre_provincia);
                $("#dist").val(data.nombre_distrito);
                $("#cent_pob").val(data.centro_poblado);
                $("#existe").val(data.cantidad);
              }
            }                      
          }
        });
        return false;
}

function valida_periodo_jb(campo)
{
  if (campo.value != '')
  {
    if (campo.value < 1 || campo.value > 14)
      { alert("Periodo fuera de Rango"); return false; }
  }
}

function valida_traslado(campo)
{
  nro=campo.value;
  if (nro!=0)
  {
    error = formato_decimales(nro);
    if (error==false){ alert("Nro Incorrecto"); campo.focus(); return false; }
    if(nro<0.5 || nro> 4) { alert('Dias de Traslado Incorrecto'); campo.focus(); return false; }
  }
  calculo_general();
}

function valida_traslado_jb(campo)
{
  nro=campo.value;
  if (nro!=0)
  {
    error = formato_decimales(nro);
    if (error==false){ alert("Nro Incorrecto"); campo.focus(); return false; }
    if(nro<1 || nro> 4) { alert('Dias de Traslado Incorrecto'); campo.focus(); return false; }
  }
  calculo_general();
}

function valida_trabajo(campo)
{
  nro=campo.value;
  if (nro!=0)
  {
    error = formato_decimales(nro);
    if (error==false){ alert("Nro Incorrecto"); campo.focus(); return false; }
    if(nro<0.5 || nro> 1) { alert('Dias de Trabajo Incorrecto'); campo.focus(); return false; }  
  } 
  calculo_general();
}

function valida_trabajo_jb(campo)
{
  nro=campo.value;
  if (nro!=0)
  {
    error = formato_decimales(nro);
    if (error==false){ alert("Nro Incorrecto"); campo.focus(); return false; }
    if(nro<1 || nro> 4) { alert('Dias de Trabajo Incorrecto'); campo.focus(); return false; }  
  } 
  calculo_general();
}

function valida_recuperacion(e)
{
  e= (window.event)? event : e;
  tecla= (e.keyCode)? e.keyCode: e.which;
  if (tecla==8 || tecla==9 || tecla==48 || tecla==49 || tecla==50)
    return true;
  else
    return false;
}

function valida_recugabidesc(e)
{
  e= (window.event)? event : e;
  tecla= (e.keyCode)? e.keyCode: e.which;
  if (tecla==8 || tecla==9 || tecla==48 || tecla==49)
    return true;
  else
    return false;
}

function valida_retorno(e)
{
  e= (window.event)? event : e;
  tecla= (e.keyCode)? e.keyCode: e.which;
  if (tecla==8 || tecla==9 || (tecla>=48 && tecla<=53))
    return true;
  else
    return false;
}

function validar_numeros(e) { 
    e= (window.event)? event : e;
  tecla= (e.keyCode)? e.keyCode: e.which;
  if (tecla==8 || tecla==9 || tecla==16 || (tecla>=35 && tecla<=40)) return true; 
  patron =/[0-9]/;
  te = String.fromCharCode(tecla);
    return patron.test(te); 
}

function validar_decimales(e) { 
    e= (window.event)? event : e;
  tecla= (e.keyCode)? e.keyCode: e.which;
  if (tecla==8 || tecla==9 || tecla==16 || (tecla>=35 && tecla<=40) || tecla==46) return true; 
  patron = /^[-+]?[0-9]*\.?[0-9]+$/;
  te = String.fromCharCode(tecla);
    return patron.test(te);
}

function formato_decimales(contenido)
{
  if (contenido.length>1)
  {
    patron = /^[-+]?[0-9]+\.?[0-9]+$/;
    return patron.test(contenido);  
  }else{
    return true;
  }
}



function validar_fechas(e) { 
    e= (window.event)? event : e;
  tecla= (e.keyCode)? e.keyCode: e.which;
  if (tecla==8 || tecla==9 || tecla==16 || (tecla>=35 && tecla<=40) || tecla==47) return true; 
  patron =/[0-9]/;
  te = String.fromCharCode(tecla);
  return patron.test(te); 
}

function rango_de_fechas()
{
  fecha_inicial = $('#fxinicio').val();
  fecha_final = $('#fxfinal').val();

  var fecha1 = new separar_fecha( fecha_final );
  var fecha2 = new separar_fecha( fecha_inicial );

  var error = 0;
  if (fecha2.anio > fecha1.anio ){ alert("anio mayor"); error = 1; }
  if (fecha2.anio == fecha1.anio && fecha2.mes > fecha1.mes ){ alert("mes mayor"); error = 1; }
  if (fecha2.anio == fecha1.anio && fecha2.mes == fecha1.mes && fecha2.dia > fecha1.dia ){ alert("dia mayor"); error = 1; }
  
  if ( error == 1 )
  {
    alert("Fecha Inicio MAYOR QUE Fecha Final!");
    return false;
  }else{

   
     var fecha1 = new separar_fecha( fecha_final );
     var fecha2 = new separar_fecha( fecha_inicial );
    
	   mes1 = fecha1.mes-1;
	   mes2 = fecha2.mes-1;

     var miFecha1 = new Date( fecha1.anio, mes1, fecha1.dia );
     var miFecha2 = new Date( fecha2.anio, mes2, fecha2.dia );

     var diferencia = miFecha1.getTime() - miFecha2.getTime();
     var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24))
     
     $('#rangofechas').val(dias);
     
     if (dias>5)
     {
        alert('Revisar el Periodo de Trabajo');
        return false;
       
     }
  }
}

function separar_fecha(cadena)
{
   var separador = "/";
   
   if ( cadena.indexOf( separador ) != -1 ) {
        var posi1 = 0;
        var posi2 = cadena.indexOf( separador, posi1 + 1 );
        var posi3 = cadena.indexOf( separador, posi2 + 1 );
        this.dia = cadena.substring( posi1, posi2 );
        this.mes = cadena.substring( posi2 + 1, posi3 );
        this.anio = cadena.substring( posi3 + 1, cadena.length );
   } else {
        this.dia = 0;
        this.mes = 0;
        this.anio = 0;   
   }
}

function validaFechaDDMMAAAA(fecha){
  var dtCh= "/";
  var minYear=1900;
  var maxYear=2100;
  function isInteger(s){
    var i;
    for (i = 0; i < s.length; i++){
      var c = s.charAt(i);
      if (((c < "0") || (c > "9"))) return false;
    }
    return true;
  }
  function stripCharsInBag(s, bag){
    var i;
    var returnString = "";
    for (i = 0; i < s.length; i++){
      var c = s.charAt(i);
      if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
  }
  function daysInFebruary (year){
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
  }
  function DaysArray(n) {
    for (var i = 1; i <= n; i++) {
      this[i] = 31
      if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
      if (i==2) {this[i] = 29}
    }
    return this
  }
  function isDate(dtStr){
    var daysInMonth = DaysArray(12)
    var pos1=dtStr.indexOf(dtCh)
    var pos2=dtStr.indexOf(dtCh,pos1+1)
    var strDay=dtStr.substring(0,pos1)
    var strMonth=dtStr.substring(pos1+1,pos2)
    var strYear=dtStr.substring(pos2+1)
    strYr=strYear
    if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
    if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
    for (var i = 1; i <= 3; i++) {
      if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
    }
    month=parseInt(strMonth)
    day=parseInt(strDay)
    year=parseInt(strYr)
    if (pos1==-1 || pos2==-1){
      alert("El Formato de la Fecha es : dd/mm/yyyy");
      return false
    }
    if (strMonth.length<1 || month<1 || month>12){
      alert("Por favor ingrese un Mes valido");
      return false
    }
    if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
      alert("Por favor ingrese un Dia valido");
      return false
    }
    if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
      alert("Por favor ingrese 4 digitos entre "+minYear+" y "+maxYear);
      return false
    }
    if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
      alert("Por favor ingrese una Fecha valida");
      return false
    }
    return true
  }
  if(isDate(fecha)){
    return true;
  }else{
    return false;
  }
}

function validar_movi_ma(valor)
{    
  if (valor > 0)
  {     
    total = suma_uno();
    monto = total * valor;
    $('#movilocal_af').val(monto);
    $('#gastooperativo_ma').val('');
    $('#gastooperativo_af').val('');
  }else{
    $('#movilocal_af').val('');
  }
  calcula_totalaf();
}

function validar_gasto_ma(valor)
{    
  if (valor > 0)
  {     
    total = suma_uno();
    monto = total * valor;
    $('#gastooperativo_af').val(monto);
    $('#movilocal_ma').val('');
    $('#movilocal_af').val('');
  }else{
    $('#gastooperativo_af').val('');
  }
  calcula_totalaf();
}

function calculo_general()
{
  calcula_totaldias();
  movi = $('#movilocal_ma').val();
  gasto = $('#gastooperativo_ma').val();
  if (movi == ''){ movi = 0}
  if (gasto == ''){ gasto = 0}
  validar_movi_ma(movi);
  validar_gasto_ma(gasto);
  calcula_totalaf();
}


function calcula_totaldias()
{
    var gabinete=document.getElementById("gabinete").value;
    var descanso=document.getElementById("descanso").value;
    
    if (gabinete==''){ gabinete = 0 }
    if (descanso==''){ descanso = 0 }
    
    var total = suma_uno();
    total+= parseFloat(gabinete);
    total+= parseFloat(descanso);
   
    document.getElementById("totaldias").value=total;
}

function isFloat(n) {
    return n % 1 != 0;
}

function calcula_totalaf()
{
  var movi_af=$('#movilocal_af').val();
  var gasto_af=$('#gastooperativo_af').val();
  var pasaje_af=$('#pasaje').val();

  if (movi_af==''){ movi_af = 0 }
  if (gasto_af==''){ gasto_af = 0 }
  if (pasaje_af==''){ pasaje_af = 0 }

  var total = parseFloat(movi_af);
  total += parseFloat(gasto_af);
  total += parseFloat(pasaje_af);

  $('#total_af').val(total);
}

function suma_uno()
{
    var traslado=$('#traslado').val();
    var trabajo_supervisor=$('#trabajo_supervisor').val();
    if (document.forms[0].recuperacion)
    {
      var recuperacion=$('#recuperacion').val();  
    }else{
      var recuperacion='';
    }    
    var retornosede=$('#retornosede').val();

    if (traslado==''){ traslado = 0 }
    if (trabajo_supervisor==''){ trabajo_supervisor = 0 }
    if (recuperacion==''){ recuperacion = 0 }
    if (retornosede==''){ retornosede = 0 }
        
    var total = parseFloat(traslado);
    total+= parseFloat(trabajo_supervisor);
    total+= parseFloat(recuperacion);
    total+= parseFloat(retornosede);

    return total;
}


function Form_Validar()
{
  var jefebrigada=document.getElementById("jefebrigada");
  var codruta=document.getElementById("codruta");
  var codlocal=document.getElementById("ecodlocal");
  var fxinicio=document.getElementById("fxinicio");
  var fxfinal=document.getElementById("fxfinal");
  var traslado=document.getElementById("traslado");
  var trabajo_supervisor=document.getElementById("trabajo_supervisor");
  var recuperacion=document.getElementById("recuperacion");
  var retornosede=document.getElementById("retornosede");
  var gabinete=document.getElementById("gabinete");
  var descanso=document.getElementById("descanso");
  var totaldias=document.getElementById("totaldias");
  var movilocal_ma=document.getElementById("movilocal_ma");
  var gastooperativo_ma=document.getElementById("gastooperativo_ma");
  var movilocal_af=document.getElementById("movilocal_af");
  var gastooperativo_af=document.getElementById("gastooperativo_af");
  var pasaje=document.getElementById("pasaje");
  var total_af=document.getElementById("total_af");

  if(jefebrigada.value == '' || (jefebrigada.value) == 0){ alert("Ingrese un Código de Jefe de Brigada"); jefebrigada.focus(); return false; }
  if(codruta.value == '' || (codruta.value) == 0){ alert("Ingrese una Ruta"); codruta.focus(); return false; }
  if(codlocal.value == '' || (codlocal.value) == 0){ alert("Consulte un Local"); codigolocal.focus(); return false; }

  if (codruta.value.length != 2){ alert("El Codigo de Ruta debe ser de 2 digitos"); codigolocal.focus(); return false; }

  if (periodo.value == '')
  {
    alert("Periodo fuera de Rango"); periodo.focus(); return false;
  }else{
    if (periodo.value < 1 || periodo.value > 14){ alert("Periodo fuera de Rango"); periodo.focus(); return false; }
  }

  
  nroLocales = document.getElementById("existe").value;
  if(nroLocales > 0){ alert("Local ya fue Asignado a una Ruta"); codigolocal.focus(); return false; }
  
  if (fxinicio.value !='')
  {
    if (fxfinal.value != '')
    {
      
      if (!validaFechaDDMMAAAA(fxinicio.value)){ fxinicio.focus(); return false; }
      if (!validaFechaDDMMAAAA(fxfinal.value)){ fxfinal.focus(); return false; }

      rango_de_fechas();

    }else{ alert("Debe Ingresar una Fecha Final"); fxfinal.focus(); return false; }
  }else{ alert("Debe Ingresar una Fecha de Inicio"); fxinicio.focus(); return false; }

  if( (movilocal_ma.value == 0 || movilocal_ma.value == '') && (gastooperativo_ma.value == 0 || gastooperativo_ma.value == '') ){ alert("Falta Asignar Montos"); movilocal_ma.focus(); return false; }

  
  if (movilocal_ma.value == '' || movilocal_ma.value == 0 || movilocal_ma.value == 15)
  {
    if (movilocal_ma.value == 15 && pasaje.value > 0){ alert("Ud. Asigno Movilidad Local MA, revise el campo Pasaje"); pasaje.focus(); return false; }
  }else{ alert("Monto de Movilidad Local MA Incorrecto"); movilocal_ma.focus(); return false; }

  if (gastooperativo_ma.value == '' || gastooperativo_ma.value == 0 || gastooperativo_ma.value == 50 || gastooperativo_ma.value == 120)
  {
    if (gastooperativo_ma.value == 50 && pasaje.value > 0){ alert("Ud. Asigno Gasto Operativo MA, revise el campo Pasaje"); pasaje.focus(); return false; }
  }else{ alert("Monto de Gasto Operativo MA Incorrecto"); gastooperativo_ma.focus(); return false; }

  if ((movilocal_ma.value == 15 || gastooperativo_ma.value == 50) && (traslado.value > 0 || retornosede.value > 0)) { alert("Revise los campos de Traslado y Retorno a Sede"); traslado.focus(); return false; }
  
  if(total_af.value == '' || total_af.value == 0){ alert("Faltan Datos para Calcular la Asignación de Fondos"); total_af.focus(); return false; }
  
  if(isFloat(totaldias.value)) { alert("Alerta. Revisar los Dias de Operacion en Campo"); $('#totaldias').focus(); return false; }

  rango_fechas = parseFloat(document.getElementById("rangofechas").value) + 1;
    
  if (rango_fechas == totaldias.value){}else{ alert("El Rango de Fechas No Coincide con los Dias de Operacion en Campo"); return false; }

  rutas_form();
}

function rutas_form()
{
    var bsub = $( ":submit" );
    var form_data = $('#frm_registro').serializeArray();
      
    form_data.push(
      {name: 'ajax',value:1}
    );
    form_data = $.param(form_data);
    
    $.ajax({
        type: "POST", 
        url: "registro_rutas/registro",   
        data: form_data,
        
        success: function(response){
         
          $("#frm_registro :input").val('');
          $("#list2").trigger("reloadGrid");
          alert("Local Asignado a Ruta Satisfactoriamente"); 
          //$("#t_regs2").dataTable().fnDraw();
        }
    });
}


function cargarProvOpe()
{
    var doLoginMethodUrl = CI.base_url + 'index.php/segmentaciones/registro_rutas/obtenerprovoperativa';
    var id_sede = $("#sedeoperativa").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "codsede="+id_sede,
      success: function(provinciaResponse){
        console.log(provinciaResponse);
        $("#provoperativa").empty().append($(provinciaResponse).find("option"));
        $("#provoperativa").prepend("<option value='-1' selected='true'>Seleccione...</value>");

        $("#jefebrigada").empty().append("<option value='-1' selected='true'></value>");
      }
    });
}

function cargar_JB()
{
    var doLoginMethodUrl = CI.base_url + 'index.php/segmentaciones/registro_jefe_brigada/cargar_jefe_brigada';
    var id_sedeope = $("#sedeoperativa").val();
    var id_provope = $("#provoperativa").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "sedeope="+id_sedeope+"&provope="+id_provope,
      success: function(jefebrigadaResponse){
        console.log(jefebrigadaResponse);
        $("#jefebrigada").empty().append($(jefebrigadaResponse).find("option"));
        $("#jefebrigada").prepend("<option value='-1' selected='true'>Seleccione...</value>");
      }
    });
}

function cargar_info_jefebrigada()
{
  var sedeope = $("#sedeoperativa").val();
  var provope = $("#provoperativa").val();
  var jb = $("#jefebrigada").val();
  var local = $("#codigolocal").val();
  
  if (sedeope == -1 || provope == -1 || jb == -1 || local == '')
  {
    alert("Faltan Datos para realizar la Consulta.");
  }else{
    consultabd_JB();
  }
}

function consultabd_JB()
{
      var codigo = $("#codigolocal").val();
      var jb = $("#jefebrigada").val();
        var doLoginMethodUrl = 'registro_jefe_brigada/consulta_datos';
        $.ajax({
          type: "POST",
          url: doLoginMethodUrl,
          dataType: "json",
          data: "local="+codigo+"&jefe="+jb,
          cache: false,
          success: function(data){
            $("#frm_registro :input").val('');
            if (data.cantidad > 0)
            {
                $("#ecodlocal").val(data.codigo_de_local);
                $("#depa").val(data.nombre_dpto);
                $("#prov").val(data.nombre_provincia);
                $("#dist").val(data.nombre_distrito);
                $("#cent_pob").val(data.centro_poblado);
                $("#fxinicio").val(data.fxinicio_jb);
                $("#fxfinal").val(data.fxfinal_jb);
                $("#traslado").val(data.traslado_jb);
                $("#trabajo_supervisor").val(data.trabajo_supervisor_jb);
                $("#retornosede").val(data.retornosede_jb);
                $("#gabinete").val(data.gabinete_jb);
                $("#descanso").val(data.descanso_jb);
                $("#totaldias").val(data.totaldias_jb);
                $("#movilocal_ma").val(data.movilocal_ma_jb);
                $("#gastooperativo_ma").val(data.gastooperativo_ma_jb);
                $("#movilocal_af").val(data.movilocal_af_jb);
                $("#gastooperativo_af").val(data.gastooperativo_af_jb);
                $("#pasaje").val(data.pasaje_jb);
                $("#total_af").val(data.total_af_jb);
                $("#observaciones").val(data.observaciones_jb);
            }else{
              alert("Código Consultado no Pertenece a Jefe de Brigada");
            }
          }
        });
        return false;
}


function Form_Validar_JB()
{
  var codlocal=document.getElementById("ecodlocal");
  var periodo=document.getElementById("periodo");
  var fxinicio=document.getElementById("fxinicio");
  var fxfinal=document.getElementById("fxfinal");
  var traslado=document.getElementById("traslado");
  var trabajo_supervisor=document.getElementById("trabajo_supervisor");
  var retornosede=document.getElementById("retornosede");
  var gabinete=document.getElementById("gabinete");
  var descanso=document.getElementById("descanso");
  var totaldias=document.getElementById("totaldias");
  var movilocal_ma=document.getElementById("movilocal_ma");
  var gastooperativo_ma=document.getElementById("gastooperativo_ma");
  var movilocal_af=document.getElementById("movilocal_af");
  var gastooperativo_af=document.getElementById("gastooperativo_af");
  var pasaje=document.getElementById("pasaje");
  var total_af=document.getElementById("total_af");

  if(codlocal.value == '' || (codlocal.value) == 0){ alert("Consulte un Local"); codigolocal.focus(); return false; }
  
  if (periodo.value == '')
  {
    alert("Periodo fuera de Rango"); periodo.focus(); return false;
  }else{
    if (periodo.value < 1 || periodo.value > 14){ alert("Periodo fuera de Rango"); periodo.focus(); return false; }
  }

  if (fxinicio.value !='')
  {
    if (fxfinal.value != '')
    {
      
      if (!validaFechaDDMMAAAA(fxinicio.value)){ fxinicio.focus(); return false; }
      if (!validaFechaDDMMAAAA(fxfinal.value)){ fxfinal.focus(); return false; }

      rango_de_fechas();

    }else{ alert("Debe Ingresar una Fecha Final"); fxfinal.focus(); return false; }
  }else{ alert("Debe Ingresar una Fecha de Inicio"); fxinicio.focus(); return false; }

  if( (movilocal_ma.value == 0 || movilocal_ma.value == '') && (gastooperativo_ma.value == 0 || gastooperativo_ma.value == '') ){ alert("Falta Asignar Montos"); movilocal_ma.focus(); return false; }

  
  if (movilocal_ma.value == '' || movilocal_ma.value == 0 || movilocal_ma.value == 20)
  {
    if (movilocal_ma.value == 20 && pasaje.value > 0){ alert("Ud. Asigno Movilidad Local MA, revise el campo Pasaje"); pasaje.focus(); return false; }
  }else{ alert("Monto de Movilidad Local MA Incorrecto"); movilocal_ma.focus(); return false; }

  if (gastooperativo_ma.value == '' || gastooperativo_ma.value == 0 || gastooperativo_ma.value == 50 || gastooperativo_ma.value == 120)
  {
    if (gastooperativo_ma.value == 50 && pasaje.value > 0){ alert("Ud. Asigno Gasto Operativo MA, revise el campo Pasaje"); pasaje.focus(); return false; }
  }else{ alert("Monto de Gasto Operativo MA Incorrecto"); gastooperativo_ma.focus(); return false; }

  if ((movilocal_ma.value == 20 || gastooperativo_ma.value == 50) && (traslado.value > 0 || retornosede.value > 0)) { alert("Revise los campos de Traslado y Retorno a Sede"); traslado.focus(); return false; }
  
  if(total_af.value == '' || total_af.value == 0){ alert("Faltan Datos para Calcular la Asignación de Fondos"); total_af.focus(); return false; }
  
  if(isFloat(totaldias.value)) { alert("Alerta. Revisar los Dias de Operacion en Campo"); $('#totaldias').focus(); return false; }

  rango_fechas = parseFloat(document.getElementById("rangofechas").value) + 1;
    
  if (rango_fechas == totaldias.value){}else{ alert("El Rango de Fechas No Coincide con los Dias de Operacion en Campo"); return false; }

  jefebrigada_form();
}

function jefebrigada_form()
{
    var bsub = $( ":submit" );
    var form_data = $('#frm_registro').serializeArray();
      
    form_data.push(
      {name: 'ajax',value:1}
    );
    form_data = $.param(form_data);
    
    $.ajax({
        type: "POST", 
        url: "registro_jefe_brigada/registro",   
        data: form_data,
        
        success: function(response){
         
          $("#frm_registro :input").val('');
          $("#list2").trigger("reloadGrid");
          alert("Datos Guardados Satisfactoriamente");
        }
    });
}

function mostrar_grilla_jb()
{
  var codsede = $("#sedeoperativa").val();
  var codprov = $("#provoperativa").val();
  var codjb = $("#jefebrigada").val();
  
  jQuery("#list2").jqGrid('setGridParam',{url:"registro_jefe_brigada/ver_datos?codsede="+codsede+"&codprov="+codprov+"&codjb="+codjb,page:1}).trigger("reloadGrid");
}