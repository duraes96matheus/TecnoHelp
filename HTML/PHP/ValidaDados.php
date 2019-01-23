<?php
	$motivo = filter_input(INPUT_POST, 'motivo',FILTER_SANITIZE_STRING);
	echo"$motivo";
?>