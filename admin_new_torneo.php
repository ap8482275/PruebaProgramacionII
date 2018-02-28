<?php
	require 'database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Torneo</title>
</head>
<style> 
		h1 {background-color: orange;  color:white; width: 45%}
		form 
		{
        		margin: auto;
        		width: 50%;
        		max-width: 500px;
        		background: #F3F3F3;
        		padding: 50px
       	}
    	input
    	{
    		display: block;
    		padding: 10px;
    	}
		input[type="submit"]
		{
            background-color: #0E1F71;
            border: none;
            border-radius: 10px;
            color: white;
            padding: 10px 50px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 0;
            cursor: pointer;
        }
        input[type="submit"]:active{
        	transform: scale(0.95);
        }
        table
		{
			width: 50%;
		}
		table, th, td
		{
			border: 1px solid black;
			border-collapse: collapse;
			opacity: 0.95;
		}
		th, td
		{
			padding: 5px;
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
			echo "Usuario: ADMINISTRADOR <a href='cerrar_sesion.php'>Cerrar Sesion</a>";
		}else
			{
				header("location:inicio.php");
			}
	?>
		<div>
		<form method="POST" action="crear_torneo.php" name="form 1" >
			<fieldset>          <!-- Creo caja de iniciar sesion, campos de texto y boton -->
				<legend>Registro de Nuevo Torneo</legend>
				<br>
				<div>
					<label for="Disciplina"><p>Disciplina</p></label>
					<input id="Disciplina" type="text" name="Disciplina" required placeholder="Ingrese Disciplina del Nuevo Torneo" max="20">
				</div>
				<br>
				<div>
					<label for="Ftorneo"><p>Fecha del Torneo</p></label>
					<input id="Ftorneo" type="date" required name="Ftorneo">
				</div>
				<br>
				<div>
					<input type="submit" name="Crear" class="Crear" value="Crear">
				</div>
			</fieldset>
		</form>
		<br><br>
	<?php require 'fecha_torneo.php';?> 
		<table>
				<tr>
					<td id="header" colspan="4"><h2>Torneos Disponibles para Inscripcion</h2></td>
				</tr>
				<tr>
					
					<th>Disciplina</th>
					<th>Fecha Torneo</th>
					<th>Operación</th>
				</tr>
			<?php
	/////////////////////// Consulta todos los campos de la tabla torneos//////////////
				$consulta_mysql=mysqli_query($connection,"SELECT * FROM torneos_db ORDER BY fecha_torneo");
	/////////////////////// Imprime los campos ///////////////////////////////////////
				while($rs=mysqli_fetch_array($consulta_mysql))
				{
			?> 
		 
				<tr>
	  				<td><?php echo $rs['torneo']; ?></td>
	  				<td><?php echo $rs['fecha_torneo']; ?></td> 
	   				<td><a href='eliminar_torneo_db.php?id=<?php echo $rs['id'];?>'>Cerrar Inscripción</a></td>
	   			</tr>
	   		<?php		 	
				}
			?>	
		</table>
	</div> 


		<div>
			<br>
			<a href="sesion_admin.php">Regresar</a>
		</div>
</body>
</center>
</html>