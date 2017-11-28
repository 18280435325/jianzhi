<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/9/6
 * Time: 16:28
 */
include_once('BaseCode.php');

$obj = new WxImgCode();

print_r(json_decode($obj->imgTextList('news'))) ;