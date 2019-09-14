<?php

class SiteController{
	
	public static function view($view,$data1=null,$data2 = null,$data3=null,$data4 = null,$data5 = null,$data6 = null,$data7=null,$data8=null,$data9=null,$data10 = null,$data11=null){
				require_once 'pogledi/'.$view.'.php';
	}
	
	
	public function Student($id=null){
			
		if($id!==null){
			$data = Student::student_data($id);
		}else{
			$data = "niste definisali id studenta";
		}
		
		
		
		self::view('index',$data);
	}
	
	
	
	
}