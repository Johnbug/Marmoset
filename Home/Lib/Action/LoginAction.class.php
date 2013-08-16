<?php
	/**
	* 	log in action
	*/
	class LoginAction extends Action{
		private $db;
		function __construct(){
			# code...
			$this->db = M('User');
		}

		public function index(){
			$this->display();
		}

		public function login(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$code=$_POST['code'];
			if($_SESSION['verify']!==md5($code)){
				$this->error('验证码错误！');
			}
			$query['username'] = $username;
			$query['password'] = $password;

			$cnt = $this->db->where($query)->count();

			if($cnt > 0){
				$_SESSION['username'] = $username;
				$this->redirect('Index/index');

			}else {
				$this->error("用户名或密码错误");
			}
		}

		public function logout(){
			$_SESSION = array();
			session_destroy();
			$this->redirect("Index/index");
		}

	}
?>