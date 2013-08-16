<?php

	class AnnouncementAction extends CommonAction {
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
    		$this->assign("data", $data);
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
                $this->success("success","index");
            }else {
                $this->error("failed","edit");
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
            $note = M('annoucement');
            $id = $_GET['id'];
			$n = $this->getAnnoucementById($id);
			$cnt = $note->where("id=$id")->delete();
            if($cnt > 0) {
                $this -> success('数据删除成功');
            }else {
                $this -> success('数据删除失败');
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
                $this->success("success","index");
            }else {
                $this->error("failed","update");
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