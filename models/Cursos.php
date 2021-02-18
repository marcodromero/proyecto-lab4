<?php

// models/Cursos.php

class Cursos extends Model {
	
	public function getTodos(){
		$this->db->query("SELECT c.id_curso, c.curso, a.aula, prof_nombre , prof_apellido, inscriptos
							FROM cursos c
							LEFT JOIN profesores p on p.id_profesor = c.id_profesor
							LEFT JOIN aulas a on a.id_aula = c.id_aula
							LEFT JOIN (SELECT c.id_curso, COUNT(c.id_curso) as 'inscriptos'
							FROM cursos c
							JOIN alumno_curso ac on ac.id_curso = c.id_curso
							JOIN alumnos a on a.matricula = ac.matricula
							GROUP BY c.id_curso) as t on t.id_curso = c.id_curso ");
													  
				return $this->db->fetchAll();
	}
	
	public function darAltaCurso($curso, $id_profesor, $id_aula) {
		//validación de curso
		if(strlen($curso)<1) throw new CursosException();
		if(strlen($curso)>40) throw new CursosException();
		$curso = trim($curso);
		$_curso = $curso;
		
		//validación de profesor 
		if(!ctype_digit($id_profesor)) throw new CursosException();
		if($id_profesor<1) throw new CursosException();
		
		$auxProfesores = new Profesores();
		if(!$auxProfesores->existeProfesor($id_profesor)) throw new CursosException() ;
		$_id_profesor = $id_profesor;
		
		//validación de id_aula
		if(!ctype_digit($id_aula)) throw new CursosException();
		if($id_aula<1) throw new CursosException();
		
		$auxAulas = new Aulas();
		if(!$auxAulas->existeAula($id_aula)) throw new CursosException() ;
		$_id_aula= $id_aula;
		
		//
		$this->db->query("INSERT INTO cursos
						  (curso, id_profesor, id_aula)
						  VALUES('$_curso', $_id_profesor, $_id_aula)");
	}

	public function existeCurso($id_curso){
		//usado en inscribir en curso
		if(!ctype_digit($id_curso)) return false;
		if($id_curso < 1) return false;
		$_id_curso = $id_curso;
		
		//
		$this->db->query("SELECT id_curso
						  FROM cursos
						  WHERE id_curso = $_id_curso" );
						  
		if($this->db->numRows()!=1){
			return false;
		}else		
			return true;
	}
	
}

class CursosException extends Exception{}