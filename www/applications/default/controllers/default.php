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
		$data["indice"]      = $this->Default_Model->getIndices(segment(1));
		$data["variablesp"]  = $this->Default_Model->getVariablesP(segment(1));
		$data["variablesi"]  = $this->Default_Model->getVariablesI(segment(1));
		$data["indicadores"] = $this->Default_Model->getIndicadores(segment(1));
		
		//$data["progresivo"] = $this->json($data);
		
		echo $this->json($data);
	}
	
	public function json($data, $type = "progresivo") {
		$json = '{';
		$json .= '"name": "",';
		$json .= ' "children": [';
		$json .= '  {';
		$json .= '   "name": "Disposiciones Normativas - ' . $data["variablesp"][$type][1] . '",';
		$json .= '   "children": [';
		$json .= '	{';
		$json .= '	 "name": "Positivación del DAI - ' . $data["variablesi"][$type]["A"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "1.- ' . $data["indicadores"][$type][1] . '", "size": 10000},';
		$json .= '	  {"name": "2.- ' . $data["indicadores"][$type][2] . '", "size": 9000},';
		$json .= '	  {"name": "3.- ' . $data["indicadores"][$type][3] . '", "size": 8000},';
		$json .= '	  {"name": "4.- ' . $data["indicadores"][$type][4] . '", "size": 7000},';
		$json .= '	  {"name": "5.- ' . $data["indicadores"][$type][5] . '", "size": 6000}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Información restringida - ' . $data["variablesi"][$type]["B"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "6.- ' . $data["indicadores"][$type][6] . '", "size": 10000},';
		$json .= '	  {"name": "7.- ' . $data["indicadores"][$type][7] . '", "size": 9000},';
		$json .= '	  {"name": "8.- ' . $data["indicadores"][$type][8] . '", "size": 8000}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Sanciones al incumplimiento de la ley - ' . $data["variablesi"][$type]["C"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "9.- ' . $data["indicadores"][$type][9] . '", "size": 10000},';
		$json .= '	  {"name": "10.- ' . $data["indicadores"][$type][10] . '", "size": 10000}';
		$json .= '	 ]';
		$json .= '	}';
		$json .= '   ]';
		$json .= '  },';
		  
		$json .= '  {';
		$json .= '   "name": "Diseño institucional - ' . $data["variablesp"][$type][2] . '",';
		$json .= '   "children": [';
		$json .= '	{';
		$json .= '	 "name": "Instituciones internas de acceso a la información - ' . $data["variablesi"][$type]["D"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "11.- ' . $data["indicadores"][$type][11] . '", "size": 10000},';
		$json .= '	  {"name": "12.- ' . $data["indicadores"][$type][12] . '", "size": 9000},';
		$json .= '	  {"name": "13.- ' . $data["indicadores"][$type][13] . '", "size": 8000},';
		$json .= '	  {"name": "14.- ' . $data["indicadores"][$type][14] . '", "size": 7000}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Promoción del DAI - ' . $data["variablesi"][$type]["E"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "15.- ' . $data["indicadores"][$type][15] . '", "size": 10000},';
		$json .= '	  {"name": "16.- ' . $data["indicadores"][$type][16] . '", "size": 9000},';
		$json .= '	  {"name": "17.- ' . $data["indicadores"][$type][17] . '", "size": 8000}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Órganos garantes - ' . $data["variablesi"][$type]["F"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "18.- ' . $data["indicadores"][$type][18] . '", "size": 10000},';
		$json .= '	  {"name": "19.- ' . $data["indicadores"][$type][19] . '", "size": 9000},';
		$json .= '	  {"name": "20.- ' . $data["indicadores"][$type][20] . '", "size": 8000}';
		$json .= '	 ]';
		$json .= '	}';
		$json .= '   ]';
		$json .= '  },';
		  
		$json .= '  {';
		$json .= '   "name": "Procedimientos - ' . $data["variablesp"][$type][2] . '",';
		$json .= '   "children": [';
		$json .= '	{';
		$json .= '	 "name": "Procedimientos de acceso a la información - ' . $data["variablesi"][$type]["G"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "21.- ' . $data["indicadores"][$type][21] . '", "size": 10000},';
		$json .= '	  {"name": "22.- ' . $data["indicadores"][$type][22] . '", "size": 9000},';
		$json .= '	  {"name": "23.- ' . $data["indicadores"][$type][23] . '", "size": 8000},';
		$json .= '	  {"name": "24.- ' . $data["indicadores"][$type][24] . '", "size": 7000}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Procedimientos de revisión - ' . $data["variablesi"][$type]["H"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "25.- ' . $data["indicadores"][$type][25] . '", "size": 10000},';
		$json .= '	  {"name": "26.- ' . $data["indicadores"][$type][26] . '", "size": 9000},';
		$json .= '	  {"name": "27.- ' . $data["indicadores"][$type][27] . '", "size": 8000}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Difusión proactiva de información pública - ' . $data["variablesi"][$type]["I"] . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "28.- ' . $data["indicadores"][$type][28] . '", "size": 10000},';
		$json .= '	  {"name": "29.- ' . $data["indicadores"][$type][29] . '", "size": 9000},';
		$json .= '	  {"name": "30.- ' . $data["indicadores"][$type][30] . '", "size": 8000}';
		$json .= '	 ]';
		$json .= '	}';
		$json .= '   ]';
		$json .= '  }';
		$json .= ' ]';
		$json .= '}';
		
		return $json;
	}
}

