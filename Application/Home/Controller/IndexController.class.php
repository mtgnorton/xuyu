<?php
namespace Home\Controller;
use Home\Model\DayModel;
use Think\Controller;
class IndexController extends Controller
{
    public function index($date="2015-6-30"){
     $this->assign('date',$date);
$nowdays="2015-6-30";
$this->assign("nowdays",$nowdays);

        $dayModel=new DayModel();
//        $dayModel=

       $daohang=$dayModel->selDaoHang($date);
$this->assign("daohang",$daohang);

        $nowarticle=$dayModel->selAticle($nowdays);
        $nowtitle=$nowarticle[0][title];
        $this->assign("nowtitle",$nowtitle);

        $article=$dayModel->selAticle($date);

        $author=$article[0][author];
        $title=$article[0][title];
        $content=$article[0][content];
        $image=$dayModel->selImage($date);
        $sentence=$image[0][sentence];
        $imagePath=$image[0][originpath];
        $this->assign('imagePath',$imagePath);
        $this->assign('title',$title);
        $this->assign('content',$content);
        $this->assign('sentence',$sentence);
        $this->assign('author',$author);
        $this->display();
    }
    public function test(){

    }
}