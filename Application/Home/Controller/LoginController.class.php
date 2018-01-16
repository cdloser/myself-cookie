<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index()
    {
        echo session('username');
    }
    public function welcome()
    {
        // echo "<pre>";
        // //print_r(cookie());
        // print_r($_COOKIE);
        // print_r(session());
        $this->assign('username',session('username'));
        $this->display();
    }

}