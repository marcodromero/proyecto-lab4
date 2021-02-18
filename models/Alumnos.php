<?php

// models/Alumnos.php

class Alumnos extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT matricula, alum_nombre, alum_apellido, dni, email, telefono
						  FROM alumnos" );
		return $this->db->fetchAll();
	}
	
	public function getPorCurso($id_curso) {
		//Corregido
		if(!ctype_digit($id_curso)) throw new ALumnosException();
		if($id_curso<1) throw new ALumnosException();
		
		$auxCursos = new Cursos();
		if(!$auxCursos->existeCurso($id_curso)) throw new ALumnosException() ;
		$_id_curso = $id_curso;
		
		//
		$this->db->query("SELECT *
						  FROM alumnos
						  JOIN alumno_curso on alumno_curso.matricula = alumnos.matricula
						  WHERE id_curso = $_id_curso" );
		
		return $this->db->fetchAll();
	}
	
	public function contarAlumnosCurso($idCurso) {
			if(!ctype_digit($id_curso)) throw new ALumnosException();
			if($id_curso<1) throw new ALumnosException();
			$_idCurso = $idCurso;
	
			$this->db->query("SELECT alumnos.matricula
						  FROM alumnos
						  JOIN alumno_curso on alumno_curso.matricula = alumnos.matricula
						  WHERE id_curso = $_idCurso" );
		
			return $this->db->numRows();

		}
	
	public function darAltaAlumno($alum_nombre, $alum_apellido, $dni, $email, $telefono) {
		//Corregido
		if(strlen($alum_nombre)<1) throw new ALumnosException();
		if(strlen($alum_nombre)>20) throw new ALumnosException();
		$alum_nombre = trim($alum_nombre);
		$_alum_nombre = $alum_nombre;
		
		if(strlen($alum_apellido)<1) throw new ALumnosException();
		if(strlen($alum_apellido)>20) throw new ALumnosException();
		$alum_apellido = trim($alum_apellido);
		$_alum_apellido = $alum_apellido;
		
		if(!ctype_digit($dni)) throw new ALumnosException();
		if($dni<1) throw new ALumnosException();
		$_dni = $dni;
		
		if(strlen($email)<1) throw new ALumnosException();
		if(strlen($email)>40) throw new ALumnosException();
		$email =  $this->db->escape($email);
		$email = $this->db->escapeWildcards($email);
		$email = trim($email);
		$_email = $email;
		
		if(!ctype_digit($telefono)) throw new ALumnosException();
		if($telefono<1) throw new ALumnosException();
		$_telefono = $telefono;
		
		//
		$this->db->query("INSERT INTO alumnos(alum_nombre, alum_apellido, dni, email, telefono)
						VALUES('$_alum_nombre', '$_alum_apellido', $_dni, '$_email', $_telefono)" );
	}
	
	public function darBajaAlumno($matricula) {
		//Corregido
		if(!ctype_digit($matricula)) throw new ALumnosException();
		if($matricula < 1) throw new ALumnosException();
		
		$auxAlumnos = new Alumnos();
		if(!$auxAlumnos->existeAlumno($matricula)) throw new ALumnosException() ;
		$_matricula = $matricula;
		
		//
		$this->db->query("DELETE
						  FROM alumnos
						  WHERE matricula = $_matricula
						  LIMIT 1"	  
						  );
		
		$this->db->query("DELETE
						  FROM alumno_curso
						  WHERE matricula = $_matricula "	  
						  );
	}
	
	public function getAlumno($matricula) {
		//Corregido
		if(!ctype_digit($matricula)) throw new ALumnosException();
		if($matricula < 1) throw new ALumnosException();
			
		$auxAlumnos = new Alumnos();
		if(!$auxAlumnos->existeAlumno($matricula)) throw new ALumnosException() ;
		$_matricula = $matricula;
			
		//
		$this->db->query("SELECT matricula, alum_nombre, alum_apellido, dni, email, telefono
						  FROM alumnos
						  WHERE matricula = $_matricula" );
						  
		if($this->db->numRows()!=1){
			throw new ValException();
		}else
			return $this->db->fetchAll();
	}
	
	public function existeAlumno($matricula){
		//usado en inscribir en curso
		if(!ctype_digit($matricula)) return false;
		if($matricula < 1) return false;
		$_matricula = $matricula;
		
		//
		$this->db->query("SELECT matricula
						  FROM alumnos
						  WHERE matricula = $_matricula" );
						  
		if($this->db->numRows()!=1){
			return false;
		}else		
			return true;
	}
	
	public function existeAlumnoDni($dni){
		//usado en el controller de alta alumno
		if(!ctype_digit($dni)) throw new ALumnosException();
		if($dni < 1) throw new ALumnosException();
		$_dni = $dni;
		
		//
		$this->db->query("SELECT *
						  FROM alumnos
						  WHERE dni = $_dni" );
						  
		if($this->db->numRows() > 0 ){
			return true;
		}else		
			return false;
	}
	
	public function modAlumno($matricula, $m_apellido, $m_nombre , $m_dni, $m_email, $m_telefono) {
		//Corregido
		if(!ctype_digit($matricula)) throw new ALumnosException();
		if($matricula<1) throw new ALumnosException();
		
		if(strlen($m_apellido)<1) throw new ALumnosException();
		if(strlen($m_apellido)>20) throw new ALumnosException();
		$m_apellido = trim($m_apellido);
		$_m_apellido = $m_apellido;
		
		if(strlen($m_nombre)<1) throw new ALumnosException();
		if(strlen($m_nombre)>20) throw new ALumnosException();
		$m_nombre = trim($m_nombre);
		$_m_nombre = $m_nombre;
		
		if(!ctype_digit($m_dni)) throw new ALumnosException();
		if($m_dni<1) throw new ALumnosException();
		$_m_dni = $m_dni;
		
		if(strlen($m_email)<1) throw new ALumnosException();
		if(strlen($m_email)>40) throw new ALumnosException();
		$m_email = trim($m_email);
		$_m_email = $m_email;
		
		if(!ctype_digit($m_telefono)) throw new ALumnosException();
		if($m_telefono<1) throw new ALumnosException();
		$_m_telefono = $m_telefono;
		
		$auxAlumnos = new Alumnos();
		if(!$auxAlumnos->existeAlumno($matricula)) throw new ALumnosException() ;
		$_matricula = $matricula;
		
		//
		$this->db->query("UPDATE alumnos
						  SET alum_apellido = '$_m_apellido' , alum_nombre = '$_m_nombre', dni = $_m_dni, email = '$_m_email', telefono = $_m_telefono
						  WHERE matricula = $_matricula
						  LIMIT 1");
	}
}

class ALumnosException extends Exception{}