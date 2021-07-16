<?php 

/**
* 
*/
class initController extends Controllers
{ 
	 
	function __construct()
	{    parent::__construct();
		$this->loadModel("init");
		$this->init->build_DB(); 
		$this->init->insert_DB();
		die;
		
	}
}





 ?>