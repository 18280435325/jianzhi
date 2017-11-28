<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/8/30
 * Time: 0:20
 */
$code = $_GET['code'];
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx5642ba0a4ffd98bd&secret=af49617df8dd2fc09934c3f92da44278&code=".$_GET['code']."&grant_type=authorization_code";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$info = json_decode($output,true);
$access_token = $info['access_token'];
$uid = $info['openid'];
$url2 = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$uid&lang=zh_CN";
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch2);
curl_close($ch2);
$info = json_decode($output,true);
var_dump($info);