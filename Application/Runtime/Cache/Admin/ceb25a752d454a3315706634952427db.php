<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Xuyu/Public/uploadify.css">
    <script src='/Xuyu/Public/jquery-1.11.3.min.js'></script>
    <script src='/Xuyu/Public/jquery.uploadify.min.js'></script>
</head>
<body>

<div id="imgs"><img width="" src=""></div>
<input id="img_upload" name="photo" type="file" multiple="true" value="" />
<audio id="mus" controls="" name="media"><source src="/Xuyu/Public/Uploads/test.mp3" type="audio/mpeg"></audio>
<div id="music"><img width="" src=""></div>
<input id="mus_upload" name="photo" type="file" multiple="true" value="" />


<form action="/Xuyu/index.php/Admin/Main/add"  method="post" >
    图片Url:<input name="imgpath" id="imgpath" type="text"/><br/>
    音乐Url:<input name="muspath" id="muspath" type="text"/><br/>
    句子<input name="sentence" type="text"/><br/>
    标题：<textarea name="title"></textarea><br/>
    作者：<textarea name="author"></textarea><br/>
    内容：<textarea name="content"></textarea>
    <input type="submit">
</form>
</body>

<script>
    var img = '';
    $('#img_upload').uploadify({
        'swf'      : '/Xuyu/Public/uploadify.swf',
        'uploader' : '<?php echo U("Admin/Main/uploadImage");?>',   //上传的方法
        'buttonText' : '图片上传',
        'onUploadSuccess' : function(file, data, response) {
            //把所有上传的图片都放入DIV中
            img += "<img width='200px' src='/Xuyu/Public/Uploads/Images/"+data+"'>";
            $('#imgs').html(img);
            $('#imgpath').val("/Xuyu/Public/Uploads/Images/"+data);
        }
    });

    var mus = '';
    $('#mus_upload').uploadify({
        'swf'      : '/Xuyu/Public/uploadify.swf',
        'uploader' : '<?php echo U("Admin/Main/uploadMusic");?>',   //上传的方法
        'buttonText' : '音乐上传',
        'onUploadSuccess' : function(file, data, response) {
            //把所有上传的图片都放入DIV中

            //img += "<img width='200px' src='/Xuyu/Public/Uploads/Musics/"+data+"'>";
            mus="/Xuyu/Public/Uploads/Musics/"+data;
            $('#mus').attr("src",mus);
            $('#muspath').val("/Xuyu/Public/Uploads/Musics/"+data);
            //alert(data);
        }
    });
</script>

</html>