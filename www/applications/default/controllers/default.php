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
		$this->estados = array("Aguascalientes","BC","BCS","Campeche","Chiapas","Chihuahua","Coahuila","Colima","DF","Durango","Mexico","Guanajuato","Guerrero","Hidalgo","Jalisco","Michoacan","Morelos","Nayarit","NL","Oaxaca","Puebla","Queretaro","QR","SLP","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","Yucatan","Zacatecas", "Federal");
		$this->claves  = array("01","02","03","04","07","08","05","06","09","10","15","11","12","13","14","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32");
		$this->id_estados = array("aguascalientes","bcn","bcs","campeche","chiapas","chihuahua","coahuila","colima","df","durango","edo_mexico","guanajuato","guerrero","hidalgo","jalisco","michoacan","morelos","nayarit","nuevo_leon","oaxaca","puebla","queretaro","quntana_roo","slp","sinaloa","sonora","tabasco","tamaulipas","tlaxcala","veracruz","yucatan","zacatecas", "federal", "Estado");
		
		/*
			var estados_abr = [ "AGS","BC","BCS","CAM","CHIS","CHIH","COA","COL",
			  "DF","DGO","MEX","GTO","GRO","HGO","JAL","MICH",
			  "MOR","NAY","NL","OAX","PUE","QUE","QROO","SLP",
			  "SIN","SON","TAB","TAMPS","TLAX","VER","YUC","ZAC" ]; 
		 
		*/
	}
	
	/*
	public function index() {
		foreach($this->estados as $estado) {
			$data[$estado] = $this->Default_Model->getIndices($estado);
		}
		
		arsort($data);
		
		$i=1;
		$es="";
		
		foreach($data as $key => $value) {
			$es .=   $key . ",";
		}
		
		echo trim($es, ",");
		
		$val ="";
		foreach($data as $key => $value) {
			$val .=   $value . ",";
		}
		
		echo "<br/>";
		echo trim($val, ",");
		
		
		$clv ="";
		foreach($data as $key => $value) {
			 $posicion = array_search($key, $this->estados);
			 $clv .= $this->claves[$posicion] . ",";
		}
		
		echo "<br/>";
		echo trim($clv, ",");
		
		____($key);
		____($data);
	}
	*/
	
	public function index() {
		$vars["view"] = $this->view("home", TRUE);
			
		$this->render("content", $vars);
	}
	
	public function estado() {
		if(segment(1) != "get") {
			$this->index();
		} else {
			$this->get(segment(2));
		}
	}
	
	public function get($estado) {
		if($estado and in_array($estado, $this->estados)) {
			$data["indice"]      = $this->Default_Model->getIndices($estado);
			$data["variablesp"]  = $this->Default_Model->getVariablesP($estado);
			$data["variablesi"]  = $this->Default_Model->getVariablesI($estado);
			$data["indicadores"] = $this->Default_Model->getIndicadores($estado);
			
			$key = array_search($estado, $this->estados);
			$key = $this->id_estados[$key];
			
			$response["progresivo"] = $this->json($data);
			$response["base"]	    = $this->json($data, "base");
			$response["indice"]     = $data["indice"];
			$response["key"]        = $key;
			
			echo json_encode($response);
		} else {
			echo "Bad Request";
		}
	}
	
	public function json($data, $type = "progresivo") {
		$json = '{';
		$json .= '"name": "",';
		$json .= ' "children": [';
		$json .= '  {';
		$json .= '   "name": "Disposiciones Normativas - ' . $this->convert($data["variablesp"][$type][1]) . '",';
		$json .= '   "children": [';
		$json .= '	{';
		$json .= '	 "name": "Positivación del DAI - ' . $this->convert($data["variablesi"][$type]["A"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][1]) . '", "size": ' . $this->convert2($data["indicadores"][$type][1]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][1]) . '","desc" : "Conceptualización e interpretación del DAI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][2]) . '", "size": ' . $this->convert2($data["indicadores"][$type][2]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][2]) . '","desc" : "Objetivos de las legislaciones de AI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][3]) . '", "size": ' . $this->convert2($data["indicadores"][$type][3]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][3]) . '","desc" : "SO"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][4]) . '", "size": ' . $this->convert2($data["indicadores"][$type][4]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][4]) . '","desc" : "Obligaciones de los SO"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][5]) . '", "size": ' . $this->convert2($data["indicadores"][$type][5]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][5]) . '","desc" : "Sujetos del derecho"}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Información restringida - ' . $this->convert($data["variablesi"][$type]["B"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][6]) . '", "size": ' . $this->convert2($data["indicadores"][$type][6]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][6]) . '", "desc" : "Criterios legales para restringir información"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][7]) . '", "size": ' . $this->convert2($data["indicadores"][$type][7]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][7]) . '", "desc" : "Lista de excepciones"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][8]) . '", "size": ' . $this->convert2($data["indicadores"][$type][8]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][8]) . '", "desc" : "Prueba tripartita"}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Sanciones - ' . $this->convert($data["variablesi"][$type]["C"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][9]) . '", "size": ' . $this->convert2($data["indicadores"][$type][9]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][9]) . '", "desc" : "Sanciones establecidas"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][10]) . '", "size": ' . $this->convert2($data["indicadores"][$type][10]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][10]) . '", "desc" : "Responsabilidades específicas"}';
		$json .= '	 ]';
		$json .= '	}';
		$json .= '   ]';
		$json .= '  },';
		  
		$json .= '  {';
		$json .= '   "name": "Diseño institucional - ' . $this->convert($data["variablesp"][$type][2]) . '",';
		$json .= '   "children": [';
		$json .= '	{';
		$json .= '	 "name": "Instituciones internas de acceso a la información - ' . $this->convert($data["variablesi"][$type]["D"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][11]) . '", "size": ' . $this->convert2($data["indicadores"][$type][11]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][11]) . '", "desc" : "Integración de las OI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][12]) . '", "size": ' . $this->convert2($data["indicadores"][$type][12]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][12]) . '", "desc" : "Atribuciones de las OI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][13]) . '", "size": ' . $this->convert2($data["indicadores"][$type][13]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][13]) . '", "desc" : "Itegración de los CI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][14]) . '", "size": ' . $this->convert2($data["indicadores"][$type][14]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][14]) . '", "desc" : "Facultades de los CI"}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Promoción del DAI - ' . $this->convert($data["variablesi"][$type]["E"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][15]) . '", "size": ' . $this->convert2($data["indicadores"][$type][15]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][15]) . '", "desc" : "Acciones de sensibilización"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][16]) . '", "size": ' . $this->convert2($data["indicadores"][$type][16]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][16]) . '", "desc" : "Capacitación"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][17]) . '", "size": ' . $this->convert2($data["indicadores"][$type][17]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][17]) . '", "desc" : "Rendición de cuentas"}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Órganos garantes - ' . $this->convert($data["variablesi"][$type]["F"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][18]) . '", "size": ' . $this->convert2($data["indicadores"][$type][18]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][18]) . '", "desc" : "Naturaleza jurídica"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][19]) . '", "size": ' . $this->convert2($data["indicadores"][$type][19]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][19]) . '", "desc" : "Facultad de los OG"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][20]) . '", "size": ' . $this->convert2($data["indicadores"][$type][20]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][20]) . '", "desc" : "Órganos de conducción de los OG"}';
		$json .= '	 ]';
		$json .= '	}';
		$json .= '   ]';
		$json .= '  },';
		  
		$json .= '  {';
		$json .= '   "name": "Procedimientos - ' . $this->convert($data["variablesp"][$type][3]) . '",';
		$json .= '   "children": [';
		$json .= '	{';
		$json .= '	 "name": "Procedimientos de acceso a la información - ' . $this->convert($data["variablesi"][$type]["G"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][21]) . '", "size": ' . $this->convert2($data["indicadores"][$type][21]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][21]) . '", "desc" : "Modalidades para presentar solicitudes de AI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][22]) . '", "size": ' . $this->convert2($data["indicadores"][$type][22]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][22]) . '", "desc" : "Requisitos para solicitar información"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][23]) . '", "size": ' . $this->convert2($data["indicadores"][$type][23]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][23]) . '", "desc" : "Regulación de  respuestas a solicitudes de AI"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][24]) . '", "size": ' . $this->convert2($data["indicadores"][$type][24]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][24]) . '", "desc" : "Cuotas por la reproducción de información"}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Procedimientos de revisión - ' . $this->convert($data["variablesi"][$type]["H"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][25]) . '", "size": ' . $this->convert2($data["indicadores"][$type][25]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][25]) . '", "desc" : "Requisitos para promover recursos de revisión"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][26]) . '", "size": ' . $this->convert2($data["indicadores"][$type][26]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][26]) . '", "desc" : "Plazos para promover recursos de revisión"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][27]) . '", "size": ' . $this->convert2($data["indicadores"][$type][27]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][27]) . '", "desc" : "Garantías jurídicas del recurso de revisión"}';
		$json .= '	 ]';
		$json .= '	},';
		$json .= '	{';
		$json .= '	 "name": "Difusión proactiva de información pública - ' . $this->convert($data["variablesi"][$type]["I"]) . '",';
		$json .= '	 "children": [';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][28]) . '", "size": ' . $this->convert2($data["indicadores"][$type][28]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][28]) . '", "desc" : "OT"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][29]) . '", "size": ' . $this->convert2($data["indicadores"][$type][29]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][29]) . '", "desc" : "Modalidades de difusión"},';
		$json .= '	  {"name": "' . $this->convert($data["indicadores"][$type][30]) . '", "size": ' . $this->convert2($data["indicadores"][$type][30]) . ', "clas" : "' . $this->clas($data["indicadores"][$type][30]) . '", "desc" : "Reglas para la publicación de OT"}';
		$json .= '	 ]';
		$json .= '	}';
		$json .= '   ]';
		$json .= '  }';
		$json .= ' ]';
		$json .= '}';
		
		return $json;
	}
	
	public function convert($data) {
		return substr($data * 10, 0, 3);
	}
	
	public function convert2($data) {
		$number = substr($data * 10, 0, 3);
		$number = $number *1000;
		
		if($number==0 or $number<1000) return 900;
		
		return $number;
	}
	
	public function clas($data) {
		$number = substr($data * 10, 0, 3);
		
		if($number>=9 and $number<=10) return "c109";
		if($number>=7 and $number<=8.9) return "c87";
		if($number>=5 and $number<=6.9) return "c65";
		if($number>=3 and $number<=4.9) return "c43";
		if($number>=1 and $number<=2.9) return "c21";
		if($number>=0 and $number<=0.9) return "c0";
		
		return $number;
	}
}

