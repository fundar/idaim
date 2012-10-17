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
		
		for($key=1; $key<=30; $key++) {
			foreach($this->estados as $estadoo) {
				if(isset($data[$estadoo][$key][0]["promedio"])) {
					$cadena .= "'" . $data[$estadoo][$key][0]["promedio"] . "',";
				} else {
					$cadena .= "'" . $data[$estadoo][$key] . "',";
				}
			}
			
			$query = "insert into indicadores (Indicador, " . trim($caEstados, ",") . ") values ('" . $key . "'," . trim($cadena, ",") . "); ";
			echo $query . "<br />";
			$this->Default_Model->create($query);
		}
	
		$vars["view"] = $this->view("home", TRUE);
		
		$this->render("content", $vars);
	}

}
