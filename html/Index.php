<!-- html/Index.php -->
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
	<title>Inicio</title>
	<link href ="estilo.css" rel = "stylesheet" type = "text/css"/>
	<script src="https://kit.fontawesome.com/187a5bbb1c.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class = "pagina-principal">
		 <div class = "index-contenedor">
			<div class = "index-elementos">
			
					<img class = "cabecera__logo--index" src ="logo.png" alt = "Logo" />
				
				
					<div class = "index-opcion"><i class="icono fas fa-info-circle"></i><a  class = "navegacion__enlace" href = "cursos">Ver Cursos</a></div>
					<div class = "index-opcion"><i class="icono fas fa-chalkboard-teacher"></i><a class = "navegacion__enlace" href = "nuevo-curso">Dar de alta Curso</a></div>
					<div class = "index-opcion"><i class="icono fas fa-glasses"></i><a  class = "navegacion__enlace"href = "nuevo-profesor">Dar de alta Profesor</a></div>
					<div class = "index-opcion"><i class="icono fas fa-user-plus"></i><a class = "navegacion__enlace" href = "nuevo-alumno">Dar de alta Alumno</a></div>
					<div class = "index-opcion"><i class="icono fas fa-user-minus"></i><a class = "navegacion__enlace" href = "eliminar-alumno">Dar de baja Alumno</a></div>
					<div class = "index-opcion"><i class="icono fas fa-pencil-alt"></i><a  class = "navegacion__enlace" href = "inscripcion">Inscribir Alumno a Curso</a></div>
					<div class = "index-opcion"><i class="icono far fa-list-alt"></i><a class = "navegacion__enlace" href = "planillas">Ver Alumnos por Curso</a></div>
					<div class = "index-opcion"><i class="icono fas fa-user-edit"></i><a class = "navegacion__enlace" href = "editar-alumno">Modificar datos de Alumno</a></div>
							
				
			</div>
			
		</div>
			
	</div>
</body>
</html>