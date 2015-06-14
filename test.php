<style type="text/css">
body{
font-family: "微软雅黑";
background-color: #444444;
}

#title {
color: #bbbbbb;
}

#music_list {
color:#aaaaaa;
}
#music_list li:hover {
color: #dd9999;
cursor: hand;
}
   </style>
<script>

    window.AudioContext = window.AudioContext || window.webkitAudioContext;


    window.onload = function() {
        var player = document.getElementById('player'),
            audioContext = new AudioContext(),
            playerAnalyser = audioContext.createAnalyser(),
            playerSource = audioContext.createMediaElementSource(player),
            timer;

        var canvas = document.getElementById('canvas'),
            context = canvas.getContext('2d'),
            CANVAS_WIDTH = canvas.clientWidth,
            CANVAS_HEIGHT = canvas.clientHeight;

        playerSource.connect(playerAnalyser);
        playerAnalyser.connect(audioContext.destination);


        timer = setInterval(process, 1);


        function process () {
            playerFrequencyData = new Uint8Array(playerAnalyser.frequencyBinCount);
            playerAnalyser.getByteFrequencyData(playerFrequencyData);

            playerTimeDomainData = new Uint8Array(playerAnalyser.fftSize);
            playerAnalyser.getByteTimeDomainData(playerTimeDomainData);

            var volumn = Array.max(playerTimeDomainData).value - Array.min(playerTimeDomainData).value,
                volumnStep = 0.2;

            this.volumnCurrent = this.volumnCurrent || 0;
            if (this.volumnCurrent < volumn) {
                this.volumnCurrent += volumnStep;
            } else {
                this.volumnCurrent -= volumnStep;
            }
            var h = (1 - this.volumnCurrent / 256) * 360,
                s = (volumn / 256) * 30 + 30 * this.volumnCurrent / 256 ,
                l =  (volumn / 256) * 30 + 20;

            document.body.style.backgroundColor = 'hsl(' + h + ',' + s + '%, ' +  l + '%)';
            plot(playerFrequencyData);
        }

        function plot (array) {
            var min = Array.min(array),
                max = Array.max(array);
            context.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
            context.beginPath();
            for (var i = 0; i < array.length; i++) {
                var x = CANVAS_WIDTH * i / (array.length - 1),
                    y = CANVAS_HEIGHT * (1 - (array[i] - min.value) / (max.value - min.value));
                if (i == 0) {
                    context.moveTo(x, y);
                } else {
                    context.lineTo(x, y);
                }
            }
            context.lineTo(0, CANVAS_HEIGHT);
            context.closePath();
            context.stroke();
        }

        var musicList = document.querySelectorAll('#music_list > li');

        for (var i = 0; i < musicList.length; i++) {
            musicList[i].onclick = function() {
                player.src = 'http://bcs.duapp.com/brokenjar/' + this.innerText + '.mp3';
            };
        }
    };

    Array.max = function (array) {
        var value = array[0],
            index = 0;
        for (var i = 1; i < array.length; i++) {
            if (array[i] > value) {
                value = array[i];
                index = i;
            }
        }
        return {value : value, index : index};
    };

    Array.min = function (array) {
        var value = array[0],
            index = 0;
        for (var i = 1; i < array.length; i++) {
            if (array[i] < value) {
                value = array[i];
                index = i;
            }
        }
        return {value : value, index : index};
    };
</script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2 id="title">背景色随节奏变化(chrome only)</h2>
<div style="float:left;">
    <canvas id="canvas"></canvas>
    <br/>
    <audio id="player" src="http://bcs.duapp.com/brokenjar/王妃 - 萧敬腾.mp3" autoplay controls></audio>
</div>

<ul id="music_list">
    <li>王妃 - 萧敬腾</li>
    <li>Evidence - Marilyn Manson</li>
    <li>主旋律 - 陈奕迅</li>
</ul>
</body>
</html>
