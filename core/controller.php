<?php 
/**
* 
*/

class Controllers 
{
	public $request;
 	function __construct(){
	 $this->request=new View();

	}

	public function loadModel($model){
		$file = "model/$model.php";
		if (file_exists($file)) {
			 require $file;
			 $this->$model = new $model();
			 
		}
		
	}

	public function getUser(){
		if(isset($_COOKIE['user']))
			return json_decode($_COOKIE['user']);
		else
			return null;
	}

	public function loginRequire(){
		if(!isset($_COOKIE['user']))
			header('location: /'.ROOT.'/user/login');
	}
	public function form($params){ 
		$inputs = [];
		foreach ($params as $key => $param) {
			$input = "<input ";
			foreach ($param as $name => $value) {
				$input .= " $name=$value ";
			}
			$inputs[] = $input." name='$key'>";
		}
		return $inputs;
	}
	public function url($path){
		return '/'.ROOT.'/'.$path;
	}
}