<?php

function toEnglishBC($val1)
{
    $val1 = str_replace('，', ',', $val1);
    $val1 = str_replace('（', '(', $val1);
    $val1 = str_replace('）', ')', $val1);
    $val1 = str_replace('【', '[', $val1);
    $val1 = str_replace('】', ']', $val1);
    $val1 = str_replace('。', '.', $val1);
    return $val1;
}


function toChineseBC($val1)
{
    $val1 = str_replace(',', '，', $val1);
    $val1 = str_replace('(', '（', $val1);
    $val1 = str_replace(')', '）', $val1);
    $val1 = str_replace('[', '【', $val1);
    $val1 = str_replace(']', '】', $val1);
    $val1 = str_replace('.', '。', $val1);
    return $val1;
}

$str = file_get_contents("php://input");
echo toChineseBC($str);
echo "\n\n";
echo toEnglishBC($str);
?>