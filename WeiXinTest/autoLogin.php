<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/8/30
 * Time: 0:07
 */
header('Content-type: text/html; charset=utf-8');

$code = $_GET['code'];
$responUrl = "http://zyytest.applinzi.com/wx/welcome.php?code=$code";

echo "

 <a href='$responUrl'><h1>点击确认完全授权登录</h1></a>
";