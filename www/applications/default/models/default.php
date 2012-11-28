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
	
	public function getIndices($estado, $type = "p") {
		$query = "select Indicador, Description, " . $estado . " from indice  where Type='" . $type . "';";
		$result  = $this->Db->query($query);
		
		$data["desc"]  = $result[0]["Description"];
		$data["color"] = $this->color($this->convert($result[0][$estado]));
		$data["level"] = 1;
		$data["value"] = $this->convert($result[0][$estado]);
		
		return $data;
	}
	
	public function getVariablesP($estado, $type = "p") {
		$query 	= "select Indicador, Description, " . $estado . " from variablesp where Type='" . $type . "';";
		$result = $this->Db->query($query);
		
		foreach($result as $value) {
			$data[$value["Indicador"]]["desc"]  = $value["Description"];
			$data[$value["Indicador"]]["color"] = $this->color($this->convert($value[$estado]));
			$data[$value["Indicador"]]["level"] = 2;
			$data[$value["Indicador"]]["value"] = $this->convert($value[$estado]);
		}
		
		return $data;
	}
	
	public function getVariablesI($estado, $type = "p") {
		$query  = "select Indicador, Description, " . $estado . " from variablesi where Type='" . $type . "';";
		$result = $this->Db->query($query);
		
		foreach($result as $value) {
			$data[$value["Indicador"]]["desc"]  = $value["Description"];
			$data[$value["Indicador"]]["color"] = $this->color($this->convert($value[$estado]));
			$data[$value["Indicador"]]["level"] = 3;
			$data[$value["Indicador"]]["value"] = $this->convert($value[$estado]);
		}
		
		return $data;
	}
	
	public function getIndicadores($estado, $type = "p") {
		$query  = "select Indicador, Description, " . $estado . " from indicadores where Type='" . $type . "';";
		$result = $this->Db->query($query);

		foreach($result as $value) {
			$data[$value["Indicador"]]["desc"]  = $value["Description"];
			$data[$value["Indicador"]]["color"] = $this->color($this->convert($value[$estado]));
			$data[$value["Indicador"]]["level"] = 4;
			$data[$value["Indicador"]]["value"] = $this->convert($value[$estado]);
		}
		
		return $data;
	}
	
	public function convert($data) {
		return substr($data * 10, 0, 3);
	}
	
	public function color($value) {
		if($value>=9 and $value<=10)  return "#79c452";
		if($value>=8 and $value<=8.9) return "#388652";
		if($value>=7 and $value<=7.9) return "#ebd06e";
		if($value>=6 and $value<=6.9) return "#df6c4f";
		if($value>=0 and $value<=5.9) return "#de2b33";
		
		return "#ccc";
		
		/*
		0 a 5.99
		6.00 a 6.99
		7.00 a 7.99
		8.00 a 8.99
		9 a 10
		*/
	}
}
