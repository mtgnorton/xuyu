<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index(){
        $db=M('music');
        print_r($db->where('id=1')->select());
        $this->display();

    }
}