<?php
#fprintf() 把格式化的字符串写入到指定的输出流。
if (!($fp = fopen('currency.txt', 'w'))) {
    return;
}

$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
// echo $money will output "123.1";
$len = fprintf($fp, '%01.2f', $money);
// will write "123.10" to currency.txt

echo "wrote $len bytes to currency.txt";

//文件与目录创建和写入
$path = '.';
if (is_dir($path) || mkdir($path, 0777, true))
    $filename_path = $path . '/' . '_' . date('Ymd') . '.log';
file_put_contents($filename_path, "dsf", FILE_APPEND);
