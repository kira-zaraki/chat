<?php 

/**
* 
*/
class userController extends Controllers
{ 
	 
	function __construct()
	{
		if(isset($_COOKIE['user']))
			header('location: /'.ROOT);
	    parent::__construct();		
	}

	public function login(){
		if($_POST){
			$this->loadModel("user");
			$user = $this->user->check_user_login($_POST['email'], $_POST['password']);
			if($user){
				setcookie('user',json_encode($user), time() + ( 365 * 24 * 60 * 60), '/');
				$this->user->user_status('online', $user->id);
				header('location: /'.ROOT.'/chat/home');
			}
		}
		$form = $this->form([
			'email' => ['type' => 'text', 'id' => 'name', 'placeholder' => 'Login..'],
			'password' => ['type' =>'password', 'id' => 'password', 'placeholder' => 'Password..']
		]);
		$this->request->render("user/login", ['form' => $form]);
	}

	public function inscription(){
		if($_POST){
			$this->loadModel("user");
			unset($_POST['check_password']);
			$user = $this->user->inscription($_POST);
			if($user){
				$_POST['id'] = $user;
				setcookie('user',json_encode($_POST), time() + ( 365 * 24 * 60 * 60), '/');
				header('location: /'.ROOT.'/chat/home');
			}
		}
		$form = $this->form([
				'nom' => ['type' => 'text', 'id' => 'name', 'placeholder' => 'Nom..'],
				'prenom' => ['type' => 'text', 'id' => 'prenom', 'placeholder' => 'Prenom..'],
				'email' => ['type' => 'text', 'id' => 'email', 'placeholder' => 'E-mail..'],
				'username' => ['type' => 'text', 'id' => 'username', 'placeholder' => 'Login..'],
				'password' => ['type' =>'password', 'id' => 'password', 'placeholder' => 'Password..'],
				'check_password' => ['type' =>'password', 'id' => 'check_password', 'placeholder' => 'Password..']
			]);
			$this->request->render("user/inscription", ['form' => $form]);
	}
	public function logout(){
		$this->loadModel("user");
		$this->user->user_status('offline', $this->getUser()->id);
		unset($_COOKIE['user']);
		setcookie('user', null, -1, '/');
		header("location: /".ROOT);
	}
}


 ?>