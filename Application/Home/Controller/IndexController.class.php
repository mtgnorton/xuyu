<?php
namespace Home\Controller;
use Home\Model\DayModel;
use Think\Controller;
class IndexController extends Controller
{
    public function index($date=""){
        $dayModel=new DayModel();



$nowdays=$dayModel->getNow();
        echo $nowdays;
        $date==null?$nowdays:$date;
        $this->assign('date',$date);
$this->assign("nowdays",$nowdays);

        $dayModel=new DayModel();
//        $dayModel=
       $daohang=$dayModel->selDaoHang($date);
$this->assign("daohang",$daohang);
$music=$dayModel->selMusic($date);

$dayModel->mm();
        $this->assign("musicName",$music[0]['name']);
$this->assign("musicPath",$music[0]['musicpath']);

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
    public function login(){
$this->display();
    }
}