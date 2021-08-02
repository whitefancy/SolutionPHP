<?php
function sqlArray2Json($array)
{
    array_walk($array, function ($value, $key) use (&$array1) {
        $key = camelize($key);
        $array1[$key] = $value;
    });
    return $array1;
}

function jsonArray2sql($array)
{
    array_walk($array, function ($value, $key) use (&$array1) {
        $key = uncamelize($key);
        $array1[$key] = $value;
    });
    return $array1;
}

function uncamelize($camelCaps, $separator = '_')
{
    return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
}

function camelize($uncamelized_words, $separator = '_')
{
    $uncamelized_words = $separator . str_replace($separator, " ", strtolower($uncamelized_words));
    return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator);
}

function checkEmpty($str)
{
    $keys = explode(',', $str);
    $keys = jsonArray2sql($keys);
    foreach ($keys as $value) {
        echo "empty(Order::$" . $value . ")||\n";
    }
}


$str = file_get_contents("php://input");
$str = "appName,channel,channelUid,orderId,gameOrderId,productId,productName,serverId,uid,money,currency";
echo checkEmpty($str);
echo "\n\n";


