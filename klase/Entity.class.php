<?php

class Entity {
	
	
	private static $db;
	
	public static function init(){
		self::$db = Connect::getInstance();
	}
	
	public static function get($id=1,$tableName=null,$keyColumn=null,$what='*',$and='',$exit = null,$mark=null,$where = 'WHERE'){
		if($tableName == null){$tableName = static::$tableName;}
		if($keyColumn == null){$keyColumn = static::$keyColumn;}
		if($mark == null){$mark = "=";}
		$q = "SELECT {$what} FROM {$tableName} {$where} {$keyColumn}{$mark}'{$id}' {$and}";
		$q = self::$db->query($q);
		if($exit == null){$postArr = $q->fetchObject();
		}else{$postArr = $q->fetchAll();}
		return $postArr;
	}
	
	public static function prosek($id){
	
	$q = "SELECT ROUND(AVG(grade),1) AS o_ukupna from grades where id_student='{$id}'";
	$q = self::$db->query($q);
	$postArr = $q->fetchObject();
	return $postArr;
	}
	
	public static function GetCount($salt=null,$tableName=null,$what="*"){
		if($tableName==null){
		$tableName = static::$tableName;}
		$q = "SELECT count({$what}) AS number FROM {$tableName}{$salt}";
		$q = self::$db->query($q);
		$postArr = $q->fetchObject();
		return $postArr;
	}
	

}
Entity::init();





