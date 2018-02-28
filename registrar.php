<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar</title>
	<!-- Comprueba que la contraseña y confirmacion sean iguales -->
<script> 
function comprobarClave()
{ 
	clave1 = document.form2.pass.value 
	clave2 = document.form2.pass2.value 

	if (clave1 == clave2)
  	document.form2.submit()
	else 
  	alert("Las dos contraseñas son distintas") 
} 
</script>
<!-- ............................................................. --> 
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
        		margin: auto;
        		padding: 10px;
        	}
		input[type="button"]
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
        input[type="button"]:active{
        	transform: scale(0.95);
        }
        .recomendacion {
        	color: #66676A;
        	font-size: 13px;
        	}
	</style>
<center>	
<body>
	<font><h1>Registro Digital de Torneos</h1></font>
	<div>
		<form method="POST" action="registro_users.php" name="form2" >
			<fieldset>          <!-- Creo caja de registro de nuevo usuario -->
				<legend>Registro de nuevo usuario</legend>
				<br>
				<div class="row Nteam">
					<label for="Nteam">Nombre del Equipo</label>
					<input id="Nteam" type="text" name="Nteam"  required placeholder="Ingrese Nombre del Equipo" maxlength="30">
				</div>
				<br>
				<div class="row NCteam">
					<label for="NCteam">Nombre Corto del Equipo</label>
					<input id="NCteam" type="text" name="NCteam" required placeholder="Ingrese Siglas del Equipo" maxlength="5">
				</div>
				<br>
				<div class="row Fcreacion">
					<label for="Fcreacion">Fecha de Creación</label>
					<input id="Fcreacion" type="date" required name="Fcreacion"  >
				</div>
				<br>
				<div class="row Dresponsable">
					<label for="Dresponsable">Dirección del Respónsable del Equipo (Opcional)</label>
					<input id="Dresponsable" type="text" name="Dresponsable" placeholder="Ingrese Direcciòn" maxlength="50">
				</div>
				<br>
				<div class="row email">
					<label for="email">Correo electronico</label>
					<input id="email" type="email" name="email" required placeholder="Ingrese email">
				</div>
				<br>
				<div class="row website">
					<label for="website">Sitio Web (Opcional)</label>
					<input id="website" type="url" name="website" placeholder="https://www.Ejemplo.com">
				<div>
				<br>
				<div class="row user">
					<label for="user">Usuario</label>
					<input id="user" type="text" name="user" required placeholder="Ingrese Usuario" max="20" pattern="\S{5,20}"><br>
					<label class="recomendacion" >(Entre 5 y 15 caracteres Alfa-Numericos)</label>
				</div>
				<br>
				<div class="row pass">
					<label for="pass">Contraseña</label>
					<input id="pass" type="password" name="pass" required placeholder="Ingrese Contraseña" max="20" pattern="\S{5,20}"><br>
					<label class="recomendacion">(Entre 5 y 20 caracteres Alfa-Numericos)</label>
				</div>
				<div class="row pass2">
					<label for="pass">Confirmar Contraseña</label>
					<input id="pass2" type="password" name="pass2" required placeholder="Ingrese Contraseña" max="20" pattern="\S{5,20}"><br>
				</div>
				<br>
				<input type="button" value="Registrar" onClick="comprobarClave()"><br><br>
				<!--	<input type="submit" name="Registrar" value="Registrar"><br><br> -->
					<a href="/Proyecto_Parcial_II/inicio.php">Regresar</a>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</center>
</html>