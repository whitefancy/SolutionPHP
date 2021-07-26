<?php


function UnicodeEncode($str)
{
    //split word
    preg_match_all('/./u', $str, $matches);

    $unicodeStr = "";
    foreach ($matches[0] as $m) {
        //拼接
        $unicodeStr .= "&#" . base_convert(bin2hex(iconv('UTF-8', "UCS-4", $m)), 16, 10);
    }
    return $unicodeStr;
}

function unicodeDecode($unicode_str)
{
    $json = '{"str":"' . $unicode_str . '"}';
    $arr = json_decode($json, true);
    if (empty($arr)) return '';
    return $arr['str'];
}

$str = file_get_contents("php://input");
echo unicodeDecode($str);
echo "\n\n";
echo UnicodeEncode($str);