
function filtro_dni()
{

    var dni = $("#buscardni").val();

    jQuery("#list2").jqGrid('setGridParam',{url:"resultados/get_datatables?dni="+dni ,page:1}).trigger("reloadGrid");
}

$(function(){

$("#buscardni").keydown(function(event) {
            var key = event.charCode || event.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 ||
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
});

    jQuery("#list2").jqGrid({
              type:"POST",
              url:'resultados/get_datatables',
              datatype: "json",
              height: 255,
              colNames:['Num','Departamento','Provincia','Cargo',' Dni ','Apellidos y nombre','Proceso','Detalle'],
              colModel:[
                {name:'id',index:'id', width:5,editable:true, editoptions:{readonly:true}},
                {name:'dpto',index:'dpto', width:10,editable:true},
                {name:'prov',index:'prov', width:10,editable:true,edittype:"select",editoptions:{value:"1:Adquisición;2:Prestamo;3:Traslado"}},
                {name:'cargo',index:'cargo', width:10,editable:true,edittype:"select",editoptions:{value:"1:Campo;2:Capacitación;3:Oficina;4:Publicidad;5:Digitación;6:Udra"}},
                {name:'dni',index:'dni', width:10,editable:true,edittype:"select",editoptions:{value:"1:Ingreso;2:Salida"}},
                {name:'apellidos_nombres',index:'apellidos_nombres', width:20,editable:false},
                {name:'proceso',index:'proceso', width:10,editable:true,edittype:"select",editoptions:{value:"1:Factura;2:Cargo;3:Guia de remisión;4:Orden de compra"}},
                {name:'detalle',index:'detalle', width:10,editable:true},
              ],
              rowNum:30,
              rowList:[10,20,30],
              pager: '#pager2',
              sortname: 'dpto,prov,cargo,apellidos_nombres',
              viewrecords: true,
              sortorder: "asc",
              autowidth: false,
              caption:"Editar",
              shrinkToFit:false,
              caption:"Resultados"
          });

          jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})
          $("#list2").setGridWidth($('#grid_content').width(), true);
          $('#list2').trigger( 'reloadGrid' );
});