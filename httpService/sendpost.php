<?php
/**
 * 发送post请求 file_get_contents版本
 * @param string $url 请求地址
 * @param array $post_data post键值对数据
 * @return string
 */
function send_post($url, $post_data) {

    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}

//使用方法
$post_data = array(
    'username' => 'stclair2201',
    'password' => 'handan'
);
//send_post('http://localhost', $post_data);
?>
<?php
/**
 * Socket版本
 * 使用方法：
 * $post_string = "app=socket&version=beta";
 * request_by_socket('chajia8.com', '/restServer.php', $post_string);
 */
function request_by_socket($remote_server,$remote_path,$post_string,$port = 80,$timeout = 30) {
    $socket = fsockopen($remote_server, $port, $errno, $errstr, $timeout);
    if (!$socket) die("$errstr($errno)");
    fwrite($socket, "POST $remote_path HTTP/1.0");
    fwrite($socket, "User-Agent: Socket Example");
    fwrite($socket, "HOST: $remote_server");
    fwrite($socket, "Content-type: application/x-www-form-urlencoded");
    fwrite($socket, "Content-length: " . (strlen($post_string) + 8)."");
  fwrite($socket, "Accept:*/*");
  fwrite($socket, "");
  fwrite($socket, "mypost=$post_string");
  fwrite($socket, "");
  $header = "";
  while ($str = trim(fgets($socket, 4096))) {
      $header .= $str;
  }

  $data = "";
  while (!feof($socket)) {
      $data .= fgets($socket, 4096);
  }

  return $data;
}
?>
<?php
/**
 * Curl版本
 * 使用方法：
 * $post_string = "app=request&version=beta";
 * request_by_curl('http://localhost/restServer.php', $post_string);
 */
function request_by_curl($remote_server, $post_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'mypost=' . $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "jb51.net's CURL Example beta");
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
?>
<?php
//请求的参数格式是原生（raw）的内容
function http_post($url, $data_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-AjaxPro-Method:ShowList',
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($data_string))
    );
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
http_post('localhost/zalopay/api/zalo/zalopay_callback.php','{
  "data":"{\"app_id\":2,\"zp_trans_id\":160520000000081,\"app_trans_id\":\"160520176021926423825\",\"app_time\":1463711618132,\"app_user\":\"160514000002501\",\"item\":\"[{\"itemID\":\"it002\",\"itemName\":\"Color 50K\",\"itemQuantity\":1,\"itemPrice\":50000}]\",\"amount\":1000,\"embed_data\":\"{\"promotioninfo\":\"\",\"merchantinfo\":\"du lieu rieng cua ung dung\"}\",\"server_time\":1463711619269,\"channel\":38,\"merchant_user_id\":\"rSVW3nBDryiJ6eN7h4L8ZjFn1OAbTaPoBm0I0JbB9zo\",\"user_fee_amount\":220}",
  "mac":"dffccb47694f836d6b19b8c234842ce0f6dd915ce4e9b251fb33241f1649d17f"
}');
