<?php 
require 'database.php';
session_start();

	$user			=	filter_input( INPUT_POST,'usuario',FILTER_SANITIZE_STRING );
	$pass			=	filter_input( INPUT_POST,'contraseña',FILTER_SANITIZE_STRING );

	/////////////////////// Busqueda que no exista el usuario en el registro ////////////////////
		
			$consulta_mysqli=sprintf("SELECT * FROM registro_users WHERE user='%s' AND pass='%s'",
									mysqli_real_escape_string($connection,$user),
									mysqli_real_escape_string($connection,$pass));
			$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
	/////////////////////// si usuario y contraseña son correctos incia //////////////
				if($registro=mysqli_fetch_array($resultado_consulta_mysql))
				{ 
					if ($registro['user']=='admin') 
					{
						$_SESSION["usuario"]=$user;
						header("location:sesion_admin.php");
					}else
						{
							$_SESSION["usuario"]=$user;
							$_SESSION["Nteam"]=$registro['Nteam'];
							header("location:sesion.php");
						}
	/////////////////////// Rechaza el inicio de sesion //////////////		
				}else{
					$consulta_mysqli=sprintf("SELECT * FROM registro_users WHERE user='%s'",
									mysqli_real_escape_string($connection,$user));
					$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
	/////////////////////// si usuario y contraseña son correctos incia //////////////
					if($registro=mysqli_fetch_array($resultado_consulta_mysql))
					{
				
						echo"<script>alert('Contraseña Invalida');</script>";
						echo"<script>location.href='inicio.php';</script>";
				
					}else
					{
				
						echo"<script>alert('Usuario incorrecto o no registrado');</script>";
						echo"<script>location.href='inicio.php';</script>";
						
				
					}
				}
				?>

