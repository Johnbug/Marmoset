<?php
	/**
	* 
	*/
	class CommonAction extends Action
	{
		
		public function _initialize() {
			if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
				$this->assign('name', $_SESSION['username']);
			}
			else {
				echo $_SESSION['username'];
				$this->redirect('Login/index');
			}
		}

		public function jumpSuc(){
			$this->display();
		}

		public function jumpFai(){
			$this->display();
		}
	}

?>