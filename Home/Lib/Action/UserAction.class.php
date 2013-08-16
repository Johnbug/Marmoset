<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public $Db;
    //这里是实例化的！
    public function __construct(){
        $this->Db = M('User');
    }
    public function index(){
    	$userData = $this->Db->select();
    	//var_dump($userData);
    	$this->assign("UserData",$userData);
		$this->display();
    }
    public function showToUser(){
    	echo "Hello, Guys in SCNU! Welcome to Marmoset! Your great idea should be shared!";
    }
    public function del(){
        $Marmoset = M('user');
        $cnt = $Marmoset->delete($_GET['id']);
        if($cnt > 0){
            $this->success("delete complete successfully");
        }else {
            $this->error("error happen!");
        }
    }
    public function add(){
        $this->display();
    }
    public function create(){
        $Marmoset = M('user');
        $data['username'] = $_POST['name'];
        $data['apartment'] = $_POST['apartment'];
		$data['email'] = $_POST['email'];
		$data['password'] = $_POST['password'];
        $cnt = $Marmoset->add();
        if($cnt > 0){
            $this->success("ok");
        }else {
            $this->error("shit");
        }
    }
    public function modify(){
        //$Db_Mar = M('User');
        //$this->$Db = $Db_Mar;
        //var_dump($this->$Db);
        //var_dump($Db_Mar);
        $arr = $this->Db->find($_GET['id']);
        $this->assign('data',$arr);
        $this->display();
    }

    public function update(){
        $Db_Mar = M('User');
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['name'];
        $data['apartment'] = $_POST['apartment'];
        $count=$Db_Mar->save($data);
        if($count>0){
            $this->success('数据修改成功','index');
        }else{
             $this->error('数据修改失败');
        }
    }
}