<?php 

/**
* 
*/
class chatController extends Controllers
{ 
	 
	function __construct()
	{    parent::__construct();
		
	}

	public function home(){
		$this->loginRequire();
		$this->loadModel("user");
		$renderArray = $this->user->get_list_friends();
		$user = $this->getUser(); 
		$this->request->render("chat/home", ['friends' => $renderArray,'user' => $user]);
	}
}





 ?>