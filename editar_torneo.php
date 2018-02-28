<?php
	require 'database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!--  		Pagina donde el administrador puede modificar campos de Inscripcion          -->
		<title>Editar Torneo</title>
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
        }
</style>
	<body>
	<center>
		<font><h1>Registro Digital de Torneos</h1></font>
		<?php 
		if (isset($_SESSION['usuario'])) 
		{ 
			echo "Usuario: ADMINISTRADOR &emsp;<a href='cerrar_sesion.php'>Cerrar Sesion</a>";
		}else
			{
				header("location:inicio.php");
			}
///////Ubica dentro de la tabla torneos a la fila de la Inscripcion por su ID traido de lista_torneos.php/////
				$id=$_REQUEST['id'];
				$consulta_mysqli=sprintf("SELECT * FROM torneos WHERE id='%d'",mysqli_real_escape_string($connection,$id));
				$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
				$rs=mysqli_fetch_array($resultado_consulta_mysql);
				

////// Elimina de la BD: torneos_bd, los torneos que ya se realizaron segun fecha actual /////////
	require 'fecha_torneo.php';
/////////////////////Lee la BD para cargar la lista desplegable de torneos//////////////
				$query= mysqli_query($connection,"SELECT * FROM torneos_db ORDER BY fecha_torneo");
				
			?> 
	<!--  		Carga y muestra el formulario para que el admin edite la inscripcion          -->
		<div>
		<form action="modificar_torneo.php?id=<?php echo $rs['id'];?>" method="POST" name="form 3">
			<div><legend><b>Equipo: <?php echo $rs['equipo'];?></b> </legend></div>
			<br>
			<fieldset>
				<legend>Edicion de Inscipción</legend>	
				<div class="row Torneo">
					<label>Seleccione un Torneo: </label>
					<select name="torneo" size="1" required >
						<option value="">--Seleccionar--</option>
						<?php							
								while ($registro=mysqli_fetch_assoc($query))
								{ 
									//////////////////////// Busca si esta inscrito ya el torneo ///////////////77
									$user=$rs['user'];
									$formato= '%s';
									$fecha=sprintf($formato,$registro['fecha_torneo']);
									$consulta_mysqli=sprintf("SELECT * FROM torneos WHERE torneo='%s'AND user='%s' AND fecha_torneo='%s'",mysqli_real_escape_string($connection,$registro['torneo']),
									mysqli_real_escape_string($connection,$user),
									mysqli_real_escape_string($connection,$fecha));
									$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
									
									if($registro2=mysqli_fetch_array($resultado_consulta_mysql))
									{
										if ($rs['torneo']==$registro2['torneo']AND $rs['fecha_torneo']==$registro2['fecha_torneo'])
											{ ?>	
												<option value="<?php echo $registro['id'];?>">(ACTUAL) <?php echo $registro['torneo'];?>						<?php echo " - &#128197; ".$registro['fecha_torneo'];?></option>
							<?php 			}
									}else

									//if(!$registro2=mysqli_fetch_array($resultado_consulta_mysql))
										{ 
							?>				<option value="<?php echo $registro['id'];?>"><?php echo $registro['torneo'];?>						<?php echo " - &#128197; ".$registro['fecha_torneo'];?></option>
								<?php 	}
								
								} ?>
					</select>
				</div>
				<br>
				<div class="row CantidadP">
					<label for="cantidadp" >Cantidad de Participantes <br></label>
					<input id="cantidadp" type="number" min="1" name="cantidadp" required placeholder="Cantidad de Participantes" maxlength="2" value="<?php echo $rs['cantidadp']; ?>">
				</div>
				<br>
				<div class="Categoria">
					<label for="categoria">Categoria: </label><br>
					<?php if ($rs['categoria']=='Principiante')
							{ ?>
								Principiante<input type="radio" name="categoria" required value="Principiante" checked><br>
								Aficionados<input type="radio" name="categoria" required value="Aficionados"><br>
								Profesionales<input type="radio" name="categoria" required value="Profesionales"><br>
						<?php } ?>
					<?php if ($rs['categoria']=='Aficionados')
						{ ?>
							Principiante<input type="radio" name="categoria" required value="Principiante"><br>
							Aficionados<input type="radio" name="categoria" required value="Aficionados" checked><br>
							Profesionales<input type="radio" name="categoria" required value="Profesionales"><br>
					<?php } ?>
					<?php if ($rs['categoria']=='Profesionales')
						{ ?>
							Principiante<input type="radio" name="categoria" required value="Principiantes"><br>
							Aficionados<input type="radio" name="categoria" required value="Aficionados"><br>
							Profesionales<input type="radio" name="categoria" required value="Profesionales" checked><br>
					<?php } ?>
				</div>
				<br>
				<div>
					<input type="submit" name="modificar" value="Modificar Inscripcion"><br>
					<br><a href="lista_torneos.php">Regresar</a>
				</div>
			</fieldset>
		</form>
		</div>
	</center>
	</body>
</html>