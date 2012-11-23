<?php
/**
 * Access from index.php:
 */


class Indice_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("indice");
		
		$this->Templates     = $this->core("Templates");
		$this->Default_Model = $this->model("Indice_Model");
		
		$this->Templates->theme();
		
		$this->var_internas    = array("A", "B", "C", "D", "E", "F", "G", "H", "I");
		$this->var_principales = array("1", "2", "3");
		$this->estados = array("Aguascalientes","BC","BCS","Campeche","Chiapas","Chihuahua","Coahuila","Colima","DF","Durango","Mexico","Guanajuato","Guerrero","Hidalgo","Jalisco","Michoacan","Morelos","Nayarit","NL","Oaxaca","Puebla","Queretaro","QR","SLP","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","Yucatan","Zacatecas","Federal", "Nacional");
	}
	
	public function index2() {
		echo "Hello World";
	}
	
	public function indiceB() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->indiceB($estado);
			$data[$estado] = $values;
		}
		
		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		
		
		foreach($this->estados as $estadoo) {
			$number = number_format($data[$estadoo][0]["promedio"], 4);
			$cadena .= "'" . $number . "',";
		}
		
		$query = "insert into indice (Indicador, ID_Parent, Value, Description, Type, " . $caEstados . ") values ('1','0','0','0','b'," . trim($cadena, ",") . "); ";
		
		$this->Default_Model->create($query);
		
		echo "Done.";
	}
	
	
	public function variablespB() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->variablespB($estado);
			$data[$estado] = $values;
		}
		
		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		
		foreach($this->var_principales as $key) {
			
			foreach($this->estados as $estadoo) {
				$number = number_format($data[$estadoo][$key][0]["promedio"], 4);
				$cadena .= "'" . $number . "',";
			}
			
			$query = "insert into variablesp (Indicador, ID_Parent, Value, Description, Type, " . $caEstados . ") values ('" . $key . "','0','0','0','b', " . trim($cadena, ",") . "); ";
			
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
		}
		
		echo "Done.";
	}
	
	public function variablesiB() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->variablesiB($estado);
			$data[$estado] = $values;
		}

		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		
		foreach($this->var_internas as $key) {
			
			foreach($this->estados as $estadoo) {
				$number = number_format($data[$estadoo][$key][0]["promedio"], 4);
				$cadena .= "'" . $number . "',";
			}
			
			$query = "insert into variablesi (Indicador, ID_Parent, Value, Description, Type, " . $caEstados . ") values ('" . $key . "','0','0','0','b'," . trim($cadena, ",") . "); ";
		
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
		}
		
		echo "Done.";
	}
	
	public function indicadoresBase() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->createB($estado);
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
			$number = 0;
			foreach($this->estados as $estadoo) {
				if(isset($data[$estadoo][$key][0]["promedio"])) {
					$number = number_format($data[$estadoo][$key][0]["promedio"], 4);
				} else {
					$number = number_format($data[$estadoo][$key], 4);
				}
				
				$cadena .= "'" . $number . "',";
			}
			
			$query = "insert into indicadores (Indicador, ID_Parent, Value, Description, Type, " . $caEstados . ") values ('" . $key . "','0','0','0', 'b'," . trim($cadena, ",") . "); ";
			
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
		}
		
		echo "Done.";
	}
	
	public function index() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->indice($estado);
			$data[$estado] = $values;
		}
		
		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		
		
		foreach($this->estados as $estadoo) {
			$number = number_format($data[$estadoo][0]["promedio"], 4);
			$cadena .= "'" . $number . "',";
		}
		
		$query = "insert into indice (Indicador, ID_Parent, Value, Description, " . $caEstados . ") values ('1','0','0','0'," . trim($cadena, ",") . "); ";
		
		$this->Default_Model->create($query);
		
		echo "Done.";
	}
	
	public function variablesp() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->variablesp($estado);
			$data[$estado] = $values;
		}
		
		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		
		foreach($this->var_principales as $key) {
			
			foreach($this->estados as $estadoo) {
				$number = number_format($data[$estadoo][$key][0]["promedio"], 4);
				$cadena .= "'" . $number . "',";
			}
			
			$query = "insert into variablesp (Indicador, ID_Parent, Value, Description, " . $caEstados . ") values ('" . $key . "','0','0','0'," . trim($cadena, ",") . "); ";
			
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
		}
		
		echo "Done.";
	}
	
	public function variablesi() {
		foreach($this->estados as $estado) {
			$values = $this->Default_Model->variablesi($estado);
			$data[$estado] = $values;
		}
		
		$cadena    = "";
		$caEstados = "";
		$query 	   = "";
		
		foreach($this->estados as $estadoo) {
			$caEstados .= $estadoo . ",";
		}
		
		$caEstados = trim($caEstados, ",");
		
		foreach($this->var_internas as $key) {
			
			foreach($this->estados as $estadoo) {
				$number = number_format($data[$estadoo][$key][0]["promedio"], 4);
				$cadena .= "'" . $number . "',";
			}
			
			$query = "insert into variablesi (Indicador, ID_Parent, Value, Description, " . $caEstados . ") values ('" . $key . "','0','0','0'," . trim($cadena, ",") . "); ";
			
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
		}
		
		echo "Done.";
	}
	
	public function indicadores() {
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
			$number = 0;
			foreach($this->estados as $estadoo) {
				if(isset($data[$estadoo][$key][0]["promedio"])) {
					$number = number_format($data[$estadoo][$key][0]["promedio"], 4);
				} else {
					$number = number_format($data[$estadoo][$key], 4);
				}
				
				$cadena .= "'" . $number . "',";
			}
			
			$query = "insert into indicadores (Indicador, ID_Parent, Value, Description, " . $caEstados . ") values ('" . $key . "','0','0','0'," . trim($cadena, ",") . "); ";
			var_dump($query);
			$this->Default_Model->create($query);
			
			$query  = "";
			$cadena = "";
		}
	}
}
