<?php 

$P9_F_Url_Foto = array(
	'name'	=> 'P9_F_Url_Foto',
	'id'	=> 'P9_F_Url_Foto',
	'class'	=> 'input98p',
	'disabled' => 'disabled',
);

echo '

<h3>Lista de fotos en Base de Datos: </h3>
<div id="fotos">
'.form_input($P9_F_Url_Foto).'
</div>
';

?>

 <script type="text/javascript">

// $(function(){

// //cap9

// $('#fotos input').remove('.input98p');

// var asd = '';
// var as = 1;
// $.each( <?php #echo json_encode($cap9_f->result()); ?>, function(i, data) {
// 	   asd+='<input type="text" class="input98p" disabled="disabled" name="P9_Foto' + '_' + as + '" id="P9_Foto' + '_' + as + '" value="'+ data.P9_Foto +'" >';
// 	   as++;
// }); 
// $('#fotos').append(asd);


// });

</script>