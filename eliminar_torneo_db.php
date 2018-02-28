<?php
session_start();
require 'database.php';
	//////////////////////////ELIMINACION DE UNA INSCRIPCION////////////////////
	$id=$_REQUEST['id'];
	//////  ELIMINA FILA   Ubicandola por su ID traido de lista_torneos ////////////
				$SQL ="DELETE FROM torneos_db WHERE id=$id";
					$res=mysqli_query($connection,$SQL);
	/////////////////////// Si elimino la fila carga de nuevo la lista //////////////
				if($res)
				{ 
					header("location:admin_new_torneo.php");
	/////////////////////// Si  Falla eliminacion        //////////////		
				}else{ 
					echo "Eliminacion  Fallo";
					echo"<script>location.href='inicio.php';</script>";
				}
					//header("location:sesion.php");
				
?>