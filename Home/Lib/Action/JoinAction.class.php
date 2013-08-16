<?php
	class JoinAction extends Action{
		private $db;

		public function __construct(){
			$this->db = M('User');
		}
		public function index(){
			//var_dump(__ROOT__."");
			$num = $this->db->select();
			$this->assign("cnt",sizeof($num));
			$apartmentData = $this->getApartmentData();
			$this->assign("apartment",$apartmentData);
			//var_dump($apartmentData);
			$this->display();
		}
		public function signUp(){
			$newUser['username'] = $_POST['username'];
			$newUser['password'] = $_POST['password'];
			$ap['name']=$_POST['apartment'];
			$a = M("apartment");
			$as = $a->where($ap)->select();
			$aid = $as[0]['id'];
			//var_dump($as);
			$newUser['apartment_id'] = $aid;
			$newUser['email'] = $_POST['email'];
			$code=$_POST['code'];
			if($_SESSION['verify']!==md5($code)){
				$this->error('验证码错误！');
			}
			$cnt = $this->db->add($newUser);
			if($cnt > 0){
				$this->success("welcome {$_POST['name']}! You have become a new Marmoset!","index");
			}else {
				$this->error("OOPS! Error! Try again!"."index");
			}
		}
		public function checkEmail(){
			$email = $_POST['type'];
			$check['email'] = $email;
			//var_dump($email);
			$cnt = $this->db->where($check)->count();
			//var_dump($cnt);
			if($cnt > 0){
				echo "1";
			}else {
				echo "0";
			}
		}
		public function checkUsername(){
			$name = $_POST['type'];
			$check['username'] = $name;
			//var_dump($name);
			$cnt = $this->db->where($check)->count();
			if($cnt > 0){
				echo "1";
			}else {
				echo "0";
			}
		}
		
		
		private function getApartmentData(){
			$apartment = M("apartment");
			$data = $apartment->select();
			return $data;
		}
	}
?>
