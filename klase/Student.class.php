<?php

class Student extends Entity{
	public static function student_data($id){
		$student = static::get($id,"student","id");
		
		$list_grades = static::get($student->id,"grades","id_student","grade","","array");
		
		$average = static::prosek($id);
		
		if($student->school === "cms"){
			if($average->o_ukupna>=7){
				$final_result = "Pass";
			}else{
				$final_result = "Fail";
			}
		}
		if($student->school === "csmb"){
			$number = static::GetCount(" WHERE id_student='{$id}'","grades","*");
			if($number->number>2){
				$list_csmb = $list_grades;
				sort($list_csmb);
				array_shift($list_csmb);
				array_shift($list_csmb);
				$grade_max = max($list_csmb);

				if($grade_max["grade"]>8){
					$final_result = "Pass";
				}else{
					$final_result = "Fail";
				}
				
			}
		}
		$list = "";
		foreach($list_grades as $grade)
			{
			$list.=" ".$grade["grade"];
			}
		
		
		$box = array(
			"id_sudent"=>$student->id,
			"name"=>$student->name,
			"grades"=>$list,
			"average"=>$average->o_ukupna,
			"final result"=>$final_result
		);
		
		if($student->school === "cms"){
			return var_dump(json_encode($box));
		}
		if($student->school === "csmb"){
			$data_xml = new SimpleXMLElement("<?xml version=\"1.0\"?><user_info></user_info>");
			foreach($box as $k=>$v){
				$data_xml->addChild("$k",htmlspecialchars("$v"));
			}
			return var_dump($data_xml->asXML());
			
		}
	}
	
	
	
}