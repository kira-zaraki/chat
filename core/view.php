<?php 

/**
* 
*/
class View extends Controllers
{
	public $layout;
	function __construct()
	{
		 
	}

	public function render($page,$object = null){
			if($object)
		 		extract($object);
		 	ob_start();
			require "view/$page.php";
			$content = ob_get_clean();
			require "view/index.php";

		 
	}
}

 ?>