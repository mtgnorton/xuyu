<?php
/**
 * Created by PhpStorm.
 * User: lmfx
 * Date: 2015/6/11
 * Time: 21:56
 */

namespace Admin\Controller;
use Think\Controller;
class MainController extends Controller {

    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display('index2');
    }

    public function index2(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display('index');
    }


    public function upload(){
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => './Public/',
            'savePath' => './Uploads/',
            'saveName' => array('date','YmdHis'),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => false,
            //'subName' => array('date','YmdHis'),
        );

        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //$this->success('上传成功！');
            print_r($info);
        }
        }

    public function add(){
        print_r($_POST);
        return;
        $time=date('Y-m-d');
        echo $time;
        //echo $_POST['sentence'];
        print_r($_POST);

        $day['date']=$time;
        $day_db=M('day');
        $day_db->add($day);
        $fid=$day_db->where('date=\''.$time."'")->find()['id'];
        //print_r($fid);

        //return;
        $article = array(
            'fid'=>$fid,
            'title'=>$_POST['title'],
            'sentence'=>$_POST['sentence'],
            'content'=>$_POST['content'],
            'author'=>$_POST['author']
        );
        $article_db=M('article');
        $article_db->add($article);


        $image=array(
            'originpath'=>$_POST['imgpath'],
            'fid'=>$fid
        );

        $image_db=M('image');
        $image_db->add($image);

        $music=array(
            'musicpath'=>$_POST['muspath'],
            'fid'=>$fid
        );
        $music_db=M('music');
        $music_db->add($music);

        $this->success('添加成功', '/Xuyu/Admin/main');
        //print_r($day);
        //$this->upload();
    }

    public function uploadImage(){
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                //'maxSize'    =>    8145728,
                'rootPath'	 =>    'Public',
                'savePath'   =>    '/Uploads/Images/',
                'saveName'   =>    array('date','YmdHis'),
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    false,
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savename'];
                $data=array(
                    'savename'=>$info,
                    'savepath'=>$config['rootPath'].$images['Filedata']['savepath'],//保存路径
                    'status'=>1,//状态
                );
                //print_r($info);
                //返回文件地址和名给JS作回调用
                //echo $info;
            }
            else{
                $data=array(
                    'status'=>0,//状态
                    'info'=>$upload->getError(),//错误信息
                );
                //$this->error($upload->getError());//获取失败信息
            }
            $this->ajaxReturn($data);
        }
    }

    public function uploadMusic(){
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                //'maxSize'    =>    8145728,
                'rootPath'	 =>    'Public',
                'savePath'   =>    '/Uploads/Musics/',
                'saveName'   =>    array('date','YmdHis'),
                'exts'       =>    array('mp3', 'wav', 'png', 'jpeg'),
                'autoSub'    =>    false,
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savename'];
                $data=array(
                    'savename'=>$info,
                    'savepath'=>$config['rootPath'].$images['Filedata']['savepath'],//保存路径
                    'status'=>1,//状态
                );
                //print_r($info);
                //返回文件地址和名给JS作回调用
                //echo $info;
            }
            else{
                $data=array(
                    'status'=>0,//状态
                    'info'=>$upload->getError(),//错误信息
                );
                //$this->error($upload->getError());//获取失败信息
            }
            $this->ajaxReturn($data);
        }
    }

}

