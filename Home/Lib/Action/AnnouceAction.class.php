<?php

	class AnnouceAction extends CommonAction {
    	public function index(){
    		$a_table = M("annoucement");
    		$user = M("user");
    		$aprt = M("apartment");
    		$school = M('school');
    		$annoucement = $a_table->order('id desc')->limit(5)->select();
    		for($i = 0;$i < sizeof($annoucement);$i ++){
    			$a = $annoucement[$i];
				$data[$i] = $this->getAnnoucementById($a['id']);
    		}
    		$this->assign("aList",$data);
			$this->display();
    	}

    	public function edit(){
    		$this->display();
    	}

        public function add(){
            $name = $_SESSION['username'];
            $usrinfo = $this->getUserByName($name);
            $annoucement = M('annoucement');
			
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
            $data['content'] = $htmlData;
            $data['time'] = time();
            $data['user_id'] = $usrinfo['user']['id'];
            $data['class_id'] = 1;
            $data['apartment_id'] = $usrinfo['aprt']['id'];
            //var_dump($data);
            $cnt = $annoucement->add($data);
            if($cnt > 0){
                $this->redirect("Common/jumpSuc");
            }else {
                $this->redirect("Common/jumpFai");
            }
        }
        public function detail(){
            $id = $_GET['id'];
            $annouce = $this->getAnnoucementById($id); 
            $this->assign("data",$annouce);
            $this->display();
        }
        public function my_annoucement(){
            $name = $_SESSION['username'];
            $usrinfo = $this->getUserByName($name);
            $annoucement = M('annoucement');
            $user_id = $usrinfo['user']['id'];
            
            $u = $annoucement->where("user_id = $user_id")->order('id desc')->select();
            //var_dump($u);
            for($i = 0;$i < sizeof($u);$i ++){
                $data[$i] = $this->getAnnoucementById($u[$i]['id']);
            }
            //var_dump($data);
            $this->assign("data",$data);
            $this->display();
        }
        public function deleteAnnouce(){
            $annouce = M('annoucement');
            $id = $_GET['id'];
            
			$suc['return'] = true;
            $failed['return'] = false;

            $suc['val'] = '<div class = "success center">success<br /><span class = "logo">å</span></div>';
			$annoucement = $this->getAnnoucementById($id);
			
			if($annoucement['user']['username'] != $_SESSION['username']){
				echo "You are not {$annoucement['user']['username']}";
				return;
			}
			$cnt = $annouce->where("id=$id")->delete();
			$failed['val'] = '<div class = "success">failed</div>';
            if($cnt > 0) {
                echo json_encode($suc);
            }else {
                echo json_encode($failed);
            }
        }

        public function update(){
            $id = $_GET['id'];
            //echo "$id";
            $annouce = $this->getAnnoucementById($id);
            
            $this->assign("data",$annouce);
            $this->display();
        }

        public function updateData(){
            $name = $_SESSION['username'];
            $usrinfo = $this->getUserByName($name);
            $annoucement = M('annoucement');
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
            $id = $_POST['id'];
            $data['content'] = $htmlData;
            $data['time'] = time();
            $data['user_id'] = $usrinfo['user']['id'];
            $data['class_id'] = 1;
            $data['apartment_id'] = $usrinfo['aprt']['id'];
            $cnt = $annoucement->where("id=$id")->save($data);
            if($cnt > 0){
                $this->redirect("Common/jumpSuc");
            }else {
                $this->redirect("Common/jumpFai");
            }
        }




        /*
        *    私有方法：
            getUserByName: 根据用户名查询用户信息
            getAnnoucementById:根据公告ID获取公告信息
        */
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

        private function getAnnoucementById($id){
            $user = M("user");
            $aprt = M('apartment');
            $school = M('school');
            $a_table = M("annoucement");
            $class = M("class");
            
            $an = $a_table->where("id = $id")->select();
            if(!$an) return "error" ;
            
            $uid = $an[0]['user_id'];
            $aid = $an[0]['apartment_id'];
            $cid = $an[0]['class_id'];
			
            $u = $user->where("id = $uid")->select();
            $a = $aprt->where("id = $aid")->select();
            $c = $class->where("id = $cid")->select();
			
			$sid = $a[0]['school_id'];
			
			$s = $school->where("id=$sid")->select();
			
            $aninfo['annoucement'] = $an[0];
            $aninfo['user'] = $u[0];
            $aninfo['apartment'] = $a[0];
            $aninfo['class'] = $c[0];
			$aninfo['school'] = $s[0];
			
            return $aninfo;


        }
	}
?>