<?php

/**
* 
*/
class Model 
{
	 private $table;
	 private $pdo;
	 private $query;
	 private $paramsArray;
 	function __construct()
	{
		$this->pdo = new PDO("mysql:host=localhost;dbname=".DBNAME,BDUSERNAME,DBPASSWORD);
		$this->table=get_class($this);
		$this->paramsArray = [];
	}

	public function get(){
		$this->query = "SELECT * FROM $this->table";
		return $this;
	}
	public function exec($paramsArray = null){
		$params = [];
		$this->paramsArray = $paramsArray ?? $this->paramsArray;
		$res = ($this->paramsArray) ? $this->pdo->prepare($this->query) : $this->pdo->query($this->query); 
		foreach ($this->paramsArray as $key => $value) {
			if(is_numeric($value))
				$res->bindValue($key, $value, PDO::PARAM_INT);
			else
				$res->bindValue($key, $value, PDO::PARAM_STR); 
		}  
		$res->execute(); 
		$res = $res->fetchAll(PDO::FETCH_OBJ);
		$this->paramsArray = [];
		return ($res)? $res :$this->pdo->lastInsertId();		
	}

	public function createQuery($query){
		$this->query = $query;
		return $this;
	}

	public function where($cond){
		$this->paramsArray += $cond;
		$cond = array_keys($cond)[0];
		$this->query .= " WHERE $cond = :$cond";
		return $this;
	}

	public function andWhere($cond){
		$this->paramsArray += $cond;
		$cond = array_keys($cond)[0];
		$this->query .= " AND $cond = :$cond";
		return $this;
	}

	public function update($param){
		$this->paramsArray += $param;
		$this->query = "UPDATE $this->table set ";
		foreach ($param as $key => $value) {
			$this->query .= " $key = :$key ";
		}
		return $this;
	}

	public function find($cond=null){

		$sql="SELECT * FROM $this->table";

		if (!empty($cond)) {
			$sql.=$cond;
		}
        
         
		$res=$this->pdo->query($sql);
		$tab=array();

		while ($resul=$res->FETCH(PDO::FETCH_ASSOC)) {
			 $tab[]=$resul;
		}

		return $tab;
	}

	public function build($querys){
		foreach ($querys as $query) {
			$this->pdo->exec($query);
		}
	}

	public function add($params){
		$this->paramsArray = $params;
		$params = implode(",", array_keys($params));
		$value = preg_replace('#(\w+)#',':$1',$params);
		$this->query = "INSERT INTO $this->table($params) VALUE($value)";
		return $this;
	} 

	public function delete($value){
		 
		 $sql="DELETE FROM $this->table WHERE $value[key]=:$value[key]";    
		      
		 $ex=$this->pdo->prepare($sql);
		 $ex->execute($value["val"]);	
	} 

}



