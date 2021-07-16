<?php 


/**
 * 
 */
 class user extends Model
 {
 	public $resuls=array();
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function get_list_friends(){
 		 return $this->get()->exec();
 	}
 	public function check_user_login($mail, $password){
 		return $this->get()->where(['email' => $mail])->andWhere(['password' => md5($password)])->exec()[0];
 	}
 	public function inscription($user){
 		$user['password'] = md5($user['password']);
 		$user['status'] = 'online';
 		return $this->add($user)->exec($user);
 	}
 	public function user_status($status,$id){
 		$this->update(['status' => $status])->where(['id' => $id])->exec();
 	}
 }

 ?>