<?php
/**
 * Created by PhpStorm.
 * User: lmfx
 * Date: 2015/6/11
 * Time: 21:56
 */

namespace Admin\Controller;

use Think\Controller;

class MainController extends Controller
{

    public function test()
    {

        $M = D('Day');
        print_r($M->getAllById(2));
    }


    //主界面。
    public function index()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->assign('today', $this->setdate());
        $this->display('index2');
    }

    public function index2()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

        $this->display('index');
    }


    public function setdate()
    {

        return $time = date("Y-n-d");
    }


    function  quickedit()
    {

        //print_r($_POST);

        $data['date'] = $_POST['date'];

        $day = M('day');
        $id = $day->where($data)->find()['id'];

        $_GET['id'] = $id;
        $this->edit();


    }

    function curl_get($url)
    {
        $refer = "http://music.163.com/";
        $header[] = "Cookie: " . "appver=1.5.0.75771;";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, $refer);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    function search($url, $key)
    {

        $data = array(
            'hlpretag' => '<span class="s-fc7">',
            'hlposttag' => '</span>',
            's' => song_name,
            'type' => 1,
            'offset' => 0,
            'total' => 'true',
            'limit' => 8
        );

        $header = array(
            'Accept' => '*/*',
            'Accept-Encoding' => 'gzip,deflate,sdch',
            'Accept-Language' => 'zh-CN,zh;q=0.8,gl;q=0.6,zh-TW;q=0.4',
            'Connection' => 'keep-alive',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'DNT' => 1,
            'Host' => 'music.163.com',
            'Origin' => 'http://music.163.com',
            'Referer' => 'http://music.163.com/search/',
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36'


        );

//    $refer = "http://music.163.com";
//    $header[] = "Cookie: " . "usertrack=c+5+hlU+R5u6qDXxCDREAg==; usertrack=ezq0alU+R5xmcUAeBr2cAg==; _ntes_nnid=074c704cfb03fc62f0f4ba2b28566e65,1430628487401; _ntes_nuid=074c704cfb03fc62f0f4ba2b28566e65; vjuids=-42e2bab94.14d227663ce.0.a93e9732; vjlast=1430802294.1431507345.13; vinfo_n_f_l_n3=a4ce1a9641decc18.1.2.1430802294821.1431507347614.1432769073743; visited=true; P_INFO=qustnetengineer@163.com|1434085252|0|mail163|00&99|shd&1434085173&other#shd&370200#10#0#0|&0|163&mail163|qustnetengineer@163.com; JSESSIONID-WYYY=bd17cb2f9f885e9bb6dc1d6526692253888ee8de0b5e63593bc3d705683b5c80f9316149d393d18eb6ab6f515968e83ed6682db34af9879ffcf7d62a1c7a85654216e164dfe7ca9bf4c3441442d2cd8426bf5d3c637599a5dc8de34458922e4151c910f85e2e648046957e6f0a718f688f71ad5891b5bbae53a0a75351a618ad212e5497; __utma=94650624.321209375.1431753990.1434550571.1434600437.5; __utmb=94650624.7.10.1434600437; __utmc=94650624; __utmz=94650624.1434600437.5.4.utmcsr=baidu|utmccn=(organic)|utmcmd=organic|utmct;";
//        $header[]="User-Agent:"."Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36;";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
//    curl_setopt($ch, CURLOPT_REFERER, $refer);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function  music()
    {
        $key = $_GET['key'];
        $url = "http://music.163.com/api/search/get/web?csrf_token=";
//        $url = "http://music.163.com/api/song/detail/?id=" . $music_id . "&ids=%5B" . $music_id . "%5D";
        print_r("sss" . json_decode($this->search($url, $key), true));

    }


    public function  update()
    {

        //print_r($_POST);
        $id = $_POST['id'];
        $d = $_POST;

        $article['title'] = $d['title'];
        $article['content'] = $d['content'];
        $article['author'] = $d['author'];

        $music['musicpath'] = $d['muspath'];

        $img['originpath'] = $d['imgpath'];
        $img['sentence'] = $d['sentence'];

//        $day = M("day"); // 实例化User对象
        $data['id'] = $id;
        $otherdate['fid'] = $id;
//        $day->where($data)->save();
        //dump($list);

        $images = M("Image"); // 实例化User对象
        $images->where($otherdate)->save($img);


        $articles = M("article"); // 实例化User对象
        $articles->where($otherdate)->save($article);


        $musics = M("music"); // 实例化User对象
        $musics->where($otherdate)->save($music);

        $this->success('修改成功', '/Admin/Main/lookup');


    }


    public function  delete()
    {

        $id = $_GET['id'];


//        $day = M("day"); // 实例化User对象
//        $data['id']=$id;
//        $otherdate['fid']=$id;
//        $day->where($data)->delete();
//        //dump($list);
//
//        $image = M("Image"); // 实例化User对象
//        $image->where($otherdate)->delete();
//        //dump($list);
//
//        $article = M("article"); // 实例化User对象
//        $article->where($otherdate)->delete();
        //dump($list);


        $this->success('删除成功', '/Admin/Main/lookup');
//        $music = M("music"); // 实例化User对象
//        $list=$music->select();

    }

//修改
    public function  edit()
    {


        //print $_GET;

        $id = $_GET['id'];

        $day = M("day"); // 实例化User对象
        $data['id'] = $id;
        $daylist = $day->where($data)->find();
        //dump($list);

        $image = M("Image"); // 实例化User对象
        $imglist = $image->where($data)->find();
        //dump($list);

        $article = M("article"); // 实例化User对象
        $artlist = $article->where($data)->find();
        //dump($list);

        $music = M("music"); // 实例化User对象
        $list = $music->select();
        //print_r($imglist);
        $this->assign('day', $daylist);
        $this->assign('img', $imglist);
        $this->assign('art', $artlist);
        $this->display('t');

        $this->display('edit');


    }


    public function lookup()
    {


        $day = M("day"); // 实例化User对象
        $daylist = $day->order('id')->select();
        //dump($list);

        $image = M("Image"); // 实例化User对象
        $imglist = $image->order('fid')->select();
        //dump($list);

        $article = M("article"); // 实例化User对象
        $artlist = $article->order('fid')->select();
//        dump($artlist);

        $music = M("music"); // 实例化User对象
        $list = $music->order('fid')->select();
//        dump($list);

        $list = array();
//        $list['day']=$daylist;
//        $list['sen']=$imglist;

        //echo $imglist[1]['sentence'];
        $this->assign('day', $daylist);
        $this->assign('img', $imglist);
        $this->assign('art', $artlist);
//        $this->assign('list',$list);
        $this->display('lookup');

    }

    public function upload()
    {
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => './Public/',
            'savePath' => './Uploads/',
            'saveName' => array('date', 'YmdHis'),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => false,
            //'subName' => array('date','YmdHis'),
        );

        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            //$this->success('上传成功！');
            print_r($info);
        }
    }

    public function add()
    {
        //print_r($_POST);
        return;
        $time = $_POST['date'];
        echo $time;
        //echo $_POST['sentence'];
        print_r($_POST);

        $day['date'] = $time;
        $day_db = M('day');
        $day_db->add($day);
        $fid = $day_db->where('date=\'' . $time . "'")->find()['id'];
        //print_r($fid);

        //return;
        $article = array(
            'fid' => $fid,
            'title' => $_POST['title'],
            'sentence' => $_POST['sentence'],
            'content' => $_POST['content'],
            'author' => $_POST['author']
        );
        $article_db = M('article');
        $article_db->add($article);


        $image = array(
            'originpath' => $_POST['imgpath'],
            'fid' => $fid
        );

        $image_db = M('image');
        $image_db->add($image);

        $music = array(
            'musicpath' => $_POST['muspath'],
            'fid' => $fid
        );
        $music_db = M('music');
        $music_db->add($music);

        $this->success('添加成功', '/Admin/main');
        //print_r($day);
        //$this->upload();
    }

    public function uploadImage()
    {
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                //'maxSize'    =>    8145728,
                'rootPath' => 'Public',
                'savePath' => '/Uploads/Images/',
                'saveName' => array('date', 'YmdHis'),
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => false,
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if ($images) {
                $info = $images['Filedata']['savename'];
                $data = array(
                    'savename' => $info,
                    'savepath' => $config['rootPath'] . $images['Filedata']['savepath'],//保存路径
                    'status' => 1,//状态
                );
                //print_r($info);
                //返回文件地址和名给JS作回调用
                //echo $info;
            } else {
                $data = array(
                    'status' => 0,//状态
                    'info' => $upload->getError(),//错误信息
                );
                //$this->error($upload->getError());//获取失败信息
            }
            $this->ajaxReturn($data);
        }
    }

    public function uploadMusic()
    {
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                //'maxSize'    =>    8145728,
                'rootPath' => 'Public',
                'savePath' => '/Uploads/Musics/',
                'saveName' => array('date', 'YmdHis'),
                'exts' => array('mp3', 'wav', 'png', 'jpeg'),
                'autoSub' => false,
                //'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if ($images) {
                $info = $images['Filedata']['savename'];
                $data = array(
                    'savename' => $info,
                    'savepath' => $config['rootPath'] . $images['Filedata']['savepath'],//保存路径
                    'status' => 1,//状态
                );
                //print_r($info);
                //返回文件地址和名给JS作回调用
                //echo $info;
            } else {
                $data = array(
                    'status' => 0,//状态
                    'info' => $upload->getError(),//错误信息
                );
                //$this->error($upload->getError());//获取失败信息
            }
            $this->ajaxReturn($data);
        }
    }

}

