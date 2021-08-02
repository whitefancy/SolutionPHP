<?php

$appKey = 'test31';
echo 'appKey: ' . $appKey . "\n";
$rightSign = generateMd5Sign($_POST, $appKey, null, true, false, 'sign');

function generateMd5Sign($params, $key, $key_name = null, $sort_key = false, $filter_null = true, $sign_name = null)
{
    if ($sign_name) {
        //去掉签名
        unset($params[$sign_name]);
    }
    if ($filter_null) {
        #过滤空值
        $params = array_filter($params);
    }
    if ($sort_key) {
        #排序
        ksort($params);
    }
    $paramurl = '';
    if ($key_name) {
        #添加key
        $params[$key_name] = $key;
        $size = count($params);
        $keys = array_keys($params);
        $values = array_values($params);
        for ($i = 0; $i < $size - 1; ++$i) {
            $paramurl = $paramurl . $keys[$i] . "=" . $values[$i] . "&";
        }
        $paramurl = $paramurl . $keys[$size - 1] . "=" . $values[$size - 1];
    } else {
        $size = count($params);
        $keys = array_keys($params);
        $values = array_values($params);
        for ($i = 0; $i < $size - 1; ++$i) {
            $paramurl = $paramurl . $keys[$i] . "=" . $values[$i] . "&";
        }
        $paramurl = $paramurl . $keys[$size - 1] . "=" . $values[$size - 1] . $key;
    }
    print ("拼接字符串:" . $paramurl . "\n");
    $paramurl = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }, $paramurl);
    print ("拼接字符串格式统一后:" . $paramurl . "\n");
    $sign = md5($paramurl);
    print ("生成验签:" . $sign . "\n");
    return;
}