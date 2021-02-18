<?php

// models/Profesores.php

class Profesores extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT id_profesor, prof_nombre, prof_apellido, dni, email, telefono
						  FROM profesores" );
		return $this->db->fetchAll();
	}
	
	public function darAltaProfesor($prof_nombre, $prof_apellido, $dni, $email, $telefono) {
		//Corregido
		if(strlen($prof_nombre)<1) throw new ProfesoresException();
		if(strlen($prof_nombre)>20) throw new ProfesoresException();
		$prof_nombre = trim($prof_nombre);
		$_prof_nombre = $prof_nombre;
		
		if(strlen($prof_apellido)<1) throw new ProfesoresException();
		if(strlen($prof_apellido)>20) throw new ProfesoresException();
		$prof_apellido = trim($prof_apellido);
		$_prof_apellido = $prof_apellido;
		
		if(!ctype_digit($dni)) throw new ProfesoresException();
		if($dni < 1) throw new ProfesoresException();
		$_dni = $dni;
		
		if(strlen($email)<1) throw new ProfesoresException();
		if(strlen($email)>40) throw new ProfesoresException();
		$email = trim($email);
		$_email= $email;
		
		if(!ctype_digit($telefono)) throw new ProfesoresException();
		if($telefono < 1) throw new ProfesoresException();
		$_telefono = $telefono;
	
		$this->db->query("INSERT INTO profesores (prof_nombre, prof_apellido, dni, email, telefono)
						  VALUES ('$_prof_nombre', '$_prof_apellido', $_dni, '$_email', $_telefono )" );
	}
	
	public function existeProfesor($id_profesor){
		//usado en alta curso
		if(!ctype_digit($id_profesor)) throw new ProfesoresException();
		if($id_profesor < 1) throw new ProfesoresException();
		$_id_profesor = $id_profesor;
		
		//
		$this->db->query("SELECT id_profesor
						  FROM profesores
						  WHERE id_profesor = $_id_profesor" );
						  
		if($this->db->numRows()!=1){
			return false;
		}else		
			return true;
	}
	
	public function existeProfesorDni($dni){
		//usado en controllador
		if(!ctype_digit($dni)) throw new ProfesoresException();
		if($dni < 1) throw new ProfesoresException();
		$_dni = $dni;
		
		//
		$this->db->query("SELECT *
						  FROM profesores
						  WHERE dni = $_dni" );
						  
		if($this->db->numRows() > 0 ){
			return true;
		}else		
			return false;
	}

}

class ProfesoresException extends Exception{}