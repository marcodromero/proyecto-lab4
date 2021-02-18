<!-- html/Inscripcion.php -->
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
	<title>Inscripcion a curso</title>
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
					<h1 class = "titulo">Inscribir alumno a curso</h1>
					<form class = "formulario__elementos" action = "" method = "post" id = "formInscripcion">
	
						<select class = "formulario__selector" name ="alumno" id = "alumno">
							<option value = ""> Seleccione alumno </option>
						<?php foreach($this->alumnos as $a){ ?>
							<option value = "<?=$a['matricula'] ?>"> <?= $a['alum_apellido'] . ", " . $a['alum_nombre'] ?> </option>
						<?php } ?>
						</select>

						<select class = "formulario__selector" name ="curso" id = "curso">
							<option value = ""> Seleccione curso </option>
						<?php foreach($this->cursos as $a){ 
							if($a['inscriptos'] < 10){ ?>
							<option value = "<?=$a['id_curso'] ?>"> <?= $a['curso'] ?> </option>
						<?php }
							} ?>
						</select>

						<button class = "boton-enviar" type="submit"> Enviar </button>
					</form>
				</div>
				
				<div class = "espacio-vacio"></div>
				
			</div>
			
			
	</div>

<script>
"use strict"

	document.getElementById("formInscripcion").onsubmit = function(){
		var alumno = document.getElementById("alumno").value;
		var curso = document.getElementById("curso").value;

	
		if((alumno == "") || (curso == "")){
			alert("Complete todos los campos del formulario");
			return false;
		}
		
	}

</script>
</body>
</html>