<?php

// controllers/BajaAlumno.php

require '../fw/fw.php';
require '../models/Alumnos.php';
require '../views/BajaAlumno.php';
require '../views/BajaAlumnoOk.php';


if(isset($_POST['matricula'])){
	//Corregido
	if(!isset($_POST['matricula'])) die("error");
	
	$e = new Alumnos();
	try{$e->darBajaAlumno($_POST['matricula']);}
	catch(AlumnosException $x){ die("AlumnosException: Hubo un problema");}
		
	$v = new BajaAlumnoOk();
	
}
else{
	$f = new Alumnos();
	$todos = $f->getTodos();
	
	$v = new BajaAlumno();
	$v->alumnos = $todos;
}

$v->render();
