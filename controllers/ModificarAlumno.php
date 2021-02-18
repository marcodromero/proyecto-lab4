<?php

// controllers/ModificarAlumno.php

require '../fw/fw.php';
require '../models/Alumnos.php';
require '../views/ModificarAlumno.php';
require '../views/FormModAlumno.php';
require '../views/FormModAlumnoOk.php';

if( isset($_POST['matricula']) && isset($_POST['modalumno_apellido']) && isset($_POST['modalumno_dni']) && isset($_POST['modalumno_email']) && isset($_POST['modalumno_telefono'])){
	//Corregido
	if(!isset($_POST['matricula'])) die("error");
	if(!isset($_POST['modalumno_apellido'])) die("error");
	if(!isset($_POST['modalumno_nombre'])) die("error");
	if(!isset($_POST['modalumno_dni'])) die("error");

	$e = new Alumnos();
	try{$e->modAlumno($_POST['matricula'], $_POST['modalumno_apellido'], $_POST['modalumno_nombre'], $_POST['modalumno_dni'] , $_POST['modalumno_email'], $_POST['modalumno_telefono']);}
	catch(AlumnosException $x){ die("AlumnosException: Hubo un problema");}
	
	$v = new FormModAlumnoOk();
}

if(isset($_POST['matricula']) && !isset($_POST['modalumno_apellido'])){
	//Corregido
	if(!isset($_POST['matricula'])) die("error");
	
	$e = new Alumnos();
	try{$a = $e->getAlumno($_POST['matricula']);}
	catch(AlumnosException $x){ die("AlumnosException: Hubo un problema");}
	
	$v = new FormModAlumno();
	$v->alumnos = $a;
	
	
}

if((!isset($_POST['matricula'])) && (!isset($_POST['modalumno_apellido']))){
	
	$e = new Alumnos();
	$todos = $e->getTodos();
	

	$v = new ModificarAlumno();
	$v->alumnos = $todos;
}
	
$v->render();


