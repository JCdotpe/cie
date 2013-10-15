<h1>Predios - Codigo Local <?php echo $cod; ?></h1>


<ul id="predios">

</ul>

<script type="text/javascript">
$(function(){
	// function(i, data){
	// 	function( fila, valor )
  $.each( <?php echo json_encode($predios->result()); ?>, function(i, data) {
  	var ahua = 'Principal';
  	if(data.Nro_Pred != 1){
  		ahua = (data.P1_B_2A_PredNoCol==0)? 'Colindante' : 'No Colindante';
  	}
	$('#predios').append('<li><a href="' + CI.site_url + '/predio/' + data.id_local + '/' + data.Nro_Pred + '">'+ data.Nro_Pred  + ' - ' + ahua + '</a></li>')
});

}); 
</script>