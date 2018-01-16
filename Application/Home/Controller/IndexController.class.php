<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    if($_COOKIE['username']!='')
        {
            session('username',$_COOKIE['username']);
        }
        if(session('username')=='')
        {
            $this->display('index');
        }else{
            $this->redirect('login/welcome');
        }

    }

    public function do_login(){
        
       $username=I('post.username');
       $password=md5(I('post.password'));

       $info=M('dd')->where("username='".$username."'")->find();

      if($info)
      {
      	if($info['password']==$password)
      	{
         session('username',$username);   
		 session('userid',$info['id']); 
         if(I('post.ischecks'))
                {
                   
                    cookie('username',$username,864000);
                    
                }

      		$datas=[
                    'msg'=>'登录成功',
                    'status'=>1
                ];
                $this->ajaxReturn($datas);
      		//$this->success('成功');
      	}else
      	{
      		$datas=[
                    'msg'=>'密码错误',
                    'status'=>0
                ];
                $this->ajaxReturn($datas);
      		//$this->error('密码错误');
      	}

      }else{
         
         $datas=[
                    'msg'=>'用户名错误',
                    'status'=>0
                ];
                $this->ajaxReturn($datas);
      	// $this->error('用户名错误');
      }




    }



}