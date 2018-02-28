<?php
	require 'database.php';
	session_start();
	if (!isset($_SESSION['usuario'])) 
		{ 
				header("location:inicio.php");
		}
	$disciplina		=	filter_input( INPUT_POST,'Disciplina',FILTER_SANITIZE_STRING );
	$fcreacion		=	filter_input( INPUT_POST,'Ftorneo',FILTER_SANITIZE_STRING );

	//////////Busqueda que no exista el torneo y la fecha en la BD ////////////////////
				$consulta_mysqli=sprintf("SELECT * FROM torneos_db WHERE torneo='%s' AND fecha_torneo='%s'",mysqli_real_escape_string($connection,$disciplina),mysqli_real_escape_string($connection,$fcreacion));
				$resultado_consulta_mysql=mysqli_query($connection,$consulta_mysqli);
	/////////////////////// Si existe el torneo recargar pag sesion //////////////////
				if($registro=mysqli_fetch_array($resultado_consulta_mysql))
				{ 
					//echo $registro['NCteam']."";
					echo"<script>alert('Ya existe un Torneo con de esta Disciplina en la misma Fecha');</script>";
					echo"<script>location.href='admin_new_torneo.php';</script>";
	/////////////////////// SI NO EXISTE EL REGISTRO LO CREA //////////////////////////
				}else{
						$SQL = sprintf("INSERT INTO torneos_db(torneo,fecha_torneo) 
										VALUES ('%s','%s')"
										,$disciplina,$fcreacion);
										$res=mysqli_query($connection,$SQL);
						echo"<script>alert('¡Torneo Creado Exitosamente!');</script>";
						echo"<script>location.href='admin_new_torneo.php';</script>";
					//header("location:sesion.php");
					}
?>