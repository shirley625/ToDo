<?php 
namespace Home\Model;
use Think\Model;
class NotesModel extends BaseModel{
    public function get_note(){
        return $this->where(array('status'=>1,'user_id'=>ss_user_id()))->order("create_time desc")->select();
    }

    public function del_note($id){
       return $this->where(array('status'=>1,'id'=>$id))->setField('status',0);
    }

    public function add_note($user_id,$content,$paper_type,$color){
        $data['user_id']=$user_id;
        $data['note']=$content;
        $data['paper_type']=$paper_type;
        $data['color']=$color;
        $data['create_time']=time();
        if($id=$this->where(array('status'=>array('gt', 0)))->add($data)){
            return $id;
        }else return false;
    }
    public function edit_note($id,$content,$paper_type,$color){
        $data['note']=$content;
        $data['paper_type']=$paper_type;
        $data['color']=$color;
        $data['create_time']=time();
        if($this->where(array('status'=>array('gt', 0),'id'=> $id))->save($data)){
            return true;
        }else return false;
    }
}
?>