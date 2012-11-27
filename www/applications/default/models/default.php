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
		$data  = $this->Db->query($query);
		
		$data["text"]  = $data[0]["Description"];
		$data["desc"]  = $data[0]["Description"];
		$data["color"] = $this->color($this->convert($data[0][$estado]));
		$data["level"] = 1;
		$data["value"] = $this->convert($data[0][$estado]);
		____($data);
		return $data;
	}
	
	public function getVariablesP($estado, $type = "p") {
		$query 	= "select Indicador, " . $estado . " from variablesp where Type='" . $type . "';";
		$result = $this->Db->query($query);
		
		foreach($result as $value) $data[$value["Indicador"]] = $value[$estado];
		____($data);
		
		return $data;
	}
	
	public function getVariablesI($estado) {
		$query = "select Indicador, " . $estado . " from variablesi where Type='p';";
		$progresivo = $this->Db->query($query);
		
		$query = "select Indicador, " . $estado . " from variablesi where Type='b';";
		$base = $this->Db->query($query);
		
		
		foreach($progresivo as $value) $pro[$value["Indicador"]] = $value[$estado];
		foreach($base as $value)       $bas[$value["Indicador"]] = $value[$estado];
		
		$data["progresivo"] = $pro;
		$data["base"]       = $bas;
		
		return $data;
	}
	
	public function getIndicadores($estado) {
		$query = "select Indicador, " . $estado . " from indicadores where Type='p';";
		$progresivo = $this->Db->query($query);
		
		$query = "select Indicador, " . $estado . " from indicadores where Type='b';";
		$base  = $this->Db->query($query);
		
		foreach($progresivo as $value) $pro[$value["Indicador"]] = $value[$estado];
		foreach($base as $value)       $bas[$value["Indicador"]] = $value[$estado];
		
		$data["progresivo"] = $pro;
		$data["base"]       = $bas;
		
		return $data;
	}
	
	public function convert($data) {
		return substr($data * 10, 0, 3);
	}
	
	public function color($value) {
		if($value>=9 and $value<=10) return "#388652";
		if($value>=7 and $value<=8.9) return "#79c452";
		if($value>=5 and $value<=6.9) return "#ebd06e";
		if($value>=3 and $value<=4.9) return "#df6c4f";
		if($value>=0 and $value<=2.9) return "#de2b33";
		
		return "#ccc";
	}
}
