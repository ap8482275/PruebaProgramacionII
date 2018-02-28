<?php
require 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!--  		Pagina Principal del la sesion de usuario normal           -->
	<title>Sesion</title>
</head>
<style> 
		h1 {background-color: orange;  color:white; width: 45%}
		form {
        		margin: auto;
        		width: 50%;
        		max-width: 500px;
        		background: #F3F3F3;
        		padding: 50px

        	}
        	input{
        		
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
        }table
		{
			width: 40%;
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
			padding: 1px;
			background-color: #FFA759;
			color: blue;
		}
</style>
<body>
	<center>
		<font><h1>Registro Digital de Torneos</h1></font>

	<?php
		session_start();
		if (isset($_SESSION['usuario'])) 
		{
			if ($_SESSION['usuario']!='admin') {
			
				$nombre = $_SESSION['usuario'];
				$nombrequipo = $_SESSION['Nteam']; 
				echo "Usuario: $nombre";
				echo "&emsp; Equipo:  $nombrequipo &emsp;";
				echo "<a href='cerrar_sesion.php'> Cerrar Sesion</a>";
		}else
			{
				header("location:inicio.php");
			}
		}
////// Elimina de la BD: torneos_bd, los torneos que ya se realizaron segun fecha actual /////////
	require 'fecha_torneo.php';
/////////////////////Lee la BD para cargar la lista desplegable de torneos//////////////
		$query= mysqli_query($connection,"SELECT * FROM torneos_db ORDER BY fecha_torneo");
	?>
		<br></br>
	<div>
		<!--  		Formulario para Inscribir equipo en un torneo          -->
		<form action="registro_torneo.php" method="POST" name="form 3">
			<fieldset>
				<legend>Registro de Torneos</legend>	
				<div class="row Torneo">
					<label>Seleccione un Torneo: </label>
					<select name="torneo" size="1" required>
						<option value="">--Seleccionar--</option></span>
						<?php							
								while ($registro=mysqli_fetch_assoc($query))
								{ 
									//////////////////////// Busca si esta inscrito ya el torneo ///////////////77
									$user=	$_SESSION['usuario'];
									$formato= '%s';
									$fecha=sprintf($formato,$registro['fecha_torneo']);
									$consulta_mysqli=sprintf("SELECT * FROM torneos WHERE torneo='%s'AND user='%s' AND fecha_torneo='%s'",mysqli_real_escape_string($connection,$registro['torneo']),
									mysqli_real_escape_string($connection,$user),
									mysqli_real_escape_string($connection,$fecha));
									$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
									if(!$registro2=mysqli_fetch_array($resultado_consulta_mysql))
										{ 
							?>
											<option value="<?php echo $registro['id'];?>"><?php echo $registro['torneo'];?><?php echo " - &#128197; ".$registro['fecha_torneo'];?></option>
								<?php 	}
								} ?>
					</select>
				</div>
				<br>
				<div class="row CantidadP">
					<label for="cantidadp" >Cantidad de Participantes<br> </label>
					<input id="cantidadp" type="number" min="1" max="20" name="cantidadp" required placeholder="Cantidad de Participantes" >
				</div>
				<br>
				<div class="Categoria">
					<label for="categoria">Categoria:<br> </label>
					Principiante<input type="radio" name="categoria" required value="Principiante"><br>
					Aficionados<input type="radio" name="categoria" required value="Aficionados"><br>
					Profesionales<input type="radio" name="categoria" required value="Profesionales"><br>
				</div>
				<br>
				<div>
					<input type="submit" name="Inscribir" value="Inscribir">
				</div>
			</fieldset>
		</form>
		<br>

		<table>
				<tr>
					<td id="header" colspan="4"><h2>Torneos Inscritos</h2></td>
				</tr>
				<tr>
					
					<th>Disciplina</th>
					<th>Categoria</th>
					<th>Participantes</th>
					<th>Fecha Torneo</th>
				</tr>
			<?php
	/////////////////////// Consulta todos los campos de la tabla torneos//////////////

				$consulta=sprintf("SELECT * FROM torneos WHERE user='%s'ORDER BY fecha_torneo",
					mysqli_real_escape_string($connection,$_SESSION['usuario']));
				$result=mysqli_query($connection,$consulta);
	/////////////////////// Imprime los campos ///////////////////////////////////////
				while($rs=mysqli_fetch_array($result))
				{
			?> 
		 
				<tr>
	  				<td><?php echo $rs['torneo']; ?></td>
	  				<td><?php echo $rs['categoria']; ?></td>
	  				<td><?php echo $rs['cantidadp']; ?></td>
	  				<td><?php echo $rs['fecha_torneo']; ?></td> 
	   			</tr>
	   		<?php		 	
				}
			?>	
		</table>
	</div>
	</center>
</body>
</html>