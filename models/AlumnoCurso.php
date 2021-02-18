<?php

// models/AlumnoCurso.php

class AlumnoCurso extends Model {
	
	public function inscribirEnCurso($matricula, $id_curso) {
		//Corregido
		
		//Validación alumno
		if(!ctype_digit($matricula)) throw new AlumnoCursoException();
		if($matricula<1) throw new AlumnoCursoException();
	
		$auxAlumnos = new Alumnos();
		if(!$auxAlumnos->existeAlumno($matricula)) throw new AlumnoCursoException() ;
		$_matricula = $matricula;
		
		//Validación curso
		if(!ctype_digit($id_curso)) throw new AlumnoCursoException();
		if($id_curso<1) throw new AlumnoCursoException();
		
		$auxCursos = new Cursos();
		if(!$auxCursos->existeCurso($id_curso)) throw new AlumnoCursoException() ;
		$_id_curso = $id_curso;
		
		//
		$c = new AlumnoCurso();
		$ci = $c->contarInscriptos($_id_curso);
		
		if( $ci > 10 ){
			throw new AlumnoCursoException();
		}else{
		    $this->db->query("INSERT INTO alumno_curso (matricula, id_curso)
							  VALUES($_matricula, $_id_curso)");
			}	
		
	}
	
	public function contarInscriptos($id_cursox){
			
			if(!ctype_digit($id_cursox)) throw new ALumnosException();
			if($id_cursox<1) throw new ALumnosException();
			$_id_cursox = $id_cursox;
		
			$this->db->query("SELECT *
							 FROM alumno_curso ac
							WHERE ac.id_curso = $_id_cursox");
							
							return $this->db->numRows();
							
	}
	
	public function existeAlumnoEnCurso($matricula, $id_curso ){
		
		//Validación alumno
		if(!ctype_digit($matricula)) throw new AlumnoCursoException();
		if($matricula<1) throw new AlumnoCursoException();
	
		$auxAlumnos = new Alumnos();
		if(!$auxAlumnos->existeAlumno($matricula)) throw new AlumnoCursoException() ;
		$_matricula = $matricula;
		
		//Validación curso
		if(!ctype_digit($id_curso)) throw new AlumnoCursoException();
		if($id_curso<1) throw new AlumnoCursoException();
		$_id_curso = $id_curso;
		
		$this->db->query("SELECT *
						 FROM alumno_curso ac
						WHERE (ac.matricula = $_matricula) && (ac.id_curso = $_id_curso)");		
						
						if($this->db->numRows() > 0){
							return true;
						}else{
							return false;
						}
	}

	public function quitarInscripcion($matricula, $id_curso){
		if(!ctype_digit($matricula)) throw new AlumnoCursoException();
		if($matricula<1) throw new AlumnoCursoException();
		$_matricula = $matricula;
		
		if(!ctype_digit($id_curso)) throw new AlumnoCursoException();
		if($id_curso<1) throw new AlumnoCursoException();
		$_id_curso = $id_curso;
		
		$this->db->query("DELETE
						 FROM alumno_curso
						 WHERE (matricula = $_matricula) && (id_curso = $_id_curso)
						 LIMIT 1");
	}

	
}

class AlumnoCursoException extends Exception{}