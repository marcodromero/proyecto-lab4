<!-- html/PlanillaCurso.php -->
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
	<title>Alumnos por Curso</title>
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
					<p class = "cabecera__texto" id = "username"> 🟢 <?= $_SESSION['nombre'] ?> |  <a class = "cabecera__enlace" id = "logout" href = "../html/Logout.php">Cerrar sesión</a></p>
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
				
				<div class = "tabla">
					<h1 class = "titulo">Alumnos por curso</h1>
					<table class = "tabla__elementos">
						<tr class = "tabla__cabecera"><th>Matricula</th><th>Alumno</th><th></th></tr>

						<?php foreach($this->alumnos as $e) { ?>
						<tr class = "tabla__fila"><td><?= $e['matricula'] ?></td> <td><?= $e['alum_apellido'] . ", " . $e['alum_nombre'] ?></td>
						<td>
							<form action = "" method = "post">
								<input type="hidden" name = "matricula" value = "<?= $e['matricula'] ?>" id = "matricula" />
								<input type="hidden" name = "id_curso" value = "<?= $_POST['id_curso'] ?>" id = "id_curso" />
								<button class = "boton-eliminar" type="submit">Eliminar</button>
							</form>
						</td>
						</tr>
						<?php } ?>
					</table>
					
					<a class = "boton-continuar" href = "planillas">Nueva consulta</a>
				</div>
				
				<div class = "espacio-vacio"></div>
				
			</div>
			
			
	</div>
</body>
</html>