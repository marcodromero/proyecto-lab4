<?php

// controllers/CategoriasPlanillas.php

require '../fw/fw.php';
require '../models/Cursos.php';
require '../models/Alumnos.php';
require '../models/AlumnoCurso.php';
require '../views/CategoriasPlanillas.php';
require '../views/PlanillaCurso.php';


if(isset($_POST['id_curso']) && isset($_POST['matricula'])){
	if(!isset($_POST['id_curso'])) die("error");
	if(!isset($_POST['matricula'])) die("error");
		
	$b = new AlumnoCurso();
	try{$b->quitarInscripcion($_POST['matricula'], $_POST['id_curso']);}
	catch(AlumnoCursoException $x){ die("AlumnoCursoException: Hubo un problema1");}
	
	$e = new Alumnos();
	try{$todos = $e->getPorCurso($_POST['id_curso']);}
	catch(AlumnosException $x){ die("AlumnosException: Hubo un problema2");}
	
	$v = new PlanillaCurso();
	$v->alumnos = $todos;
}else{

	if( isset($_POST['id_curso']) && !isset($_POST['matricula']) ){
		//Corregido
		if(!isset($_POST['id_curso'])) die("error");
		
		$e = new Alumnos();
		try{$todos = $e->getPorCurso($_POST['id_curso']);}
		catch(AlumnosException $x){ die("AlumnosException: Hubo un problema");}
		
		$v = new PlanillaCurso();
		$v->alumnos = $todos;
		
	}
	else{
		$f = new Cursos();
		$todos = $f->getTodos();

		$v = new CategoriasPlanillas();
		$v->cursos = $todos;
		}
}
	$v->render();