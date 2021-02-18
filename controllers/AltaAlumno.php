<?php

// controllers/AltaAlumno.php

require '../fw/fw.php';
require '../models/Alumnos.php';
require '../views/AltaAlumno.php';
require '../views/AltaAlumnoOk.php';
require '../views/AltaAlumnoFail.php';


if(isset($_POST['alum_nombre'])){
	//Corregido
	if(!isset($_POST['alum_nombre'])) die("Error");
	if(!isset($_POST['alum_apellido'])) die("Error");
	if(!isset($_POST['dni'])) die("Error");
	if(!isset($_POST['email'])) die("Error");
	if(!isset($_POST['telefono'])) die("Error");
		
	$e =  new Alumnos();
	
	if($e->existeAlumnoDni($_POST['dni'])){
		
		$v = new AltaAlumnoFail();
		
	}else{
		try{ $e->darAltaAlumno($_POST['alum_nombre'], $_POST['alum_apellido'], $_POST['dni'], $_POST['email'], $_POST['telefono'] ); }
		catch(AlumnosException $x){ die("AlumnosException: Hubo un problema");}
		
		$v = new AltaAlumnoOk();
	}
	
}
else{
	$v = new AltaAlumno();

}

$v->render();
