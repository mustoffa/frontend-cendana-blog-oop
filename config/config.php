<?php
ob_start();
session_start();
// include('../class/class.user.php');

function __autoload($class){
   $class = strtolower($class);
   $classpath = 'class/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      include_once $classpath;
	} 	
   $classpath = '../class/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      include_once $classpath;
	}		
   $classpath = '../../class/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      include_once $classpath;
	} 		
}

class DB
{
	protected $db;
	protected $sql;

	public function __construct(){
		try{
            // $this->db = new PDO('mysql:host=localhost;dbname=cendana_mustofa_blog', 'root', '', 
            					// array(PDO::ATTR_PERSISTENT => true));
			$this->db = new PDO('mysql:host=139.59.226.31;dbname=cendana_mustofa_blog', 'cendana', 'cendananr2425', array(PDO::ATTR_PERSISTENT => true));
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}
	public function _select($row = []){
		$value = implode("," , $row);
		return $this->sql = "SELECT {$value} ";
	}
	public function _from($table = []){
		$value = implode("," , $table);
		return $this->sql .= "FROM {$value} ";
	}
	public function _where($row = []){
		$key = implode(',' , array_keys($row));
		$value = implode(',' , $row);
		return $this->sql .= "WHERE {$key} = '{$value}' ";
	}
	public function _and($row = []){
		$key = implode(',' , array_keys($row));
		$value = implode(',' , $row);
		return $this->sql .= "AND {$key} = {$value} ";
	}
	public function _or($row = []){
		$key = implode(',' , array_keys($row));
		$value = implode(',' , $row);
		return $this->sql .= "OR {$key} = {$value} ";
	}
	public function _update($table = []){
		$value = implode("," , $table);
		return $this->sql = "UPDATE $value ";
	}
	public function _set($row = []){
		$this->sql .= "SET ";
		$jmlArr = count($row);
		$i = 0;
		foreach($row as $key => $value){
            $this->sql .= "{$key} = ";
            $this->sql .= '"'.$value.'" ';
            if($i < ($jmlArr-1)) {
            	$this->sql .= ", ";	
            }
        	$i++;
        }
		return $this->sql;
	}
	public function _insert($table = []){
		$value = implode("," , $table);
		return $this->sql = "INSERT INTO $value ";
	}
	public function _value($row = []){
		$key = implode(',' , array_keys($row));
		$this->sql .= "($key) VALUES ( ";
		$jmlArr = count($row);
		$i = 0;
		foreach($row as $key => $value){
            $this->sql .= "'{$value}' ";
            if($i < ($jmlArr-1)) {
            	$this->sql .= ", ";	
            }
        	$i++;
        }
		$this->sql .= " )";
		return $this->sql;
	}
	public function _delete(){
		return $this->sql = "DELETE ";
	}
	public function _query(){
		return $this->sql;
	}
}

$post = new Post();
$user = new User();
