<!-- html/Login.php -->
<?php


	session_start();
	$cn = mysqli_connect("localhost", "root", "", "instituto");
	
	if(count($_POST) > 0){
		
		$email =  $_POST['email'];
		$passwd =  sha1($_POST['passwd']);
		
		$res = mysqli_query($cn, "SELECT *
									FROM usuarios
									WHERE email = '$email' and password = '$passwd'
									LIMIT 1 ");
		
		if(mysqli_num_rows($res)==1){
			$_SESSION['logueado'] = true;
			$fila = mysqli_fetch_assoc($res);
			$_SESSION['nombre'] = $fila['nombre'];
			header("Location: index");
			exit;
		}
	}
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href ="estilo.css" rel = "stylesheet" type = "text/css"/>
</head>
<body>
<div class = "pagina-login">
	
	<div class = "formulario--login">
		<img class = "cabecera__logo--index" src ="logo.png" alt = "Logo" />
		<form class = "formulario__elementos" action= "" method = "post">
				<input class = "formulario__entrada-texto" type = "email" name = "email" placeholder = "Email"  required />
				<input class = "formulario__entrada-texto" type = "password" name = "passwd" placeholder = "Contraseña"  required />
				<button type = "submit" class = "boton-enviar">Iniciar sesion</button>

		</form>
	</div>
</div>
</body>
</html>