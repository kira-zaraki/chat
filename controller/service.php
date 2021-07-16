<?php 

/**
* 
*/
class serviceController extends Controllers
{ 
	 
	function __construct()
	{    parent::__construct();
		
	}

	public function get_messages(){
		$this->loadModel("conversation");
		$renderArray = $this->conversation->get_messages();
		print_r(json_encode($renderArray) ?? null);
	}
	public function send_messages(){
		$this->loadModel("conversation");
		$message_id = $this->conversation->send_messages($_POST);
		$date = new DateTime();
		$date = $date->format("Y-m-d H:m:s");
		$message = [
				'id' => $message_id,
				'message' => $_POST['message'],
				'date' => $date,
			];
		print_r(json_encode($message) ?? null);
	}
}





 ?>