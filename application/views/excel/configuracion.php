<?php

function chao_tilde($entra)
{
	$traduce = array('á' => '&aacute;', 'é' => '&eacute;', 'í' => '&iacute;', 'ó' => '&oacute;', 'ú' => '&uacute;', 'Á' => '&Aacute;', 'É' => '&Eacute;', 'Í' => '&Iacute;', 'Ó' => '&Oacute;', 'Ú' => '&Uacute;', 'ñ' => '&ntilde;', 'Ñ' => '&Ntilde;',  );
	$sale = strtr($entra, $traduce);
	return $sale;
}

?>