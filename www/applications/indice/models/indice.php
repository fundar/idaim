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
		$query = " as decimal(10,6)) as promedio from dataset where Indicador in (";
		
		$data["1"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "1,2,3,4,5,6,7);");
		$data["2"] = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "8,9,10,11,12,13,14,15);");
			//subindicador
			
			$sub3_1 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "16,17,18);");
			
				$sub3_21 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (19,20,21,22,23,24,25,27,28,29,30,31)");
				$sub3_22 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('26_a','26_b')");
				
			//subindicador
			$sub3_2 =  number_format(($sub3_21[0]["suma"] + $sub3_22[0]["suma"]) / 13, 4);
			
			//subindicador
			$sub3_3 = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "32,33);");
			
			$sub3_1 = number_format($sub3_1[0]["promedio"], 4);
			$sub3_3 = number_format($sub3_3[0]["promedio"], 4);
			
		$data["3"] = number_format(($sub3_1 + $sub3_2 + $sub3_3) / 3, 4);
		
		$data["4"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "34,35,36,37,38,39,40);");
		$data["5"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "41,42,43);");
		$data["6"] = $this->Db->query("select cast(sum(" . $estado . ")/11" . $query . "44,45,46,47,48,49,50,51,52,53,54);");
		$data["7"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "55,56,57,58,59,60);");

			$sub8_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (62,63)");
			$sub8_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('61_a','61_b')");
			
			$sub8_2 = number_format($sub8_2[0]["suma"], 4);
			$sub8_1 = number_format($sub8_1[0]["suma"], 4);
		$data["8"]  = number_format(($sub8_1 + $sub8_2) / 3, 4);
		$data["9"]  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "64,65,66);");
		$data["10"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "67,68,69);");
		$data["11"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "70,71);");
		$data["12"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "72,73,74,75,76,77);");
		$data["13"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "78,79);");
		$data["14"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "80,81,82,83,84,85,86);");
		$data["15"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "87,88,89);");
		$data["16"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "90,91);");
		$data["17"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "92,93,94,95,96);");
		$data["18"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "97,98,99,100,101,102,103);");
			
			$sub19_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (105,106,107,108,109,110,111)");
			$sub19_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('104_a','104_b')");
			$sub19_1 = number_format($sub19_1[0]["suma"], 4);
			$sub19_2 = number_format($sub19_2[0]["suma"], 4);
		$data["19"] = number_format(($sub19_1 + $sub19_2) / 8, 4);
		
				$sub20_4_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (112,113,114,115,116,117,119,120)");
				$sub20_4_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('118_a','118_b')");
				$sub20_4_1 = number_format($sub20_4_1[0]["suma"], 4);
				$sub20_4_2 = number_format($sub20_4_2[0]["suma"], 4);
			//subindicador
			$sub20_4 = number_format(($sub20_4_1 + $sub20_4_2) / 9, 4);
			
				$sub20_5_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (122,123)");
				$sub20_5_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('121_a','121_b')");
				$sub20_5_1 = number_format($sub20_5_1[0]["suma"], 4);
				$sub20_5_2 = number_format($sub20_5_2[0]["suma"], 4);
			//subindicador
			$sub20_5 = number_format(($sub20_5_1+ $sub20_5_2) / 3, 4);
		
		$data["20"] = number_format(($sub20_4 + $sub20_5) / 2, 4);
		$data["21"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "124,125,126,127,128,129,130);");
		$data["22"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "131,132,133,134,135,136,137);");
		$data["23"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "138,139,140,141);");
		$data["24"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "142,143,144,145);");
		$data["25"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "146,147,148);");
		$data["26"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "149,150,151,152);");
		$data["27"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "153,154,155,156,157,158);");
			
			//subindicador
			$sub28_1 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "159,160,161,162,163,164,165);");
			$sub28_1 = number_format($sub28_1[0]["promedio"], 4);
			//subindicador
			$sub28_2 = $this->Db->query("select cast(sum(" . $estado . ")/11" . $query . "166,167,168,169,170,171,172,173,174,175,176);");
			
			$sub28_2 = number_format($sub28_2[0]["promedio"], 4);
			
				$sub28_3_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (178,179,180,181,182,183,184)");
				$sub28_3_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('177_a','177_b')");
				$sub28_3_1 = number_format($sub28_3_1[0]["suma"], 4);
				$sub28_3_2 = number_format($sub28_3_2[0]["suma"], 4);
			//subindicador
			$sub28_3 =  number_format(($sub28_3_1 + $sub28_3_2) / 8, 4);
			
			//subindicador
			$sub28_4 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "185,186,187);");
			$sub28_4 = number_format($sub28_4[0]["promedio"], 4);
			
			//subindicador
			$sub28_5 = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "188,189,190,191,192);");
			$sub28_5 = number_format($sub28_5[0]["promedio"], 4);
			
	
		$data["28"] = number_format(($sub28_1 + $sub28_2 + $sub28_3 + $sub28_4 + $sub28_5) / 5, 4);
		
		$data["29"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "193,194);");
		
			
				$sub30_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (195,197,198,199,200,201,202,203,204)");
				$sub30_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('196_a','196_b')");
				$sub30_1 = number_format($sub30_1[0]["suma"], 4);
				$sub30_2 = number_format($sub30_2[0]["suma"], 4);
				
		$data["30"] = number_format(($sub30_1 + $sub30_2) / 10, 4);
		
		//echo $estado . " =============== <br />" . var_dump($data) . "<br /><br />";
		return $data;
	}
	
	public function createB($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from dataset where Indicador in (";
		
		$data["1"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "1,2,4,6,7);");
		$data["2"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "8,9,10,11,12,13,14);");
			//subindicador
			
			$sub3_1 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "16,17,18);");
			
				$sub3_21 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (19,20,21,22,23,24,25,28,29,31)");
				$sub3_22 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('26_a','26_b')");
				
			//subindicador
			$sub3_2 =  number_format(($sub3_21[0]["suma"] + $sub3_22[0]["suma"]) / 11, 4);
			
			//subindicador
			$sub3_3 = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "32);");
			
			$sub3_1 = number_format($sub3_1[0]["promedio"], 4);
			$sub3_3 = number_format($sub3_3[0]["promedio"], 4);
			
		$data["3"] = number_format(($sub3_1 + $sub3_2 + $sub3_3) / 3, 4);
		
		$data["4"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "35,36,37,38,40);");
		$data["5"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "41,42,43);");
		$data["6"] = $this->Db->query("select cast(sum(" . $estado . ")/9" . $query . "44,45,46,47,48,49,50,51,54);");
		$data["7"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "55,56,57,58,59,60);");

			$sub8_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (62)");
			$sub8_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('61_a','61_b')");
			
			$sub8_2 = number_format($sub8_2[0]["suma"], 4);
			$sub8_1 = number_format($sub8_1[0]["suma"], 4);
		$data["8"]  = number_format(($sub8_1 + $sub8_2) / 2, 4);
		$data["9"]  = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "64,65,66);");
		$data["10"] = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "69);");
		$data["11"] = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "70);");
		$data["12"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "72,73,74,75,76,77);");
		$data["13"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "78,79);");
		$data["14"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "80,81,82,83,84,86);");
		$data["15"] = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "87);");
		$data["16"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "90,91);");
		$data["17"] = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "92,93,94,95);");
		$data["18"] = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "97,98,99,100,101,102,103);");
			
			$sub19_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (105,106,107,108,109,111)");
			$sub19_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('104_a','104_b')");
			$sub19_1 = number_format($sub19_1[0]["suma"], 4);
			$sub19_2 = number_format($sub19_2[0]["suma"], 4);
		$data["19"] = number_format(($sub19_1 + $sub19_2) / 7, 4);
		
				$sub20_4_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (112,115,117)");
				$sub20_4_1 = number_format($sub20_4_1[0]["suma"], 4);
			//subindicador
			$sub20_4 = number_format($sub20_4_1 / 3, 4);
			
				$sub20_5_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (122)");
				$sub20_5_1 = number_format($sub20_5_1[0]["suma"], 4);

			//subindicador
			$sub20_5 = number_format($sub20_5_1 / 1, 4);
		
		$data["20"] = number_format(($sub20_4 + $sub20_5) / 2, 4);
		$data["21"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "124,125,127,128,129,130);");
		$data["22"] = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "131,132,133,134,135,136);");
		$data["23"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "138,139,141);");
		$data["24"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "143,144,145);");
		$data["25"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "146,147,148);");
		$data["26"] = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "149,150,151);");
		$data["27"] = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "153,154,155,156,157);");
			
			//subindicador
			$sub28_1 = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "159,160,161,163,164,165);");
			$sub28_1 = number_format($sub28_1[0]["promedio"], 4);
			//subindicador
			$sub28_2 = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "166,167,168,169,170,171,172,175);");
			
			$sub28_2 = number_format($sub28_2[0]["promedio"], 4);
			
				$sub28_3_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (178,179,180,181,182,183)");
				$sub28_3_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('177_a','177_b')");
				$sub28_3_1 = number_format($sub28_3_1[0]["suma"], 4);
				$sub28_3_2 = number_format($sub28_3_2[0]["suma"], 4);
			//subindicador
			$sub28_3 =  number_format(($sub28_3_1 + $sub28_3_2) / 7, 4);
			
			//subindicador
			$sub28_4 = $this->Db->query("select cast(sum(" . $estado . ")/1" . $query . "185);");
			$sub28_4 = number_format($sub28_4[0]["promedio"], 4);
	
		$data["28"] = number_format(($sub28_1 + $sub28_2 + $sub28_3 + $sub28_4) / 4, 4);
		
		$data["29"] = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "193,194);");
		
			
				$sub30_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (195,197,198,202,203)");
				$sub30_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('196_a','196_b')");
				$sub30_1 = number_format($sub30_1[0]["suma"], 4);
				$sub30_2 = number_format($sub30_2[0]["suma"], 4);
				
		$data["30"] = number_format(($sub30_1 + $sub30_2) / 6, 4);
		
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
