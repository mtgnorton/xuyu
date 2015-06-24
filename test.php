<script language="javascript" type="text/javascript">
    var w3c = (document.getElementByIdx) ? true : false;
    var agt = navigator.userAgent.toLowerCase();
    var ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1) && (agt.indexOf("omniweb") == -1));
    var mymovey = new Number();
    function IeTrueBody(){
        return (document.compatMode && document.compatMode!="BackCompat") ? document.documentElement : document.body;
    }
    function GetScrollTop(){
        return ie ? IeTrueBody().scrollTop : window.pageYOffset;
    }
</script>

<!--右侧漂浮QQ开始-->
<div id=backi style="Z-INDEX:2;WIDTH: 106px; POSITION: absolute; TOP: 50px; HEIGHT:auto; right:0">
    <img src="qq.jpg" width="106" height="205" />
</div>
<script language="JavaScript1.1">
    function heartBeat(){
     diffY=GetScrollTop();
     mymovey += Math.floor((diffY-document.getElementByIdx('backi').style.top.replace("px","")+50)*0.1);
     document.getElementByIdx('backi').style.top = mymovey+"px";
    }
    window.setInterval("heartBeat()",1);
   </script>
