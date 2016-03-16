<?php
/**
 * Created by PhpStorm.
 * User: Sameen
 * Date: 2015/11/3
 * Time: 18:51
 */
namespace Home\Model;
use Think\Model;
class BackwardsModel extends BaseModel{

    public function get_info(){
        $info=$this->where(array('status'=>1,'deadline'=>array('gt',time())))->order('deadline asc')->select();
        $last = $this->where(array('status'=>1,'deadline'=>array('gt',time())))->order('deadline asc')->find();
        $time = time();
        $days = 0;
        $zx = '';
        $arr = array();
        foreach($info as $k=>$v){
            $df = $v['deadline']-$time;
            $days = floor($df/(3600*24));

            $v['b_days'] = $days+1;

            if(($v['id'] == $last['id']) || $v['b_days'] < 0){
                unset($v);
                $zx = $k;
            }
            $arr[] = $v;
        }
        array_splice($arr,$zx,1);
//        dump($arr);
        return $arr;
    }
    public function get_last(){
        $last = $this->where(array('status'=>1,'deadline'=>array('gt',time())))->order('deadline asc')->find();
//        dump($last);
        $time = time();
        $df = $last['deadline']-$time;
        $days = floor($df/(3600*24));
        $last['b_days'] = $days+1;
//        dump($last);
        return $last;
    }
    public function add_info($name, $remark, $deadline){

        $data['name'] = $name;
        $data['remark'] = $remark;
        $data['deadline'] = $deadline;
        $data['create_time'] = time();
        $data['update_time'] = time();
        if($this->where(array('status'=>array('gt', 0)))->add($data)){
            return true;
        }else return false;

    }
    public function edit_info($editId,$name,$remark,$deadline){
        $data['name'] = $name;
        $data['remark'] = $remark;
        $data['deadline'] = $deadline;
        $data['update_time'] = time();
        if($this->where(array('status'=>array('gt', 0),'id'=> $editId))->save($data)){
            return true;
        }else return false;
    }

    public function show_info($editId){
        if($editId == 0){
            return 111;
        }
        else{
            return $this->where(array('status'=>array('gt',0),'id'=>$editId))->find();
        }


    }

}