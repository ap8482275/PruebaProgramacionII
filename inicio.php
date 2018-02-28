<?php 
	session_start();
	if (isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']=='admin')
		{
			header("location:sesion_admin.php");
		}else
			{
				header("location:sesion.php");	
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
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
        		display: block;
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
</head>
<center>
<header>
	<font><h1>Registro Digital de Torneos</h1></font>
</hea1der>
<body>
	
	<div>
		<form method="POST" action="inicio_usuario.php" name="form 1" >
			<fieldset>          <!-- Creo caja de iniciar sesion, campos de texto y boton -->
				<legend>Iniciar Sesion</legend>
				<br>
				<div>
					<label for="user"><p>Usuario</p></label>
					<input id="user" type="text" name="usuario" required placeholder="&#128272 Ingrese Usuario" max="20">
				</div>
				<br>
				<div>
					<label for="pass"><p>Contraseña</p></label>
					<input id="pass" type="password" name="contraseña" required placeholder="&#128272 Ingrese Contraseña" max="20">
				</div>
				<br>
				<div>
					<input type="submit" name="Iniciar" class="Iniciar" value="Iniciar">
					<br><br>
					<a href="registrar.php">Registrarse</a>
				</div>
			</fieldset>
		</form>
	</div> 
	</center>	
</body>
</html>