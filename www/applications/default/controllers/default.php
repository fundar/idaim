<?php
/**
 * Access from index.php:
 */


class Default_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates     = $this->core("Templates");
		$this->Default_Model = $this->model("Default_Model");
		
		$this->Templates->theme();
		
		$this->estados = array("Aguascalientes","BC","BCS","Campeche","Chiapas","Chihuahua","Coahuila","Colima","DF","Durango","Mexico","Guanajuato","Guerrero","Hidalgo","Jalisco","Michoacan","Morelos","Nayarit","NL","Oaxaca","Puebla","Queretaro","QR","SLP","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","Yucatan","Zacatecas","Federal");
	}
	
	public function index() {
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->createP($estado);
			$data[$estado] = $values;
		}
		
		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		for($key=1; $key<=30; $key++) {
			echo $key;
			foreach($this->estados as $estadoo) {
				if(isset($data[$estadoo][$key][0]["promedio"])) {
					$cadena .= "'" . $data[$estadoo][$key][0]["promedio"] . "',";
				} else {
					$cadena .= "'" . $data[$estadoo][$key] . "',";
				}
			}
			
			$query = "insert into indicadores (Indicador, ID_Parent, Value, Description, " . $caEstados . ") values ('" . $key . "','0','0','0'," . trim($cadena, ",") . "); ";
			
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
			

		}
	
		$vars["view"] = $this->view("home", TRUE);
		
		$this->render("content", $vars);
	}

}
