<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/8/30
 * Time: 16:15
 */

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

//e79640aecf423f6366a1c1ecd3327c637a6e6cfa

//e79640aecf423f6366a1c1ecd3327c637a6e6cfa
