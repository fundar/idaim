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
	
	public function getIndice($estado, $type = "p") {
		$query = "select Indicador, " . $estado . " from indice where Type='" . $type . "';";
		$data  = $this->Db->query($query);
		
		return $data;
	}
	
	public function getIndices($estado) {
		$query 		= "select Indicador, " . $estado . " from indice  where Type='p';";
		$progresivo = $this->Db->query($query);
		
		$query = "select Indicador, " . $estado . " from indice  where Type='b';";
		$base  = $this->Db->query($query);
		
		$data["progresivo"] = $progresivo[0][$estado];
		$data["base"]       = $base[0][$estado];
		
		return $data;
	}
	
	public function getVariablesP() {
		select Indicador, Type, Aguascalientes, BC, Guanajuato, Colima, DF from variablesp where Type='b';
	}
	
	public function getVariablesI() {
		select Indicador, Type, Aguascalientes, Guanajuato, Colima, DF from variablesi where Type='b';
	}
}
