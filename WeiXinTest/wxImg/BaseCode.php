<?php
/**
 * Created by PhpStorm.
 * User: zyy
 * Date: 2017/9/6
 * Time: 14:33
 */

class WxImgCode
{
    private $wx_appid = 'wx5642ba0a4ffd98bd';
    private $wx_appsecret = 'af49617df8dd2fc09934c3f92da44278';

    /**
     * 新增永久图片
     */
    public function addImg($img)
    {
        try{
            //省略图片的验证，包括文件是否存在，大小是否大于5字节小于2M，文件类型是否为 bmp/png/jpeg/jpg/gif
            $access_token = $this->getToken();
            move_uploaded_file($img['tmp_name'],'img/'.$img['name']);
            //获取文件信息
            $file_info = array(
                'filename'=>'@images/'.$img['name'],  //国片相对于网站根目录的路径
                'content-type'=>$img['type'],  //文件类型
                'filelength'=>$img['size']         //图文大小
            );
            $data = json_encode(
                [
                    'access_token'=>$access_token,
                    'type'=>'image',
                    'media'=>$file_info['filename'],
                    'form-data'=>$file_info
                ]
            );
            $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=$access_token&type=image";
            $response = json_decode($this->curlPostRequest($url,$data),true);
            if(isset($response['errcode'])||(!$response)){
                throw new \Exception('添加图片素材失败：'.$response['errmsg']);
            }
            return $response;
        }catch (\Exception $e){
            echo $e->getMessage();
            exit();
        }


    }
    /**
     *  新增永久图文素材
     */
    public function addImgText()
    {

    }

    /**
     *  获取调用接口凭证 [有效期7200秒，请把获取的access_token存放数据库，过期后再使用]
     */
    public function getToken()
    {
        if(1){   //如果数据库的最后一个token为过期 则获取数据库中的token
            return 'h01ds89Y5B3rSxwycv2cWrMGhtQ58y6RdvH3yvhbQx_jyKTVz5dWb1bi0UiHx0oHha9ZZg2xe7P8BiNPuExRNnN1DHDLAa0bGzJQxazqEvDL5OFHePtHaLV0GFlaoeaERHBgABAMCW';
        }else{
            $appid  = $this->wx_appid;
            $secret = $this->wx_appsecret;
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&"
                ."secret=$secret";
            $response = json_decode($this->curlGetRequest($url),true);
            if(isset($response['errcode'])||(!$response)){
                throw new \Exception('access_token获取失败：'.$response['errmsg']);
            }
            return $response["access_token"];
        }


    }
    /**
     *  永久素材列表
     */
    public function imgTextList($type,$offset=0,$count=10)
    {
        try{
            $access_token = $this->getToken();
            $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=$access_token";
            $data = json_encode(array(
                'type'=>$type,
                'offset'=>$offset,
                'count'=>$count
            ));
          return  $this->curlPostRequest($url,$data);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }

    }
    /**
     *  获取指定的图文素材
     */
    public function getImgTextInfo($thumb_media_id){


    }
    /**
     * 下载图片
     */
    public function downloadImg()
    {

    }

    /**
     *  curl get请求
     */
    public function curlGetRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  //ALSE 禁止 cURL 验证对等证书（peer's certificate）。要验证的交换证书可以在 CURLOPT_CAINFO 选项中设置，或在 CURLOPT_CAPATH中设置证书目录
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  //设置为 1 是检查服务器SSL证书中是否存在一个公用名(common name)。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     *  curl post请求
     */
    public function curlPostRequest($url,$data)
    {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
   //     curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec ($ch);

        curl_close($ch);
        if ($result == NULL) {
            return 0;
        }
        return $result;

    }

    /**
     *  curl 文件上传请求 [不经过表单处理]
     */
    public function curlFileUpRequest()
    {

    }
}