/*
{
 "name": "",
 "children": [
  {
   "name": "Disposiciones Normativas - ' . $data["variablesp"]["progresivo"][1] . '",
   "children": [
    {
     "name": "Positivación del DAI - ' . $data["variablesi"]["progresivo"]["A"] . '",
     "children": [
      {"name": "1.- ' . $data["variablesi"]["progresivo"][1] . '", "size": 10000},
      {"name": "2.- ' . $data["variablesi"]["progresivo"][2] . '", "size": 9000},
      {"name": "3.- ' . $data["variablesi"]["progresivo"][3] . '", "size": 8000},
      {"name": "4.- ' . $data["variablesi"]["progresivo"][4] . '", "size": 7000},
      {"name": "5.- ' . $data["variablesi"]["progresivo"][5] . '", "size": 6000}
     ]
    },
    {
     "name": "Información restringida - ' . $data["variablesi"]["progresivo"]["B"] . '",
     "children": [
      {"name": "6.- ' . $data["variablesi"]["progresivo"][6] . '", "size": 10000},
      {"name": "7.- ' . $data["variablesi"]["progresivo"][7] . '", "size": 9000},
      {"name": "8.- ' . $data["variablesi"]["progresivo"][8] . '", "size": 8000}
     ]
    },
    {
     "name": "Sanciones al incumplimiento de la ley - ' . $data["variablesi"]["progresivo"]["C"] . '",
     "children": [
      {"name": "9.- ' . $data["variablesi"]["progresivo"][9] . '", "size": 10000},
      {"name": "10.- ' . $data["variablesi"]["progresivo"][10] . '", "size": 10000}
     ]
    }
   ]
  },
  
  {
   "name": "Diseño institucional - ' . $data["variablesp"]["progresivo"][2] . '",
   "children": [
    {
     "name": "Instituciones internas de acceso a la información - ' . $data["variablesi"]["progresivo"]["D"] . '",
     "children": [
      {"name": "11.- ' . $data["variablesi"]["progresivo"][11] . '", "size": 10000},
      {"name": "12.- ' . $data["variablesi"]["progresivo"][12] . '", "size": 9000},
      {"name": "13.- ' . $data["variablesi"]["progresivo"][13] . '", "size": 8000},
      {"name": "14.- ' . $data["variablesi"]["progresivo"][14] . '", "size": 7000}
     ]
    },
    {
     "name": "Promoción del DAI - ' . $data["variablesi"]["progresivo"]["E"] . '",
     "children": [
      {"name": "15.- ' . $data["variablesi"]["progresivo"][15] . '", "size": 10000},
      {"name": "16.- ' . $data["variablesi"]["progresivo"][16] . '", "size": 9000},
      {"name": "17.- ' . $data["variablesi"]["progresivo"][17] . '", "size": 8000}
     ]
    },
    {
     "name": "Órganos garantes - ' . $data["variablesi"]["progresivo"]["F"] . '",
     "children": [
      {"name": "18.- ' . $data["variablesi"]["progresivo"][18] . '", "size": 10000},
      {"name": "19.- ' . $data["variablesi"]["progresivo"][19] . '", "size": 9000},
      {"name": "20.- ' . $data["variablesi"]["progresivo"][20] . '", "size": 8000}
     ]
    }
   ]
  },
  
  {
   "name": "Procedimientos - ' . $data["variablesp"]["progresivo"][2] . '",
   "children": [
    {
     "name": "Procedimientos de acceso a la información - ' . $data["variablesi"]["progresivo"]["G"] . '",
     "children": [
      {"name": "21.- ' . $data["variablesi"]["progresivo"][21] . '", "size": 10000},
      {"name": "22.- ' . $data["variablesi"]["progresivo"][22] . '", "size": 9000},
      {"name": "23.- ' . $data["variablesi"]["progresivo"][23] . '", "size": 8000},
      {"name": "24.- ' . $data["variablesi"]["progresivo"][24] . '", "size": 7000}
     ]
    },
    {
     "name": "Procedimientos de revisión - ' . $data["variablesi"]["progresivo"]["H"] . '",
     "children": [
      {"name": "25.- ' . $data["variablesi"]["progresivo"][25] . '", "size": 10000},
      {"name": "26.- ' . $data["variablesi"]["progresivo"][26] . '", "size": 9000},
      {"name": "27.- ' . $data["variablesi"]["progresivo"][27] . '", "size": 8000}
     ]
    },
    {
     "name": "Difusión proactiva de información pública - ' . $data["variablesi"]["progresivo"]["I"] . '",
     "children": [
      {"name": "28.- ' . $data["variablesi"]["progresivo"][28] . '", "size": 10000},
      {"name": "29.- ' . $data["variablesi"]["progresivo"][29] . '", "size": 9000},
      {"name": "30.- ' . $data["variablesi"]["progresivo"][30] . '", "size": 8000}
     ]
    }
   ]
  }
  
 ]
}
*/
