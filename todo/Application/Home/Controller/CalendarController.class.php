<?php
/**
 * Created by PhpStorm.
 * User: linjiahua
 * Date: 10/31/15
 */

namespace Home\Controller;
use Think\Controller;
class CalendarController extends BaseController{
    public function _initialize(){
        parent:: _initialize();
        if( !ss_user_id() ){
            $this->redirect('User/login');
        }else{
            $this->assign('username',ss_user_name());
        }
    }
    public function all(){
        $this->display();
    }
    public function ajax_AllEvent(){
        $json = array('status'=>false,'info'=>'','data'=>'');
        $md=D('Details');
        $events=$md->get_details();
        foreach($events as $k=>$v){
            $events[$k]['status']=$v['status']?true:false;
            $events[$k]['is_finished']=$v['is_finished']=1?'fc-event-delete':false;
            $v['time']=strtotime($v['do_time'])-strtotime($v['create_time']);
            $events[$k]['allDay']=$v['time']>86400?true:false;
            $events[$k]['end']=$v['do_time'];
            switch ($events[$k]['level_id']) {
                case '1':
                    $events[$k]['backgroundColor'] = '#d84a38';
                    break;
                case '2':
                    $events[$k]['backgroundColor'] = "#f2784b";
                    break;
                case '3':
                    $events[$k]['backgroundColor'] = "#f7ca18";
                    break;
                case '4':
                    $events[$k]['backgroundColor'] = "#35aa47";
                    break;
            };

        }
        if($events){
            $json['status']=true;
            $json['event']=$events;

        }
        $this->ajaxReturn($json);
    }
}