<?php
require 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!--  		Pagina Principal del la sesion del administrador           -->
	<title>Sesion Administrador</title>
</head>
<style> 
		h1 {background-color: orange;  color:white; width: 45%}
</style> 
<center>
		<font><h1>Registro Digital de Torneos</h1></font>
<body>
	<?php 
		session_start();
		if (isset($_SESSION['usuario'])) 
		{ 
			echo "Usuario: ADMINISTRADOR &emsp;<a href='cerrar_sesion.php'>Cerrar Sesion</a>";
		}else
			{
				header("location:inicio.php");
			}
	?>
	<br><br><br>
	<h2>Menu de Opciones:</h2>
	<!-- Nos lleva a la lista de los equipos inscriptos en torneos en la BD-->
	<div>
		<a href="lista_torneos.php"><span style="border-radius: 10px; font-size: 30px; background-color: #0E1F71; color: white;" >Lista de Equipos Inscritos</span></a> 
	</div>
	<div>
		<br>
		<a href="admin_new_torneo.php"><span style="border-radius: 10px; font-size: 30px; background-color: #0E1F71; color: white;" >Registrar Torneos</span></a>
	</div>
	</center>
</body>
</html>