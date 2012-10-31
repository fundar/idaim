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
	
	public function getIndices($estado) {
		$query 		= "select Indicador, " . $estado . " from indice  where Type='p';";
		$progresivo = $this->Db->query($query);
		
		$query = "select Indicador, " . $estado . " from indice  where Type='b';";
		$base  = $this->Db->query($query);
		
		$data["progresivo"] = $progresivo[0][$estado];
		$data["base"]       = $base[0][$estado];
		
		return $data;
	}
	
	public function getVariablesP($estado) {
		$query 	    = "select Indicador, " . $estado . " from variablesp where Type='p';";
		$progresivo = $this->Db->query($query);
		
		$query = "select Indicador, " . $estado . " from variablesp where Type='b';";
		$base  = $this->Db->query($query);
		
		foreach($progresivo as $value) $pro[$value["Indicador"]] = $value[$estado];
		foreach($base as $value)       $bas[$value["Indicador"]] = $value[$estado];
		
		$data["progresivo"] = $pro;
		$data["base"]       = $bas;
		
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
}
