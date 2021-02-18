<?php

// models/Aulas.php

class Aulas extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT id_aula, aula
						  FROM aulas" );
		return $this->db->fetchAll();
	}
	
	public function existeAula($id_aula){
		//usado en inscribir en curso
		if(!ctype_digit($id_aula)) return false;
		if($id_aula < 1) return false;
		$_id_aula = $id_aula;
		
		//
		$this->db->query("SELECT id_aula
						  FROM aulas
						  WHERE id_aula = $_id_aula" );
						  
		if($this->db->numRows()!=1){
			return false;
		}else		
			return true;
	}


}