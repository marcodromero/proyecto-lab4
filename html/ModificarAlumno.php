<!-- html/ListaAlumnos.php -->
<?php
	
	session_start();
	if(!isset($_SESSION['logueado'])){
		header("Location: login");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar datos de Alumnos</title>
	<link href ="estilo.css" rel = "stylesheet" type = "text/css"/>
	<script src="https://kit.fontawesome.com/187a5bbb1c.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class = "pagina-consultas">
		 
			<div class = "cabecera">
				<div class = "cabecera__contenedor-logo">
					<a href = "index"><img class = "cabecera__logo" src ="logo.png" alt = "Logo" /></a>
				</div>
				<div class = "cabecera__contenedor-sesion">
					<p class = "cabecera__texto" id = "username"> 🟢 <?= $_SESSION['nombre'] ?> |  <a class = "cabecera__enlace" id = "logout" href = "logout">Cerrar sesión</a></p>
				</div>
			</div>
			
			<div class = "contenedor-medio">
				<div class = "navegacion">
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-info-circle"></i><a  class = "navegacion__enlace" href = "cursos">Ver Cursos</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-chalkboard-teacher"></i><a class = "navegacion__enlace" href = "nuevo-curso">Dar de alta Curso</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-glasses"></i><a  class = "navegacion__enlace"href = "nuevo-profesor">Dar de alta Profesor</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-user-plus"></i><a class = "navegacion__enlace" href = "nuevo-alumno">Dar de alta Alumno</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-user-minus"></i><a class = "navegacion__enlace" href = "eliminar-alumno">Dar de baja Alumno</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-pencil-alt"></i><a  class = "navegacion__enlace" href = "inscripcion">Inscribir Alumno a Curso</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono far fa-list-alt"></i><a class = "navegacion__enlace" href = "planillas">Ver Alumnos por Curso</a></div>
					<div class = "navegacion__contenedor-enlace"><i class="icono fas fa-user-edit"></i><a class = "navegacion__enlace" href = "editar-alumno">Modificar datos de Alumno</a></div>
				</div>
				
				<div class = "formulario">
					<h1 class = "titulo">Modificar datos de Alumnos</h1>
					<form class = "formulario__elementos" action = "" method = "post" id = "formMod">
						<select class = "formulario__selector" name ="matricula" id = "matricula">
							<option value = ""> Seleccione alumno </option>
						<?php foreach($this->alumnos as $e) { ?>
							<option value = "<?= $e['matricula'] ?>"> <?= $e['alum_apellido'] . ", " . $e['alum_nombre'] ?> </option>
						<?php } ?>
						</select>
						
						<button class = "boton-enviar" type="submit"> Enviar </button>
					</form>
				</div>
				
				<div class = "espacio-vacio"></div>
				
			</div>
			
			
	</div>

<script>
"use strict"

	document.getElementById("formMod").onsubmit = function(){
		var matricula = document.getElementById("matricula").value;

		if(matricula == ""){
			alert("Seleccione un alumno");
			return false;
		}
		
	}

</script>
</body>
</html>