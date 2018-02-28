<?php
session_start();
require 'database.php';
	if (!isset($_SESSION['usuario'])) 
		{ 
				header("location:inicio.php");
		}else{
	
				$id				=	filter_input( INPUT_POST,'torneo',FILTER_SANITIZE_STRING );
				$cantidadp		=	filter_input( INPUT_POST,'cantidadp',FILTER_SANITIZE_STRING );
				$categoria		=	filter_input( INPUT_POST,'categoria',FILTER_SANITIZE_STRING );
				$user 			=	$_SESSION['usuario'];
				$equipo 		=	$_SESSION['Nteam'];

				$query= sprintf("SELECT * FROM torneos_db WHERE id='%d'",mysqli_real_escape_string($connection,$id));
				$resultado=mysqli_query($connection,$query);
				
				if($registro=mysqli_fetch_array($resultado))
							{ 
								$torneo=$registro['torneo'];
								$formato= '%s';
								$fecha_torneo=sprintf($registro['fecha_torneo']);
							}
				
									$SQL = sprintf("INSERT INTO torneos(user,equipo,torneo,fecha_torneo,cantidadp,categoria) 
													VALUES ('%s','%s','%s','%s','%s','%s')"
													,$user,$equipo,$torneo,$fecha_torneo,$cantidadp,$categoria);
													$res=mysqli_query($connection,$SQL);
									echo"<script>alert('¡Torneo Inscrito Exitosamente!');</script>";
									echo"<script>location.href='sesion.php';</script>";
			}
					