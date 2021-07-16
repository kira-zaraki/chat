<?php
	require "core/include.php";
	define("LOCAL", dirname(__FILE__));
	define("ROOT", trim($_SERVER['SCRIPT_NAME'], '/index.php'));
	$url=trim($_SERVER["REQUEST_URI"],'/');
	$url=explode('/',$url);
	$controller=$url[1] ?? CONTROLLER;
	$action=$url[2] ?? ACTION;

	$file="controller/$controller.php";

	if (file_exists($file)) {
		 require $file;
		 $controller = $controller.'Controller';
		 $controller = new $controller();
		 if(method_exists($controller, $action))
		 	$controller->$action();
		 else{
	 		 require_once "controller/error.php";
	 		 new err();
	 		}
	}else{
	   
	    require_once "controller/error.php";
		 new err();
	  
	}
 ?>