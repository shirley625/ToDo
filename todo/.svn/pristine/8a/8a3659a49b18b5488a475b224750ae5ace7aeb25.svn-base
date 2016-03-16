<?php
/**
 * author: zsy
 * Date: 12/2/15
 * Time: 8:58 下午
 */
namespace Home\Controller;
use Think\Controller;
class StatisticsController extends BaseController {
    public function _initialize(){
        parent:: _initialize();
        if( !ss_user_id() ){
            $this->redirect('User/login');
        }else{
            $this->assign('username',ss_user_name());
        }
    }
    public function ajax_year(){
        $year = D("statistics")->get_year();
        $year1 = I('year');
        foreach ($year as $key => $value) {
            if($key == $year1){
                $year2 = $value;
            }
        }
        $yearsum = array();
        foreach ($year2 as $k1 => $v1) {
            $yearsum['finish'] += $v1['finish'];
            $yearsum['egg'] += $v1['egg'];
            $yearsum['hatch']= sprintf("%.2f",($yearsum['finish'] / $yearsum['egg'])*100);
        }
        $json = array('info'=>'','info1'=>'');
        $json['info'] = $year2;
        $json['sum'] = $yearsum;
        $this->ajaxReturn($json);
    }
    public function statistics()
    {
        $week = D("statistics")->get_week();
        $year = D("statistics")->get_year();
        $weeksum = array();
        foreach ($week as $key => $value) {
            $weeksum['finish'] += $value['finish'];
            $weeksum['egg'] += $value['egg'];
            $weeksum['hatch'] = $weeksum['finish'] / $weeksum['egg'];
        }
        $sum = array();
        foreach ($year as $k1 => $v1) {
            foreach ($v1 as $k2 => $v2) { //$sum 是累积
                $sum['finish']  += $v2['finish'];
                $sum['egg']  += $v2['egg'];
                $sum['hatch'] = $sum['finish'] / $sum['egg'];
            }
        }
        $this->assign("week",$week);
        $this->assign("weeksum",$weeksum);
        $this->assign("year",$year);
        $this->assign("sum",$sum);
        $this->display();
    }

}