<?php
require 'database.php';


///////////////////// Crea el Usuario ////////////////////////////////////////////////////////
	$Nteam			=	filter_input( INPUT_POST,'Nteam',FILTER_SANITIZE_STRING );
	$NCteam			=	filter_input( INPUT_POST,'NCteam',FILTER_SANITIZE_STRING );
	$Fcreacion		=	filter_input( INPUT_POST,'Fcreacion',FILTER_SANITIZE_STRING );
	$Dresponsable	=	filter_input( INPUT_POST,'Dresponsable',FILTER_SANITIZE_STRING );
	$email			=	filter_input( INPUT_POST,'email',FILTER_SANITIZE_STRING );
	$website		=	filter_input( INPUT_POST,'website',FILTER_SANITIZE_STRING );
	$user			=	filter_input( INPUT_POST,'user',FILTER_SANITIZE_STRING );
	$pass			=	filter_input( INPUT_POST,'pass',FILTER_SANITIZE_STRING );

	///////////// Busca que no exista el usuario o el nombre del equipo en el registro //////////
			$consulta_mysqli=sprintf("SELECT * FROM registro_users WHERE user='%s' OR Nteam='%s'",
									mysqli_real_escape_string($connection,$user),
									mysqli_real_escape_string($connection,$Nteam));
			$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
	/////////////////////// Si existe el usuario o el equipo recargar registar.php //////////////
				if($registro=mysqli_fetch_array($resultado_consulta_mysql))
				{
					echo"<script>alert('Usuario o Equipo ya registrado');</script>";
						echo"<script>location.href='registrar.php';</script>";
	/////////////////////// SI NO EXISTE EL REGISTRO LO CREA //////////////		
				}else{if (empty($user))
						{
							echo"<script>location.href='registrar.php';</script>";
						}else{
								$SQL = sprintf("INSERT INTO registro_users(Nteam,NCteam,Fcreacion,Dresponsable,email,website,user,pass) 
												VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')"
												,$Nteam,$NCteam,$Fcreacion,$Dresponsable,$email,$website,$user,$pass);
								$res=mysqli_query($connection,$SQL);
								echo"<script>alert('¡Usuario Registrado Exitosamente!');</script>";
								echo"<script>location.href='inicio.php';</script>";
							}
					}

?>


