<?php

define('TICKET','kgt8ON7yVITDhtdwci0qeSb3fL5H9pNvyxiTRMfYjKy5vptx7f7P6HCD1FINJU6gIzJIOo-00goOs1_DE7daZQ');
$noncestr='ZYYTEST';
$timestamp=time();
echo $timestamp;
echo '<br/>';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$string = "jsapi_ticket=".TICKET."&noncestr=$noncestr&timestamp=$timestamp&url=$url";
$signature = sha1($string);
echo $signature;

?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>分享朋友圈</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
</head>
<body>


<script>
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx5642ba0a4ffd98bd', // 必填，公众号的唯一标识
        timestamp: '<?php echo $timestamp  ?>', // 必填，生成签名的时间戳
        nonceStr: 'ZYYTEST', // 必填，生成签名的随机串
        signature: '<?php echo $signature  ?>',// 必填，签名，见附录1
        jsApiList: ['checkJsApi',
            'openLocation',
            'getLocation',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone'
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    wx.ready(function(){

        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
    });
    wx.error(function(res){
        alert(res);
        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    });
    wx.onMenuShareTimeline({
        title: '测试微信分享', // 分享标题
        desc:'测试分享。。。。。',
        link: 'http://zyytest.applinzi.com', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: 'img/share.png', // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
            alert('分享成功');
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
</script>
</body>
</html>