/* Base
{
 "name": "",
 "children": [
  {
   "name": "Disposiciones Normativas - 6.5",
   "children": [
    {
     "name": "Positivación del DAI - 7.0",
     "children": [
      {"name": "1.- 6.3", "size": 10000},
      {"name": "2.- 6.2", "size": 9000},
      {"name": "3.- 7.5", "size": 8000},
      {"name": "4.- 6.8", "size": 7000},
      {"name": "5.- 8.2", "size": 6000}
     ]
    },
    {
     "name": "Información restringida - 7.8",
     "children": [
      {"name": "6.- 7.1", "size": 10000},
      {"name": "7.- 8.2", "size": 9000},
      {"name": "8.- 8.2", "size": 8000}
     ]
    },
    {
     "name": "Sanciones al incumplimiento de la ley - 4.7",
     "children": [
      {"name": "9.- 6.3", "size": 10000},
      {"name": "10.- 3.1", "size": 10000}
     ]
    }
   ]
  },
  
  {
   "name": "Diseño institucional - 7.0",
   "children": [
    {
     "name": "Instituciones internas de acceso a la información - 5.9",
     "children": [
      {"name": "11.- 9.6", "size": 10000},
      {"name": "12.- 7.3", "size": 9000},
      {"name": "13.- 4.5", "size": 8000},
      {"name": "14.- 2.3", "size": 7000}
     ]
    },
    {
     "name": "Promoción del DAI - 7.9",
     "children": [
      {"name": "15.- 9.3", "size": 10000},
      {"name": "16.- 7.9", "size": 9000},
      {"name": "17.- 6.4", "size": 8000}
     ]
    },
    {
     "name": "Órganos garantes - 7.3",
     "children": [
      {"name": "18.- 0", "size": 10000},
      {"name": "19.- 6.9", "size": 9000},
      {"name": "20.- 7.0", "size": 8000}
     ]
    }
   ]
  },
  
  {
   "name": "Procedimientos - 7.2",
   "children": [
    {
     "name": "Procedimientos de acceso a la información - 7.0",
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
