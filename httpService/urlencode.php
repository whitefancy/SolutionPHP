<?php
$callback_data =array();
$raw_data ='{
  "data":"{\"app_id\":2,\"zp_trans_id\":160520000000081,\"app_trans_id\":\"160520176021926423825\",\"app_time\":1463711618132,\"app_user\":\"160514000002501\",\"item\":\"[{\"itemID\":\"it002\",\"itemName\":\"Color 50K\",\"itemQuantity\":1,\"itemPrice\":50000}]\",\"amount\":1000,\"embed_data\":\"{\"promotioninfo\":\"\",\"merchantinfo\":\"du lieu rieng cua ung dung\"}\",\"server_time\":1463711619269,\"channel\":38,\"merchant_user_id\":\"rSVW3nBDryiJ6eN7h4L8ZjFn1OAbTaPoBm0I0JbB9zo\",\"user_fee_amount\":220}",
  "mac":"16b369598e86411baf15421cff917610119f37d157c064109618496c937b9bc5"
}';

//$raw_data ='{
//  "data":"{\"app_id\":2,\"zp_trans_id\":160520000000081,\"app_trans_id\":\"160520176021926423825\",\"app_time\":1463711618132,\"app_user\":\"160514000002501\",\"amount\":1000,\"server_time\":1463711619269,\"channel\":38,\"merchant_user_id\":\"rSVW3nBDryiJ6eN7h4L8ZjFn1OAbTaPoBm0I0JbB9zo\",\"user_fee_amount\":220}",
//  "mac":"16b369598e86411baf15421cff917610119f37d157c064109618496c937b9bc5"
//}';

echo urlencode($raw_data ) ;
echo '<br>';
echo rawurlencode($raw_data);


function json_to_array($str) {
    if (is_string($str))
        $str = json_decode($str);
    $arr=array();
    foreach($str as $k=>$v) {
        if(is_object($v) || is_array($v))
            $arr[$k]=json_to_array($v);
        else
            $arr[$k]=$v;
    }
    return $arr;
}
$jd=json_decode($raw_data,true,20,JSON_UNESCAPED_UNICODE);
var_dump($jd);
$data=$jd['data'];
$jdd=json_decode($data);
var_dump($jdd);

$js='{"app_id":2,"zp_trans_id":160520000000081,"app_trans_id":"160520176021926423825","app_time":1463711618132,"app_user":"160514000002501","item":"[{"itemID":"it002","itemName":"Color 50K","itemQuantity":1,"itemPrice":50000}]","amount":1000,"embed_data":"{"promotioninfo":"","merchantinfo":"du lieu rieng cua ung dung"}","server_time":1463711619269,"channel":38,"merchant_user_id":"rSVW3nBDryiJ6eN7h4L8ZjFn1OAbTaPoBm0I0JbB9zo","user_fee_amount":220}';
$jsa=addslashes($js);
echo  $jsa;
$jdd=json_decode($js,true,JSON_UNESCAPED_UNICODE);
var_dump($jdd);
$js='{"app_id":2,"zp_trans_id":160520000000081,"app_trans_id":"160520176021926423825","app_time":1463711618132,"app_user":"160514000002501","item":"[{"itemID":"it002","itemName":"Color 50K","itemQuantity":1,"itemPrice":50000}]","amount":1000,"embed_data":"{"promotioninfo":"","merchantinfo":"du lieu rieng cua ung dung"}","server_time":1463711619269,"channel":38,"merchant_user_id":"rSVW3nBDryiJ6eN7h4L8ZjFn1OAbTaPoBm0I0JbB9zo","user_fee_amount":220}';
$jdd=json_decode($js,false);
var_dump($jdd);
$js='{"app_id":2,"zp_trans_id":160520000000081,"app_trans_id":"160520176021926423825","app_time":1463711618132,"app_user":"160514000002501","item":"[{"itemID":"it002","itemName":"Color 50K","itemQuantity":1,"itemPrice":50000}]","amount":1000,"embed_data":"{"promotioninfo":"","merchantinfo":"du lieu rieng cua ung dung"}","server_time":1463711619269,"channel":38,"merchant_user_id":"rSVW3nBDryiJ6eN7h4L8ZjFn1OAbTaPoBm0I0JbB9zo","user_fee_amount":220}';
$jdd=json_decode($js);
var_dump($jdd);

$json = json_encode(
    array(
        'data' => array(
            'English' => array(
                'One'=>'fas',
                'January'=>'gsg'
            ),
            'French' => array(array(
                'One'=>'fas',
                'January'=>'gsg'
            )
            )
        )
    )
);
echo $json;//{"data":{"English":{"One":"fas","January":"gsg"},"French":[{"One":"fas","January":"gsg"}]}}
$ejs=json_decode($json);
var_dump($ejs);