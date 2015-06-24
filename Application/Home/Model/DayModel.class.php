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

    $arr['date']=$date;
    $temp=$this->where($arr)->select();

    $data['fid']=$temp[0]['id'];
    $temp1=$contentModel->where($data)->select();

    return $temp1;

}
    public function selDate(){

    }
public function  selImage($date){
    $imageModel=M('Image');
    $arr['date']=$date;
    $temp=$this->where($arr)->select();
    $data['fid']=$temp[0]['id'];
    $temp1=$imageModel->where($data)->select();

    return $temp1;

}
    public function  selDaoHang($date){
        $contentModel=M('Article');
        $dateArr=explode("-",$date);
        $start=$dateArr[2]-7;
        $end=$dateArr[2];
        for($start;$start<=$end;$start++){
            $date_new="2015-6-".$start;

            $arr['date']=$date_new;
            $temp=$this->where($arr)->select();

            $arr1['fid']=$temp[0]['id'];
            $temp1=$contentModel->where($arr1)->select();
            $data[$date_new]=$temp1[0][title];
        }
      return $data;
    }
}