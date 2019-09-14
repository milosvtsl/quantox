<?php
include 'core/init.php';

if(isset($_GET['url'])){
$url = explode('/', $_GET['url']);
	if(isset($url[0])){
		$method = $url[0];
	}else{ $method = null;}



	if(isset($url[1])){
				$parametar1 = $url[1];
	}else{ $parametar1 = null;}

	if(isset($url[2])){
		$parametar2 = $url[2];
	}else{$parametar2=null;}
/**********/
	if(isset($url[3])){
		$parametar3 = $url[3];
	}else{$parametar3=null;}
	
	if(isset($url[4])){
		$parametar4 = $url[4];
	}else{$parametar4=null;}
/************/	
if($method !== ''){

	$c = new SiteController; // instanciranje klase kontrolera
	if(isset($parametar1) and isset($method)){
	$c->$method($parametar1,$parametar2,$parametar3,$parametar4); //instanciranje metode klase kontrolera
	}else{
		$c->$method(); //instanciranje metode klase kontrolera
		
	}
}elseif($controller == null or $method == null){
		
		$c = new SiteController;
		$c->home();
}else{
		$c = new SiteController;
		$c->home();}
//kraj if url

}else{
	$c = new SiteController;
	$c->go();
}