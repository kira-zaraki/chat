<?php 


/**
 * 
 */
 class conversation extends Model
 {
 	public $resuls=array();
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function get_messages(){  
 		$result = $this->createQuery('SELECT c.*, u.*  FROM conversation c 
 		 							INNER JOIN user u
 		 							ON u.id = c.id_receiver 
 		 							WHERE c.id_receiver = :id_receiver 
 		 							AND c.id_sender = :id_sender
 		 							OR c.id_receiver = :id_sender 
 		 							AND c.id_sender = :id_receiver
 		 							ORDER BY date DESC LIMIT :limite, :offset')->exec(['id_sender' => $_POST['id_sender'], 
 		 																			  'id_receiver' => $_POST['id_receiver'],
 		 																			  'limite' => $_POST['limite'] ?? 0, 
 		 																			  'offset' => $_POST['offset'] ??5, 
 		 																			]);
 		 return array_reverse($result);
 	}
 	public function send_messages($params){
 		return $this->add($params)->exec();
 	}
 }

 ?>