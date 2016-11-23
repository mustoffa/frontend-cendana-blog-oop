<?php

class Post extends DB
{
	public function __construct(){
		parent::__construct();
	}
	public function showAll(){
		DB::_select(['*']);
		DB::_from(['blog_post']);
        $rs = $this->db->prepare(DB::_query());
        $rs->execute();
        return $rs->fetchAll();        
	}
	public function show(){
		DB::_select(['*']);
		DB::_from(['blog_post']);
		DB::_where(['id_post' => $_GET['id']]);
		$rs = $this->db->prepare(DB::_query());
        $rs->execute();
        return $rs->fetchAll();
	}
	public function updatePost(){
		$id_post 		= $_POST['id_post'];
		$post_title 	= $_POST['post_title'];
		$post_descrip 	= $_POST['post_descrip'];
		$post_cont 		= $_POST['post_cont'];
		DB::_update(['blog_post']);
		DB::_set(['post_title'=>$post_title , 'post_descrip'=>$post_descrip , 'post_cont'=>$post_cont]);
		DB::_where(['id_post'=>$id_post]);
		$rs = $this->db->prepare(DB::_query());
        $rs->execute();
	}
	public function addPost(){
		$post_title 	= $_POST['post_title'];
		$post_descrip 	= $_POST['post_descrip'];
		$post_cont 		= str_replace('"',"'", $_POST['post_cont']);
		$post_date 		= date('Y-m-d H:i:s');
		DB::_insert(['blog_post']);
		DB::_value([
			'post_title'	=> $post_title ,
			'post_descrip'	=> $post_descrip ,
			'post_cont' 	=> $post_cont ,
			'post_date' 	=> $post_date 
		]);
		$rs = $this->db->prepare(DB::_query());
        $rs->execute();
	}
	public function delPost(){
		if(isset($_GET['delpost'])){
			DB::_delete();
			DB::_from(['blog_post']);
			DB::_where(['id_post'=>$_GET['delpost']]);
			$rs = $this->db->prepare(DB::_query());
        	$rs->execute();
			header('Location: index.php');
			exit;
		}
	}
}
