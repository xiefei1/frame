<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>友情提示</title>
    <link rel="stylesheet" href="./static/bs3/css/bootstrap.min.css">
</head>
<body style="background: #eee">
<div class="jumbotron" style="text-align: center;margin-top: 200px">
    <div class="container">
<!--        <h1>--><?php //echo $message;?><!--</h1>-->
        <p>
            <a href="javascript:<?php echo $this->url?>;"><span id="time">3</span>秒之后自动跳转，如果没有跳转请点击这里...</a>
        </p>
        <p>
            <a href="http://www.wubin.pro" class="btn btn-primary btn-lg">About Me</a>
        </p>
    </div>
</div>
<script>
    var time = document.getElementById('time');
    setTimeout(function(){
        <?php echo $this->url?>
    },3000);
    setInterval(function(){

        time.innerHTML = time.innerHTML - 1;
    },1000)
</script>
</body>
</html>