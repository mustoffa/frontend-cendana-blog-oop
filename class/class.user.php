<?php

class User extends DB
{
	function __construct(){
		parent::__construct();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}

	public function login($username,$password){	
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		DB::_select(['*']);
		DB::_from(['blog_user']);
		DB::_where(['username' => $username]);
		$rs = $this->db->prepare(DB::_query());
        $rs->execute();
        $data = $rs->fetch();
		if($data['password'] == $password){
		    $_SESSION['loggedin'] = true;
		    return true;
		}		
	}
	
	public function logout(){
		session_destroy();
	}
}