<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

	public function _initialize(){
        parent:: _initialize();
        $this->assign('username',ss_user_name());
	}

    public function index(){
       $this->display();
    }
    
}