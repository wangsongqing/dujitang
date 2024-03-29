<!DOCTYPE html>
<!-- saved from http://nows.fun/ -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>毒鸡汤 - 壮士可要来一碗！</title>
    <meta name="description"
          content="我们精心熬制了有屎以来最毒1000多条经典毒鸡汤,句句“治愈”人心! 只为了帮你更好的看清人生认识自己，直面现实,直面惨淡的人生,不给你励志,不给你慰藉,像一根鞭猛的抽你一下,使你清醒,知道这个世界和你自己最真实的一面,是青少年手机里的必备宝典。">
    <meta name="keywords" content="鸡汤,毒鸡汤,馊鸡汤">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="author" content="yatang@126.com"/>
    <meta property="og:title" content="毒鸡汤 - 壮士可要来一碗！"/>
    <meta property="og:url" content="http://www.xmwme.com/"/>
    <meta property="og:image" content="http://www.xmwme.com/icon.png"/>
    <meta property="og:site_name" content="毒鸡汤 - 壮士可要来一碗！"/>
    <meta property="og:description"
          content="我们精心熬制了有屎以来最毒1000多条经典毒鸡汤,句句“治愈”人心! 只为了帮你更好的看清人生认识自己，直面现实,直面惨淡的人生,不给你励志,不给你慰藉,像一根鞭猛的抽你一下,使你清醒,知道这个世界和你自己最真实的一面,是青少年手机里的必备宝典。"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" id="page_favionc">
    <link href="<?php echo env('APP_URL') ?>/css/min.css" rel="stylesheet">
    <link rel="alternate icon" type="image/png" href="<?php echo env('APP_URL') ?>/img/icon.png">

</head>
<body>
<div class="top-wrap" style="position: absolute; top: 1vh;width: 100%;z-index: 999">
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col">
                <img src="<?php echo env('APP_URL') ?>/img/logo.png">
            </div>
            <div class="col">
                <div class="float-right" style="padding-top: 0px;">
                    <a class="btn btn-primary btn-filled btn-xs" href="https://github.com/wangsongqing">开源</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-wrapper" style="position: relative; top: -6vh;">
    <div class="container main-sentence justify-content-center text-center">
        <span id="sentence" style="font-size: 2rem;"></span>
    </div>
</div>

<div class="foot-1" style="position: absolute; bottom: 7vh;width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <p class="lead text">截屏分享朋友</p>
                <span class="btn btn-primary btn-filled btn-xs"><span class="btn btn-primary btn-filled btn-xs" id="agin_click">再来一碗</span></span>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script type="text/javascript" src="<?php echo env('APP_URL') ?>/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        getData();
    });

    $("#agin_click").click(function(){
        getData()
    });

    function getData(){
        $.get("<?php echo env('APP_URL') ?>/get_data",function(data,status){
            var title = data.data.title;
            $("#sentence").html(title)
        });
    }
</script><?php /**PATH /Users/songsong/development/PHP/dujitang/dujitang/storage/view/index/index.blade.php ENDPATH**/ ?>