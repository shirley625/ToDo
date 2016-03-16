<?php
/**
 * Created by PhpStorm.
 * User:linjiahua
 * Date: 10/5/15
 * Time: 8:08 下午
 */
namespace Home\Controller;
use Think\Controller;
class DetailController extends BaseController {
    public function _initialize(){
        parent:: _initialize();
        if( !ss_user_id() ){
            $this->redirect('User/login');
        }else{
            $this->assign('username',ss_user_name());
        }
    }
    public function ajax_add_event()
    {
        $json = array('status' => false, 'info' => '', 'data' => '');
        $title = I('title');
        $category_id = I('category_id');
        $content = I('content');
        $level_id=I('level_id');
        $create_time = I('create_time');
        $do_time = I('do_time');
        $md = D('Details');
        $json['status'] = $md->addEvent($title,$category_id, $content,$level_id,$create_time,$do_time);
        if ($json['status']) {
            $json['info'] = "下蛋成功，等待孵化。";
        }
        $this->ajaxReturn($json);

    }
    public function ajax_update_event()
    {
        $json = array('status' => false, 'info' => '', 'data' => '');
        $id = I('id');
        $title = I('title');
        $category_id = I('category_id');
        $content = I('content');
        $level_id=I('level_id');
        $create_time = I('create_time');
        $do_time = I('do_time');
        $md = D('Details');
        $json['status'] = $md->updateEvent($id,$title,$category_id,$content,$level_id,$create_time,$do_time);
        if ($json['status']) {
            $json['info'] = "修改成功";
        }
        $this->ajaxReturn($json);

    }
    public function get_detail_id(){
        $id = I('id');
        $json = array(
            'id'=>$id,
            'status'=>true,
            'info'=>'',
            'data'=>''
        );
        $json['detail'] = D('Details')->getDetailInfo($id);
        $this->ajaxReturn($json);

    }
}