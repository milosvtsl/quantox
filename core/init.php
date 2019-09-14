<?php
session_start();
$GLOBALS['config'] = array(
	'DB' => array(
		'host' => 'localhost',
		'user' => 'root',
		'password' => '',
		'db_name' => 'school'
	),
	'status' => true,
	'app_dir' => '/quantox/',
	'session' => array()
);


spl_autoload_register(function($className){
	if(file_exists('controller/'.$className.'.class.php')){
		require_once 'controller/'.$className.'.class.php';
	}else if(file_exists("klase/{$className}.class.php")){
	require_once "klase/{$className}.class.php";
	}else if(file_exists("../klase/{$className}.class.php")){
	require_once "../klase/{$className}.class.php";
	}

});
