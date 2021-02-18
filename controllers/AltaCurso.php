<?php

// controllers/AltaCursosphp

require '../fw/fw.php';
require '../models/Aulas.php';
require '../models/Profesores.php';
require '../models/Cursos.php';
require '../views/AltaCurso.php';
require '../views/AltaCursoOk.php';


if(isset($_POST['curso'])){
	//Corregido
	if(!isset($_POST['curso'])) die("error");
	if(!isset($_POST['profesor'])) die("error");
	if(!isset($_POST['aula'])) die("error");
	
	$e = new Cursos();
	try{$e->darAltaCurso($_POST['curso'], $_POST['profesor'],$_POST['aula']);}
	catch(CursosException $x){ die("CursosException: Hubo un problema");}
	
	$v = new AltaCursoOk();
	
}
else{
	$e = new Aulas();
	$f = new Profesores();
	$todosAulas = $e->getTodos();
	$todosProfesores  = $f->getTodos();
	
	$v = new AltaCurso();
	$v->aulas = $todosAulas;
	$v->profesores = $todosProfesores;
}

$v->render();
