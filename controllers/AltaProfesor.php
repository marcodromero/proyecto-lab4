<?php

// controllers/AltaProfesor.php

require '../fw/fw.php';
require '../models/Profesores.php';
require '../views/AltaProfesor.php';
require '../views/AltaProfesorOk.php';
require '../views/AltaProfesorFail.php';


if(isset($_POST['prof_nombre'])){
	//Corregido
	if(!isset($_POST['prof_nombre'])) die("error");
	if(!isset($_POST['prof_apellido'])) die("error");
	if(!isset($_POST['dni'])) die("error");
	if(!isset($_POST['email'])) die("error");
	if(!isset($_POST['telefono'])) die("error");
			
	$e =  new Profesores();
	
	if($e->existeProfesorDni($_POST['dni'])){
		
		$v = new AltaProfesorFail();
		
	}else{
		
		try{$e->darAltaProfesor($_POST['prof_nombre'], $_POST['prof_apellido'], $_POST['dni'], $_POST['email'], $_POST['telefono'] );}
		catch(ProfesoresException $x){ die("ProfesoresException: Hubo un problema");}
		
		$v = new AltaProfesorOk();
	}
	
	
	
	
	

}
else{
	$v = new AltaProfesor();

}

$v->render();
