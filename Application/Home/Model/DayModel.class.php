<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/12
 * Time: 17:23
 */
namespace Home\Model;
use Think\Model;

class DayModel extends Model{

public function selAticle($date){
   $contentModel=M('Article');
    $temp=$this->where("date=$date")->select();
    $data['fid']=$temp[0]['id'];
    $temp1=$contentModel->where($data)->select();

    return $temp1;

}
    public function selDate(){

    }
public function  selImage($date){
    $imageModel=M('Image');
    $temp=$this->where("date=$date")->select();
    $data['fid']=$temp[0]['id'];
    $temp1=$imageModel->where($data)->select();

    return $temp1;

}
}