<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<form action="/Xuyu/index.php/Admin/Main/add" enctype="multipart/form-data" method="post" >
句子<input name="sentence" type="text"/><br/>
音乐<input name="picture" type="text"/><br/>
图片Url:<input type="text"/><br/>
图片上传:<input type="file" name="photo" /><br/>
文章：<textarea name="title"></textarea><br/>
标题：<textarea name="article"></textarea>
    <input type="submit">
</form>
</body>
</html>