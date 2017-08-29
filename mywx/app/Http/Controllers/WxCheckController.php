<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/8/29
 * Time: 10:57
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WxCheckController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    /** 微信回调地址检测
     * @throws \Exception
     */
    public function urlCheck()
    {
        try{
            $weiXinInfo = $this->request->all();
            $param = [env('wx_url_token') ,$weiXinInfo['timestamp'],'nonce'];
            sort($param,SORT_STRING);
            $requestString = sha1(implode($param));
            if($requestString===$weiXinInfo['signature']){
                return $weiXinInfo['echostr'];
            }
            return false;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


    public function getAccessToken()
    {
        try{

        }catch (\Exception $e){

        }

    }
}