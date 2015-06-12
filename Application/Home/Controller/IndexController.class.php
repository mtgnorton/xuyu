<?php
namespace Home\Controller;
use Home\Model\DayModel;
use Think\Controller;
class IndexController extends Controller
{
    public function index($date="6.12"){
$datearr=explode(',',$date);
     $this->assign('month',$datearr[0]);
        $this->assign('day',$datearr[1]);



        $dayModel=new DayModel();
        $article=$dayModel->selAticle($date);
        $sentence=$article[0][sentence];
        $author=$article[0][author];
        $title=$article[0][title];
        $content=$article[0][content];
        $this->assign('title',$title);
        $this->assign('content',$content);
        $this->assign('sentence',$sentence);
        $this->assign('author',$author);
        $this->display();
    }
    public function test(){

    }
}