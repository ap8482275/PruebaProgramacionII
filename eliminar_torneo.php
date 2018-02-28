<?php
session_start();
require 'database.php';
	//////////////////////////ELIMINACION DE UNA INSCRIPCION////////////////////7
	//print_r($_POST);
	//var_dump($_POST);
	//$user=$_REQUEST['user'];
	$id=$_REQUEST['id'];
	//$user 			=	$_SESSION['usuario'];
	//$equipo 		=	$_SESSION['Nteam'];

	//////  ELIMINA FILA   Ubicandola por su ID traido de lista_torneos ////////////
				$SQL ="DELETE FROM torneos WHERE id=$id";
					$res=mysqli_query($connection,$SQL);
	/////////////////////// Si elimino la fila carga de nuevo la lista //////////////
				if($res)
				{ 
					header("location:lista_torneos.php");
	/////////////////////// Si  Falla eliminacion        //////////////		
				}else{ 
					echo "Eliminacion  Fallo";
					echo"<script>location.href='inicio.php';</script>";
				}

					//header("location:sesion.php");
				
?>