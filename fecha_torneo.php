<?php
require 'database.php';
	if (!isset($_SESSION['usuario'])) 
		{ 
				header("location:inicio.php");
		}
////// Elimina de la BD: torneos_bd, los torneos que ya se realizaron segun fecha actual /////////
		$año1= date("Y");
		$mes1= date("m");
		$dia1= date("d");
		$formato1= '%s-%s-%s';
		$fecha1= sprintf($formato1,$año1,$mes1,$dia1);
		//echo $fecha1;
		$queryfecha= mysqli_query($connection,"SELECT * FROM torneos_db");
		while ($row=mysqli_fetch_assoc($queryfecha)) 
		{
			$formato2= '%s';
			$fecha2= sprintf($formato2,$row['fecha_torneo']);
			//echo $fecha2;
			$partes_fecha= explode("-", $fecha2);
			$año2=$partes_fecha[0];
			//echo "año2: $año2";
			$mes2=$partes_fecha[1];
			//echo "mes2: $mes2";
			$dia2=$partes_fecha[2];
			//echo "dia2: $dia2";
			$id=$row['id'];
			if (($año1-$año2)>0) 
			{
				$SQL ="DELETE FROM torneos_db WHERE id=$id";
				$res=mysqli_query($connection,$SQL);
			}else{if (($año1-$año2)==0) 
					{if (($mes1-$mes2)>0) 
						{
							$SQL ="DELETE FROM torneos_db WHERE id=$id";
							$res=mysqli_query($connection,$SQL);
						}else{if (($mes1-$mes2)==0) 
								{if (($dia1-$dia2)>0) 
									{
										$SQL ="DELETE FROM torneos_db WHERE id=$id";
										$res=mysqli_query($connection,$SQL);
									}//if
								}//if
							}//else	
					}//if
				}//else
		}//while
?>
