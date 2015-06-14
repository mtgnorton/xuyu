<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>霓虹灯文字效果使用jQuery和CSS | jsfoot脚本特效 演示</title>
</head>
<body>

<h1 id="neonText">
    Neon Text Effect With jQuery &amp; CSS.
    <span class="textVersion" id="version1"></span>
    <span class="textVersion" id="version2"></span>
</h1>


<link rel="stylesheet" type="text/css" href="styles.css" />

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
<style>
    *{
        /* A universal page reset */
        margin:0;
        padding:0;
    }

    body{
        /* Setting default text color, background and a font stack */
        font-size:14px;
        color:#ccc;
        background-color:#141414;
        font-family:Arial, Helvetica, sans-serif;
    }

    #neonText span{
        width:700px;
        height:150px;
        position:absolute;
        left:0;
        top:0;

        background:url('img/text.jpg') no-repeat left top;
    }

    span#version1{
        z-index:100;
    }

    span#version2{
        background-position:left bottom;
        z-index:99;
    }


    #neonText{
        height:150px;
        margin:180px auto 0;
        position:relative;
        width:650px;
        text-indent:-9999px;
    }
</style>
<script>
    $(document).ready(function(){

        setInterval(function(){

            // Selecting only the visible layers:
            var versions = $('.textVersion:visible');

            if(versions.length<2){
                // If only one layer is visible, show the other
                $('.textVersion').fadeIn(800);
            }
            else{
                // Hide the upper layer
                versions.eq(0).fadeOut(800);
            }
        },1000);

    });

</script>