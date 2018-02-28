<?php
session_start();
require 'database.php';
//////////////////////////////////////Modifica fila de la tabla torneos segun su ID traido de editar_torneo///////////////////////////////
	//print_r($_POST);
	//var_dump($_POST);
	//$user=$_REQUEST['user'];
	$id=$_REQUEST['id'];
	echo "$id";
	$idtorneo		=	filter_input( INPUT_POST,'torneo',FILTER_SANITIZE_STRING );
	$cantidadp		=	filter_input( INPUT_POST,'cantidadp',FILTER_SANITIZE_STRING );
	$categoria		=	filter_input( INPUT_POST,'categoria',FILTER_SANITIZE_STRING );

	////////////////////////////////////por el id enviado del form busca el torneo a modificar para el UPDATE  //////////////////////////
	$query= sprintf("SELECT * FROM torneos_db WHERE id='%d'",mysqli_real_escape_string($connection,$idtorneo));
	$resultado=mysqli_query($connection,$query);
	if($registro=mysqli_fetch_array($resultado))
				{ 
					$torneo=$registro['torneo'];
					$formato= '%s';
					$fecha_torneo=sprintf($registro['fecha_torneo']);
				}

						$SQL ="UPDATE torneos SET torneo='$torneo',fecha_torneo='$fecha_torneo', cantidadp='$cantidadp', categoria='$categoria' WHERE id=$id";
						$res=mysqli_query($connection,$SQL);
					
	/////////////////////// Si MODIFICO EL REGISTRO REGRESA A LA LISTA //////////////
				if($res)
				{ 
					echo"<script>alert('Modificacion Exitosa');</script>";
					echo"<script>location.href='lista_torneos.php';</script>";
	/////////////////////// SI NO EXISTE EL REGISTRO REDIRECCIONA A PAGINA PRICIPAL DE ADMINISTRADOR //////////////		
				}else{
					echo"<script>alert('Modificacion Fallo Posiblemente no existe registro');</script>";
					echo"<script>location.href='lista_torneos.php';</script>";
					//header("location:sesion_admin.php");
				}
				
?>