<?php
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
            $this->success("数据删除成功！");
        }else {
            $this->error("数据删除失败!");
        }
    }
    public function add(){
        $this->display();
    }
    public function create(){
        $m = M('User');
        $m-> username = $_POST['name'];
        $m-> apartment_id = $_POST['apartment_id'];
		$m-> email = $_POST['email'];
		$m-> password = $_POST['password'];
        $cnt = $m->add();
        if($cnt > 0){
            $this->success("数据修改成功", 'index');
        }
        else {
            $this->error("数据修改失败");
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
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['apartment_id'] = $_POST['apartment_id'];
        $count=$Db_Mar->save($data);
        if($count>0){
            $this->success('数据修改成功','index');
        }else{
             $this->error('数据修改失败');
        }
    }
}