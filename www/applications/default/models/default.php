<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Default_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		
		$this->helpers();
	
		$this->table = "variablesi";
	}
	
	public function indice($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from variablesp where Indicador in (";
		
		$data  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "1,2,3);");
		
		return $data;
	}
}
