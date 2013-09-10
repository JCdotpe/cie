
$(function(){
   
jQuery("#list2").jqGrid({
  url:'visor/visor/get_data?cod_dpto=01&cod_prov=01',
  datatype: "json",
  colNames:['Visualizar Ficha','Codigo Local','Centro Poblado','Datos Cedula','Datos GPS','Fotos'],
  colModel:[
      {name:'id',index:'id', width:55,align:'center'},
      {name:'cp',index:'cp', width:90},
      {name:'dc',index:'dc', width:90,align:'center'},
      {name:'dg',index:'dg', width:90,align:'center'},
      {name:'foto',index:'foto', width:90,align:'center'},
      {name:'ver',index:'ver', width:90,align:'center'}
  ],

  rowNum:20,
  rowList:[10,20,30],
  pager: '#pager2',
  sortname: 'id,cp,dc,dg,foto',
  viewrecords: true,
  sortorder: "desc",
  caption:"Seguimiento de Cedulas ",
  width: 1000,
  height: 350
});
jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});

  
});

function get_data(){

  jQuery("#list2").jqGrid('setGridParam',{url:'visor/visor/get_data?cod_dpto='+$("#departamento").val()+'&cod_prov='+$("#provincia").val(),page:1}).trigger("reloadGrid");

 // prompt('','visor/get_data?cod_dpto='+$("#departamento").val()+'&cod_prov='+$("#provincia").val())
}