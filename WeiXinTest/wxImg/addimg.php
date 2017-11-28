<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/9/6
 * Time: 15:32
 */

include_once('BaseCode.php');

$obj = new WxImgCode();
$img = $_FILES['img'];

echo  $obj->addImg($img);