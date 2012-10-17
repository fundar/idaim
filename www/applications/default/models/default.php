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
	
		$this->table = "dataset";
	}

	public function createP($estado = "Colima") {
		$query = " as decimal(10,6)) as promedio from dataset where Indicador in (";
		
		$data1 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "1,2,3,4,5,6,7);");
		$data2 = $this->Db->query("select cast(sum(" . $estado . ")/8" . $query . "8,9,10,11,12,13,14,15);");
			//subindicador
			$sub3_1 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "16,17,18);");
			
				$sub3_21 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (19,20,21,22,23,24,25,27,28,29,30,31)");
				$sub3_22 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('26_a','26_b')");
				
			//subindicador
			$sub3_2 = ($sub3_21[0]["suma"] + $sub3_22[0]["suma"]) / 13;
			
			//subindicador
			$sub3_3 = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "32,33);");
			
		$data3 = ((int) $sub3_1 + (int) $sub3_2 + (int) $sub3_3) / 3;
		$data4 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "34,35,36,37,38,39,40);");
		$data5 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "41,42,43);");
		$data6 = $this->Db->query("select cast(sum(" . $estado . ")/11" . $query . "44,45,46,47,48,49,50,51,52,53,54);");
		$data7 = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "55,56,57,58,59,60);");

			$sub8_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (62,63)");
			$sub8_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('61_a','62_b')");
			
		$data8 = ($sub8_1[0]["suma"] + $sub8_2[0]["suma"]) / 3;
		
		$data9 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "64,65,66);");
		$data10 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "67,68,69);");
		$data11 = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "70,71);");
		$data12 = $this->Db->query("select cast(sum(" . $estado . ")/6" . $query . "72,73,74,75,76,77);");
		$data13 = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "78,79);");
		$data14 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "80,81,82,83,84,85,86);");
		$data15 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "87,88,89);");
		$data16 = $this->Db->query("select cast(sum(" . $estado . ")/2" . $query . "90,91);");
		$data17 = $this->Db->query("select cast(sum(" . $estado . ")/5" . $query . "92,93,94,95,96);");
		$data18 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "97,98,99,100,101,102,103);");
			
			$sub19_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (105,106,107,108,109,110,111)");
			$sub19_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('104_a','104_b')");
			
		$data19 = ($sub19_1[0]["suma"] + $sub19_2[0]["suma"]) / 8;
		
				$sub20_4_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (112,113,114,115,116,117,119,120)");
				$sub20_4_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('118_a','118_b')");
			
			//subindicador
			$sub20_4 = ($sub20_4_1[0]["suma"] + $sub20_4_2[0]["suma"]) / 9;
			
				$sub20_5_1 = $this->Db->query("select  sum(" . $estado . ") as suma from dataset where Indicador in (122,123)");
				$sub20_5_2 = $this->Db->query("select  cast(sum(" . $estado . ")/2 as decimal(10,6)) as suma from dataset where Indicador in ('121_a','121_b')");
				
			//subindicador
			$sub20_5 = ($sub20_5_1[0]["suma"] + $sub20_5_2[0]["suma"]) / 3;
		
		$data20 = ((int) $sub20_4 + (int) $sub20_5) / 2;
		
		$data21 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "124,125,126,127,128,129,130);");
		$data22 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "131,132,133,134,135,136,137);");
		$data23 = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "138,139,140,141);");
		$data24 = $this->Db->query("select cast(sum(" . $estado . ")/4" . $query . "142,143,144,145);");
		$data25 = $this->Db->query("select cast(sum(" . $estado . ")/3" . $query . "146,147,148);");
		
		$data26 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "64,65,66);");
		$data27 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "64,65,66);");
		$data28 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "64,65,66);");
		$data28 = $this->Db->query("select cast(sum(" . $estado . ")/7" . $query . "64,65,66);");
		
		____($data1);
		return $data;
	}
	
}
