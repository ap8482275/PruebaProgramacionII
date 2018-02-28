<?php
require 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!--  		Pagina donde se muestra detallada la lista de equipos Inscritos           -->
	<title>Lista de Torneos</title>
</head>
<style> 
		h1 {background-color: orange;  color:white; width: 45%}
		table
		{
			width: 90%;
		}
		table, th, td
		{
			border: 1px solid black;
			border-collapse: collapse;
			opacity: 0.95;
		}
		th, td
		{
			padding: 8px;
			text-align: center;
		}
		th
		{
			background-color: #0E1F71;
			color: white;
		}
		tr:nth-child(even)
		{
			background-color: #e8e8e8;
		}
		tr:nth-child(odd)
		{
			background-color: white;
		}
		#header
		{
			background-color: #FFA759;
			color: blue;
		}
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
		<!--  		Muestra la tabla con el contenido de la tabla torneos de la BD           -->
		<br><br>
		<table>
				<tr>
					<td id="header" colspan="8"><h2 colspan="7">Equipos Inscritos en Torneos</h2></td>
				</tr>
				<tr>
					<th>Equipo</th>
					<th>Torneo</th>
					<th>Fecha Torneo</th>
					<th>N° Part.</th>
					<th>Categoria</th>
					<th>Ver</th>
					<th colspan="2" >Operaciones</th>
				</tr>
			<?php
	/////////////////////// Consulta todos los campos de la tabla torneos//////////////
				$consulta_mysql=mysqli_query($connection,"SELECT * FROM torneos ORDER BY fecha_torneo");
	/////////////////////// Imprime los campos ///////////////////////////////////////
				while($rs=mysqli_fetch_array($consulta_mysql))
				{
			?> 
		 
				<tr>
	  				<td><?php echo $rs['equipo']; ?></td>
	  				<td><?php echo $rs['torneo']; ?></td>
	  				<td><?php echo $rs['fecha_torneo']; ?></td> 
	   				<td><?php echo $rs['cantidadp']; ?></td>
	   				<td><?php echo $rs['categoria']; ?></td> 
	   				<td><a href="detalles_registro.php?equipo=<?php echo $rs['equipo'];?>&id=<?php echo $rs['id'];?>">Detalles del Equipo</a></td>
	   				<td><a href="editar_torneo.php?id=<?php echo $rs['id'];?>">Editar Inscripción</a></td>
	   				<td><a href='eliminar_torneo.php?id=<?php echo $rs['id'];?>'>Eliminar Inscripción</a></td>
	   			</tr>
	   		<?php		 	
				}
			?>	
		</table>
		<div>
			<br><br>
			<a href="sesion_admin.php">Regresar</a>
		</div>
	</center>
</body>
</html>