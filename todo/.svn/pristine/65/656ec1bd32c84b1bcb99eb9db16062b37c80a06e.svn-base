<?php
namespace Home\Model;
use Think\Model;
class UserModel extends BaseModel{
    public function checkUserNo($user_no){
        $user = $this->where(array(
            'status'=>1,
            'user_no'=>array('eq',$user_no))
        )->find();
        if(!$user) return false;

        return $user;
    }
}