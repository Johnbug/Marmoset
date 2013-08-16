<?php
    class NoteAction extends CommonAction {
		public function index(){
			$note = M("note");
			$n = $note->order('id desc')->limit(10)->select();
			
			for($i = 0;$i < sizeof($n);$i ++){
				$data[$i] = $this->getNoteById($n[$i]['id']);
			}
			//var_dump($data);
			$this->assign("data",$data);
			$this->display();
		}
		
		public function detail(){
			$id = $_GET['id'];
			$n  = $this->getNoteById($id);
			$this->assign("data",$n);
			//var_dump($n);
			$this->display();
		}
		
		public function edit(){
			$data = $this->getApartmentData();
			$this->assign("apartmentdata",$data);
			$this->display();
		}
		
		public function add(){
			$name = $_SESSION['username'];
			$usrinfo = $this->getUserByName($name);
			$note = M("note");
			$data['title'] = $_POST['title'];
            $htmlData = '';
            //var_dump($_POST['content']);
            if (!empty($_POST['content'])) {
                if (get_magic_quotes_gpc()) {
                    $htmlData = stripslashes($_POST['content']);
                } else {
                    $htmlData = $_POST['content'];
                }
            }
			
			$classname['name'] = $_POST["class"];
		
			$class = M("class");
			$c = $class->where($classname)->select();
			$cid = $c[0]['id'];
			//var_dump($c);
            $data['content'] = $htmlData;
            $data['time'] = time();
            $data['user_id'] = $usrinfo['user']['id'];
            $data['class_id'] = $cid;
            $data['apartment_id'] = $usrinfo['aprt']['id'];
			$cnt = $note->add($data);
			if($cnt > 0){
                $this->success("success","index");
            }else {
                $this->error("failed","edit");
            }
		}
		
		public function My_Note(){
			$name = $_SESSION['username'];
			$userInfo = $this->getUserByName($name);
			$note = M('note');
			$userId = $userInfo['user']['id'];
			$n = $note->where("user_id = $userId")->order('id desc')->select();
			for($i = 0;$i < sizeof($n);$i ++){
                $data[$i] = $this->getNoteById($n[$i]['id']);
            }
			//var_dump($userInfo);
			$this->assign("user",$userInfo);
            $this->assign("data",$data);
            $this->display();
		}
		
		public function deleteNote(){
			$note = M('note');
            $id = $_GET['id'];
            
			$suc['return'] = true;
            $failed['return'] = false;
			
            $suc['val'] = '<div class = "success center">success<br /><span class = "logo1">å</span></div>';
			$n = $this->getNoteById($id);
			
			if($n['user']['username'] != $_SESSION['username']){
				echo "You are not {$annoucement['user']['username']}";
				return;
			}
			
			$cnt = $note->where("id=$id")->delete();
			$failed['val'] = '<div class = "success">failed</div>';
            if($cnt > 0) {
                echo json_encode($suc);
            }else {
                echo json_encode($failed);
            }
		}
		
		public function getClass(){
			$apartment = M("apartment");
			$class = M("class");
			$check['name'] = $_POST["apartment"];
			//var_dump($check);
			$ap = $apartment->where($check)->select();
			$aid = $ap[0]['id'];
			//var_dump($ap);
			$c = $class->where("apartment_id = $aid")->select();
			//var_dump($c);
			echo json_encode($c);
		}
		
		public function update(){
			 $id = $_GET['id'];
            //echo "$id";
            $n = $this->getNoteById($id);
			//var_dump($n);
            $this->assign("data",$n);
			$data = $this->getApartmentData();
			$this->assign("apartmentdata",$data);
            $this->display();
		}
		
		public function updateData(){
			$name = $_SESSION['username'];
            $usrinfo = $this->getUserByName($name);
            $note = M('note');
			$id = $_POST['id'];
            $data['title'] = $_POST['title'];

            $htmlData = '';
            //var_dump($_POST['content']);
            if (!empty($_POST['content'])) {
                if (get_magic_quotes_gpc()) {
                    $htmlData = stripslashes($_POST['content']);
                } else {
                    $htmlData = $_POST['content'];
                }
            }
			
			$classname['name'] = $_POST["class"];
			$class = M("class");
			$c = $class->where($classname)->select();
			$cid = $c[0]['id'];
			
            $data['content'] = $htmlData;
            $data['time'] = time();
            $data['user_id'] = $usrinfo['user']['id'];
            $data['class_id'] = $cid;
            $data['apartment_id'] = $usrinfo['aprt']['id'];
			//var_dump($id);
            $cnt = $note->where("id=$id")->save($data);
            if($cnt > 0){
                $this->success("OK","index");
            }else {
                $this->error("failed","update");
            }
		}
		/*
		 * private methods:
		 * getNoteById: using Id to find Note data package.
		 * */
		private function getNoteById($id){
			$note = M("note");
			$user = M("user");
			$apartment = M("apartment");
			$school = M("school");
			$class = M("class");
			
			$n = $note->where("id = $id")->select();
			
			$uid = $n[0]['user_id'];
			$aid = $n[0]['apartment_id'];
			$cid = $n[0]['class_id'];
			
			$a = $apartment->where("id = $aid")->select();
			$u = $user->where("id = $uid")->select();
			$c = $class->where("id = $cid")->select();
			
			$sid = $a[0]['id'];
			$s = $school->where("id = $sid")->select();
			
			$noteInfo['user'] = $u[0];
			$noteInfo['apartment'] = $a[0];
			$noteInfo['class'] = $c[0];
			$noteInfo['school'] = $s[0];
			$noteInfo['note'] = $n[0];
			$noteInfo['note']['time'] = date("Y-m-d",$noteInfo['note']['time']);
			return $noteInfo;
		}
		
		private function getUserByName($name){
            $user = M("user");
            $aprt = M('apartment');
            $school = M('school');
            $c['username'] = $name;
            $u = $user->where($c)->select();
            $apid = $u[0]['apartment_id'];
            $a = $aprt->where("id = $apid")->select();
            $sid = $a[0]['school_id'];
            $s = $school->where("id=$sid")->select();
            $usrinfo['user'] = $u[0];
            $usrinfo['aprt'] = $a[0];
            $usrinfo['school'] = $s[0];
            return $usrinfo;
        }
		private function getApartmentData(){
			$apartment = M("apartment");
			$data = $apartment->select();
			return $data;
		}
	}
?>