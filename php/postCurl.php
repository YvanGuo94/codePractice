<?php

function postCurl($url, $data = null, $second = 30)
{
    $ch = curl_init();
    //设置超时
    curl_setopt($ch, CURLOPT_TIMEOUT, $second);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);//严格校验
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, false);
    //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //post提交方式
    if (!empty($data)) {
        //print_r($data);die;
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    //运行curl
    $res = curl_exec($ch);
    //返回结果
    if ($res) {
        curl_close($ch);
        return $res;
    } else {
        $error = curl_errno($ch);
        curl_close($ch);
        return $error;
    }
}
