<?php
/**
 * 菜单模板.
 * User: zyy
 * Date: 2017/8/29
 * Time: 23:48
 */

//授权页面

$testLogin = [
  'button'=>[
        [
            'type'=>'view',
            'name'=>'测试登录',
            'key'=>'testLogin'
        ],
  ]
];

//echo json_encode($testLogin);

$huiDiaoUrl = urlencode("http://zyytest.applinzi.com/wx/autologin.php");

$myurl =" https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5642ba0a4ffd98bd&
redirect_uri=$huiDiaoUrl&response_type=code&scope=snsapi_userinfo&state=zyy#wechat_redirect";
echo $myurl;