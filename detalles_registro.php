<?php
	require 'database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalles de Registro</title>
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
		if (isset($_SESSION['usuario'])) 
			{ 
				echo "Usuario: ADMINISTRADOR &emsp;<a href='cerrar_sesion.php'>Cerrar Sesion</a>";
			}else
				{
					header("location:inicio.php");
				}
	?>
	<br><br>
		<table>
				<tr>
					<td id="header" colspan="11"><h2>Detalles Equipos Inscritos en Torneos</h2></td>
				</tr>
				<tr>
					<th>Usuario</th>
					<th>Equipo</th>
					<th>Siglas</th>
					<th>Fecha de Creacion del Equipo</th>
					<th>Direccion de Responsable</th>
					<th>Correo</th>
					<th>Sitio Web</th>
					<th>Torneo</th>
					<th>Fecha del Torneo</th>
					<th>N° Part.</th>
					<th>Categoria</th>
				</tr>
	<?php
/////////////////Busca por el id y por el usuario la informacion en ambas tablas de la BD//////////
		$equipo=$_REQUEST['equipo'];
		$id=$_REQUEST['id'];

		$consulta_mysqli=sprintf("SELECT * FROM registro_users WHERE Nteam='%s'",mysqli_real_escape_string($connection,$equipo));
		$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
		
		$consulta_mysqli2=sprintf("SELECT * FROM torneos WHERE id='%d'",mysqli_real_escape_string($connection,$id));
		$resultado_consulta_mysql2=mysqli_query($connection,$consulta_mysqli2);

		while($rs=mysqli_fetch_array($resultado_consulta_mysql) AND $rs2=mysqli_fetch_array($resultado_consulta_mysql2))
				{
	?> 				<tr>
	  				<td><?php echo $rs['user']; ?></td>
	  				<td><?php echo $rs['Nteam']; ?></td>
	  				<td><?php echo $rs['NCteam']; ?></td>
	  				<td><?php echo $rs['Fcreacion']; ?></td>
	  				<td><?php echo $rs['Dresponsable']; ?></td>
	  				<td><?php echo $rs['email']; ?></td>
	  				<td><?php echo $rs['website']; ?></td>
	  				<td><?php echo $rs2['torneo']; ?></td>
	  				<td><?php echo $rs2['fecha_torneo']; ?></td>  
	   				<td><?php echo $rs2['cantidadp']; ?></td>
	   				<td><?php echo $rs2['categoria']; ?></td> 
	   			</tr>
	   		<?php		 	
				}
			?>	
		</table>
		<div>
			<br><br>
			<a href="lista_torneos.php">Regresar</a>
		</div>

</body>
</center>
</html>
