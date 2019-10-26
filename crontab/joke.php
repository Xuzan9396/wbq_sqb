<?php
/**
 * Created by PhpStorm.
 * User: xuzan
 * Date: 2019/10/19
 * Time: 10:43 PM
 */

class joke
{
    //xuzan7

    public function http_get( $url, $params = [], $method = 'GET', $body = "0", $header = array() )
    {
        $opts = [
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER => $header
        ];

        /* 根据请求类型设置特定参数 */
        switch (strtoupper($method)) {
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否是否是body 传输
                $params = $body ? json_encode($params) : http_build_query($params);
                $opts = [
                    CURLOPT_URL => $url,
                    CURLOPT_POST => 1,
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_POSTFIELDS => $params,
                ];
                break;
            default:
                throw new \Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);

        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function jokeAction(  )
    {
        $url = 'http://v.juhe.cn/joke/randJoke.php';
        $res = $this->http_get($url,['key'=>'8ed222322fdbb25719af36452a76f31f',"time" => time()]);
        $resArr = json_decode($res,true);
        if(isset($resArr['error_code']) && $resArr['error_code'] == 0){
            $dingUrl = 'https://oapi.dingtalk.com/robot/send?access_token=a5ae6449b65cbd4ddd54b71da61ead97249197d7248eb3d10595e2382e7ca2b8';

            $num = rand(0,9);
            $content =  $resArr['result'][$num]['content'];
            $jsonArr = [
                'msgtype' => 'text',
                'text' => [
                    'content' => $content,
                ],
                'at' => [
                    'atMobiles' => false,
                    'isAtAll' => false
                ]
            ];

            https($dingUrl, $jsonArr, true);
        }

        exit();

    }
}