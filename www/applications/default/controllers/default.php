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
		
		$this->var_internas    = array("A", "B", "C", "D", "E", "F", "G", "H", "I");
		$this->var_principales = array("1", "2", "3");
		$this->estados = array("Aguascalientes","BC","BCS","Campeche","Chiapas","Chihuahua","Coahuila","Colima","DF","Durango","Mexico","Guanajuato","Guerrero","Hidalgo","Jalisco","Michoacan","Morelos","Nayarit","NL","Oaxaca","Puebla","Queretaro","QR","SLP","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","Yucatan","Zacatecas","Federal");
	}
	
	public function index() {
		$vars["view"] = $this->view("home", TRUE);
			
		$this->render("content", $vars);
	}
	
	public function get() {
		$data["indice"]     = $this->Default_Model->getIndices(segment(1));
		$data["variablesp"] = $this->Default_Model->getVariablesP(segment(1));
		$data["variablesi"] = $this->Default_Model->getVariablesI(segment(1));
	}
}
