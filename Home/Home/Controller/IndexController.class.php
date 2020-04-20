<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$name = 'ThinkPHP';
		$this->assign('name',$name);
		$this->display();
	}
	//注册
	public function logup(){
		$this->display("logup");
	}
	public function logupcheck(){
		if(!IS_AJAX){
			halt('恭喜你！将ajax成功的搞没了!');
		}else{
			$User = M('User','blog_');
			if($User->where(array("username"=>I('username')))->count()){
				$data['status'] = 1;
				$data['error'] = "用户名被注册";
				$this->ajaxReturn($data);
			}else if($User->where(array("email"=>I('email')))->count()){
				$data['status'] = 1;
				$data['error'] = "邮箱被注册";
				$this->ajaxReturn($data);
			}else{
				$User->create();
				$User->add();
				$data['status'] = 1;
				$data['name'] = I('username');
				session('name',I('username'));
				session(array('name'=>I('username')));
				$this->ajaxReturn($data);
			}
		}
	}
	//登录页面及验证
	public function login(){
		$this->display("login");
	}
	public function logincheck(){
		if(!IS_AJAX){
			halt('page do not exisits');
		}else{
			$User = M('User','blog_');
			if($User->where(array("username"=>I('username'),"passwd"=>I('passwd')))->count()){
				$data['status'] = 1;
				$data['name'] = I('username');
				session('name',I('username'));
				$this->ajaxReturn($data);
			}
		}
	}
	//登出
	public function logout(){
		session(null);
		session('name',null);
		redirect('http://localhost/thinkphp_blog/index.php',0);
	}
	//发表文章
	public function page(){
		$data['name'] = session('name');
		$this->assign('data',$data);
		$this->display("page");
	}
	//数据库存入文章
	public function insertmsg(){
		if(!IS_AJAX){
			$this->error("page do not exist!");
		}else{
			$User = M('User','blog_');
			$username = session('name');
			$query = 'username= "'.$username.'"';
			$name = $User->where($query)->getField('id');
			$Msg = M('Msg','blog_');
			$data['poster'] = $name;
			$data['title'] = I('title');
			$data['des'] = I('des');
			$data['posted'] = date('Y-m-d H:i:s');
			$data['message'] = I('message');
			$sql = $Msg->data($data)->add();
			$data['name'] = session('name');
			$data['status'] = 1;
			$this->ajaxReturn($data);	
		}
	}
	//show title
	public function showmsg(){
		$User = M('User','blog_');
		$username = 'yunjingyang';
		$query = 'username= "'.$username.'"';
		$id = $User->where($query)->getField('id');
		$Msg = M('Msg','blog_');
		$query = 'poster= "'.$id.'"';
		$pid = $Msg->where($query)->getField('postid',true);
		$len = count($pid);
		for($i = 0;$i < $len;$i++){
			$query = 'postid= "'.$pid[$i].'"';
			$data[$i.'id'] = $pid[$i]; 
			$data[$i.'title'] = $Msg->where($query)->getField('title');
			$data[$i.'posted'] = $Msg->where($query)->getField('posted');
			$data[$i.'message'] = $Msg->where($query)->getField('message');
			$data[$i.'des'] = $Msg->where($query)->getField('des');
		}
		$data['len'] = $len;
		$data['status'] = 1;
		$this->ajaxReturn($data);	
	}
	//show msg
	public function show(){
		$id = $_GET['id'];
		$data['name'] = session('name');
		$Msg = M('Msg','blog_');
		$query = 'postid="'.$id.'"';
		$data['id'] = $id;
		$data['title'] = $Msg->where($query)->getField('title');
		$data['message'] = $Msg->where($query)->getField('message');
		$data['posted'] = $Msg->where($query)->getField('posted');
		$this->assign('data',$data);
		$this->display();
	}
}
	