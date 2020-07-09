<?php

// PHP Version 7.3.3

$config = [
    "app_id" => 2553,
    "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
    "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
    "endpoint" => "https://sbgateway.zalopay.vn/api/getlistmerchantbanks"
];

$reqtime = round(microtime(true) * 1000); // miliseconds
$params = [
    "app_id" => $config["app_id"],
    "reqtime" => $reqtime,
    "mac" => hash_hmac("sha256", $config["app_id"]."|".$reqtime, $config["key1"]) // app_id|reqtime
];

$resp = file_get_contents($config["endpoint"]."?".http_build_query($params));
$result = json_decode($resp, true);

foreach ($result as $key => $value) {
    echo "$key: $value<br>";
}