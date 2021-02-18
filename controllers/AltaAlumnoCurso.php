<?php

// controllers/AltaAlumnoCurso.php

require '../fw/fw.php';
require '../models/AlumnoCurso.php';
require '../models/Alumnos.php';
require '../models/Cursos.php';
require '../views/Inscripcion.php';
require '../views/InscripcionOk.php';
require '../views/InscripcionFail.php';


if(isset($_POST['alumno']) && isset($_POST['curso'])){
	//Corregido
	if(!isset($_POST['alumno'])) die("error");
			
	
	$e =  new AlumnoCurso();
	
	if($e->existeAlumnoEnCurso($_POST['alumno'], $_POST['curso'] ) == true){
		
		$v = new InscripcionFail();
		
	}else{
		
		try{$e->inscribirEnCurso($_POST['alumno'], $_POST['curso']);}
		catch(AlumnoCursoException $x){ die("AlumnoCursoException: Hubo un problema");}
	
		$v = new InscripcionOk();
	}
	
	
}
else{
	$e = new Alumnos();
	$f = new Cursos();
	$todos = $e->getTodos();
	$todosf = $f->getTodos();
	
	$v = new Inscripcion();
	$v->alumnos = $todos;
	$v->cursos = $todosf;

}

$v->render();
