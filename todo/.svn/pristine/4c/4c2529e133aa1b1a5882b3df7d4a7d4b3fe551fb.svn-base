<?php
namespace Home\Model;
use Think\Model;
class BaseModel extends Model{
    public function articlePage($count , $one_count){
        $Page = new \Think\Page($count , $one_count);
        $Page->rollPage = '4';
        $Page->lastSuffix = false;
        $Page->setConfig('header', '共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页');

        $Page->setConfig('theme',' %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %HEADER%');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first','第一页');

        $show = $Page->show();

        // dump($show);
        return $show;
    }
}
?>