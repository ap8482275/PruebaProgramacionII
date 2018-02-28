<?php
////////////////// Inicia conexion con base de datos ////////////////////////////////////////
	$connection = mysqli_connect('localhost','root', '','taquilla_boletos');
	if (!$connection) {die('No hay conexion a la BD');}

/////////////////////////////////Seleccion a la BD//////////////////////////////////////////
	mysqli_select_db($connection ,'taquilla_boletos');
?>