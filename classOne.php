<?php

class classOne {
	
	//stavio sam da funkcije pozivaju statičnu funkciju u klasi budući da će od podataka koje je potrebno izlistat samo naziv funkcije biti različit
	
	function fOne(){
		self::getInfo();
		echo "Function name: " . __FUNCTION__;
	}
	
	function fTwo(){
		self::getInfo();
		echo "Function name: " . __FUNCTION__;
	}
	
	private static function getInfo(){
		echo "URL: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "<br/>";
		echo "Class name: " . __CLASS__ . "<br/>";
	}
	
}
?>