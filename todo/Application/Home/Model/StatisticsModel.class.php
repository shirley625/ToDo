<?php
/*
author zsy
time 2015.11.6
*/
namespace Home\Model;
use Think\Model;
class StatisticsModel extends BaseModel {
	protected $tableName = 'details';
	public function get_week(){
		$user = ss_user_id();
		$time = date("Y-m-d",time());
		$time_arr = explode('-',$time);
		$y = $time_arr[0];
		$mon = $time_arr[1];
		$day = $time_arr[2];
		//$time_arr = explode('-',$time); 用这种方法取日期也可以
		$date = $this->where(array("status"=>1,'user_id'=>$user,'create_time'=>array("between",array(strtotime($time)-3600*24*7,strtotime($time)))))->group("create_time")->field("create_time")->order('create_time desc')->select();
		//这样取出的是今天以前七天内的时间
		foreach ($date as $key => $value) {
			$date1[intval(date('d',$value['create_time']))] = date('Y-m-d',$value['create_time']); //几号指向具体日期

		}
		$j = 0;
		for($i=$day-1;$i>=$day-7;$i--){
			$j++;
			if($date1[$i] != null){
				$finish[$i] = $this->where(array("status"=>1,'user_id'=>$user,"is_finished"=>1,'create_time'=>array("between",array(strtotime($date1[$i]),strtotime($date1[$i])+3600*24))))->count();
				$egg[$i] = $this->where(array("status"=>1,'user_id'=>$user,'create_time'=>array("between",array(strtotime($date1[$i]),strtotime($date1[$i])+3600*24))))->count();
				// dump($egg);
				$hatch[$i] = $finish[$i] / $egg[$i];
				if($hatch[$i] == false){
					$hatch[$i] = 0;
				}
				$week[$i]=array("finish"=>$finish[$i],"egg"=>$egg[$i],"hatch"=>$hatch[$i]);
			}else{
				$week[$i]=array("finish"=>0,"egg"=>0,"hatch"=>0);
			}

			if($i == 0){
				if($mon != 2){
					if(in_array($mon-1,array(4,6,9,11))){
						$i = 31;
					}else{
						$i = 30;
					}
				}else{
					if($y%4 == 0 && $y%100 != 0 || $y%400 == 0){
						$i = 29;
					}else{
						$i = 28;
					}
				}
			}
			if($j == 7){
				$i = $day-8;
			}

		}
		return $week;
	}
	public function get_year(){
		$user = ss_user_id();
		$date = $this->where(array("status"=>1,'user_id'=>$user))->group("create_time")->field("create_time")->order('create_time desc')->select();
		foreach ($date as $key => $value) {
			$date1[intval(date('m',$value['create_time']))] = date('Y-m',$value['create_time']);
			$yearsum[date('Y',$value['create_time'])]=array();

		}
		foreach ($yearsum as $key => $value) {
			for($i=1;$i<=12;$i++){
				$time_arr[$i] = explode('-',$date1[$i]);
				$year = $time_arr[$i][0];
				if($year == $key){
					$month[$i] = $time_arr[$i][1];
					if($month[$i]!=0){
						$month1[$i] = 1 + $month[$i];
					}else{
						$month1[$i] = 0;
					}
					$finish[$i] = $this->where(array("status"=>1,'user_id'=>$user,"is_finished"=>1,'create_time'=>array("between",array(strtotime($year.'-'.$month[$i]),strtotime($year.'-'.$month1[$i])))))->count();
					if($month1[$i]==13){
						$month1[$i]--;
						$day = 31;
					}else{
						$day = 1;
					}
					$egg[$i] = $this->where(array("status"=>1,'user_id'=>$user,'create_time'=>array("between",array(strtotime($year.'-'.$month[$i]),strtotime($year.'-'.$month1[$i].'-'.$day)))))->count();
					$hatch[$i] =  sprintf("%.2f",($finish[$i] / $egg[$i])*100);
					if($hatch[$i] == false || $hatch[$i] == 0){
						$hatch[$i] = 0;
					}
					$yearsum[$key][$i]=array("finish"=>$finish[$i],"egg"=>$egg[$i],"hatch"=>$hatch[$i]);
				}else{
					$yearsum[$key][$i]=array("finish"=>0,"egg"=>0,"hatch"=>0);
				}


			}
		}
		if($yearsum == null){
			$yearsum[0][0]=array("finish"=>0,"egg"=>0,"hatch"=>0);
		}
		return $yearsum;
	}
}