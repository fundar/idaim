<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Indice_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		
		$this->helpers();
	
		$this->table = "dataset";
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
	
	public function indice($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from variablesp where Indicador in (";
		
		$data  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "1,2,3);");
		
		return $data;
	}
	
	public function indiceB($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from variablesp where Indicador in (";
		$where = " and Type ='b'";
		
		
		$data  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "1,2,3)" . $where .";");
	
		return $data;
	}
	
	public function variablesp($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from variablesi where Indicador in (";
		
		$data["1"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "'A','B','C');");
		$data["2"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "'D','E','F');");
		$data["3"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "'G','H','I');");
		
		return $data;
	}
	
	public function variablespB($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from variablesi where Indicador in (";
		$where = " and Type ='b'";
		
		$data["1"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "'A','B','C')" . $where .";");
		$data["2"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "'D','E','F')" . $where .";");
		$data["3"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "'G','H','I')" . $where .";");
		
		return $data;
	}
	
	public function variablesi($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from indicadores where Indicador in (";
		
		$data["A"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "1,2,3,4,5);");
		$data["B"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "6,7,8);");
		$data["C"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "9,10);");
		$data["D"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "11,12,13,14);");
		$data["E"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "15,16,17);");
		$data["F"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "18,19,20);");
		$data["G"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "21,22,23,24);");
		$data["H"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "25,26,27);");
		$data["I"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "28,29,30);");
		
		return $data;
	}
	
	public function variablesiB($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from indicadores where Indicador in (";
		$where = " and Type ='b'";
		
		$data["A"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "1,2,3,4,5)" . $where .";");
		$data["B"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "6,7,8)" . $where .";");
		$data["C"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "9,10)" . $where .";");
		$data["D"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "11,12,13,14)" . $where .";");
		$data["E"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "15,16,17)" . $where .";");
		$data["F"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "18,19,20)" . $where .";");
		$data["G"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "21,22,23,24)" . $where .";");
		$data["H"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "25,26,27)" . $where .";");
		$data["I"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "28,29,30)" . $where .";");
		
		return $data;
	}

	public function createP($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from dataset where ID_Criterio in (";
		
		$data["1"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "1,2,3,4,5,6,7);");
		$data["2"] = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "8,9,10,11,12,13,14,15);");

		//subindicador
		$sub3_1 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "16,17,18);");
		$sub3_1 = number_format($sub3_1[0]["promedio"], 4);
		
		//subindicador
		$sub3_2 = $this->Db->query("select cast(sum(" . $estado . ")/13" . $query . "19,20,21,22,23,24,25,26,27,28,29,30,31);");
		$sub3_2 = number_format($sub3_2[0]["promedio"], 4);
		
		//subindicador
		$sub3_3 = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "32,33);");
		$sub3_3 = number_format($sub3_3[0]["promedio"], 4);
			
		$data["3"] = number_format(($sub3_1 + $sub3_2 + $sub3_3) / 3, 4);
		$data["4"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "34,35,36,37,38,39,40);");
		$data["5"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "41,42,43);");
		$data["6"] = $this->Db->query("select cast(sum(" . $estado . ")/12" . $query . "44,45,46,47,48,49,50,51,52,53,54,55);");
		$data["7"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "56,57,58,59,60,61);");
		$data["8"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "62,63,64);");		
		$data["9"]  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "65,66,67);");
		$data["10"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "68,69,70);");
		$data["11"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "71,72);");
		$data["12"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "73,74,75,76,77,78);");
		$data["13"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "79,80);");
		$data["14"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "81,82,83,84,85,86,87);");
		$data["15"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "88,89,90);");
		$data["16"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "91,92);");
		$data["17"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "93,94,95,96,97);");
		$data["18"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "98,99,100,101,102,103,104);");
		$data["19"] = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "105,106,107,108,109,110,111,112);");
		
		//subindicador
		$sub20_1 = $this->Db->query("select cast(sum(" . $estado . ")/12" . $query . "113,114,115,116,117,118,119,120,121,122,123,124);");
		$sub20_1 = number_format($sub20_1[0]["promedio"], 4);
		
		//subindicador
		$sub20_2 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "125,126,127);");
		$sub20_2 = number_format($sub20_2[0]["promedio"], 4);
			
		$data["20"] = number_format(($sub20_1 + $sub20_2) / 2, 4);
		$data["21"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "128,129,130,131,132,133,134);");
		$data["22"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "135,136,137,138,139,140,141);");
		$data["23"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "142,143,144,145);");
		$data["24"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "146,147,148,149);");
		$data["25"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "150,151,152);");
		$data["26"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "153,154,155,156);");
		$data["27"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "157,158,159,160,161,162);");
		
		//subindicador
		$sub28_1 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "163,164,165,166,167,168,169);");
		$sub28_1 = number_format($sub28_1[0]["promedio"], 4);
		
		//subindicador
		$sub28_2 = $this->Db->query("select cast(sum(" . $estado . ")/11" . $query . "170,171,172,173,174,175,176,177,178,179,180);");
		$sub28_2 = number_format($sub28_2[0]["promedio"], 4);
		
		$sub28_3 = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "181,182,183,184,185,186,187,188);");
		$sub28_3 = number_format($sub28_3[0]["promedio"], 4);
		
		//subindicador
		$sub28_4 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "189,190,191);");
		$sub28_4 = number_format($sub28_4[0]["promedio"], 4);
		
		//subindicador
		$sub28_5 = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "192,193,194,195,196);");
		$sub28_5 = number_format($sub28_5[0]["promedio"], 4);
			
		$data["28"] = number_format(($sub28_1 + $sub28_2 + $sub28_3 + $sub28_4 + $sub28_5) / 5, 4);
		$data["29"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "197,198);");
		$data["30"] = $this->Db->query("select cast(sum(" . $estado . ")/11" . $query . "199,200,201,202,203,204,205,206,207,208,209);");
		
		//echo $estado . " =============== <br />" . var_dump($data) . "<br /><br />";
		return $data;
	}
	
	public function createB($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from dataset where ID_Criterio in (";
		
		$data["1"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "1,2,4,6,7);");
		$data["2"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "8,9,10,11,12,13,14);");

		//subindicador
		$sub3_1 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "16,17,18);");
		$sub3_1 = number_format($sub3_1[0]["promedio"], 4);
		
		//subindicador
		$sub3_2 = $this->Db->query("select cast(sum(" . $estado . ")/11" . $query . "19,20,21,22,23,24,25,26,28,29,31);");
		$sub3_2 = number_format($sub3_2[0]["promedio"], 4);
		
		//subindicador
		$sub3_3 = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "32);");
		$sub3_3 = number_format($sub3_3[0]["promedio"], 4);
			
		$data["3"] = number_format(($sub3_1 + $sub3_2 + $sub3_3) / 3, 4);
		$data["4"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "35,36,37,38,40);");
		$data["5"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "41,42,43);");
		$data["6"] = $this->Db->query("select cast(sum(" . $estado . ")/9" . $query . "44,45,46,47,48,49,50,51,55);");
		$data["7"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "56,57,58,59,60,61);");
		$data["8"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "62,63);");		
		$data["9"]  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "65,66,67);");
		$data["10"] = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "70);");
		$data["11"] = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "71);");
		$data["12"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "73,74,75,76,77,78);");
		$data["13"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "79,80);");
		$data["14"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "81,82,83,84,85,87);");
		$data["15"] = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "88);");
		$data["16"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "91,92);");
		$data["17"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "93,94,95,96);");
		$data["18"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "98,99,100,101,102,103,104);");
		$data["19"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "105,106,107,108,109,110,112);");
		
		//subindicador
		$sub20_1 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "113,119,121);");
		$sub20_1 = number_format($sub20_1[0]["promedio"], 4);
		
		//subindicador
		$sub20_2 = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "126);");
		$sub20_2 = number_format($sub20_2[0]["promedio"], 4);
			
		$data["20"] = number_format(($sub20_1 + $sub20_2) / 2, 4);
		$data["21"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "128,129,131,132,133,134);");
		$data["22"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "135,136,137,138,139,140);");
		$data["23"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "142,143,145);");
		$data["24"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "147,148,149);");
		$data["25"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "150,151,152);");
		$data["26"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "153,154,155);");
		$data["27"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "157,158,159,160,161);");
		
		//subindicador
		$sub28_1 = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "163,164,165,167,168,169);");
		$sub28_1 = number_format($sub28_1[0]["promedio"], 4);
		
		//subindicador
		$sub28_2 = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "170,171,172,173,174,175,176,179);");
		$sub28_2 = number_format($sub28_2[0]["promedio"], 4);
		
		$sub28_3 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "181,182,183,184,185,186,187);");
		$sub28_3 = number_format($sub28_3[0]["promedio"], 4);
		
		//subindicador
		$sub28_4 = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "189);");
		$sub28_4 = number_format($sub28_4[0]["promedio"], 4);
			
		$data["28"] = number_format(($sub28_1 + $sub28_2 + $sub28_3 + $sub28_4) / 4, 4);
		$data["29"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "197,198);");
		$data["30"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "199,200,202,203,207,208);");
		
		//echo $estado . " =============== <br />" . var_dump($data) . "<br /><br />";
		return $data;
	}
	
	public function create($query) {
		$data = $this->Db->query($query);
	}
	
	public function suma() {
		return $this->Db->query("select count(*) from indicadores");
	}	
}
