<?php
//PHP 的真正威力源自于它的函数。 在 PHP 中，提供了超过 1000 个内建的函数。函数是通过调用函数来执行的。 你可以在页面的任何位置调用函数。
function writeName()
{
    echo "Kai Jim Refsnes";
}

echo "My name is ";
writeName();
//PHP 函数 - 添加参数
//不能重载
function writeName1($fname)
{
    echo $fname . " Refsnes.<br>";
}

echo "My name is ";
writeName1("Kai Jim");
echo "My sister's name is ";
writeName1("Hege");
echo "My brother's name is ";
writeName1("Stale");

function writeName2($fname, $punctuation)
{
    echo $fname . " Refsnes" . $punctuation . "<br>";
}

echo "My name is ";
writeName2("Kai Jim", ".");
echo "My sister's name is ";
writeName2("Hege", "!");
echo "My brother's name is ";
writeName2("Ståle", "?");

//如需让函数返回一个值，请使用 return 语句。
function add($x, $y)
{
    $total = $x + $y;
    return $total;
}

echo "1 + 16 = " . add(1, 16);


//参数个数可变PHP 5.6+
function sum(...$numbers)
{
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);

//捕获不能被try捕获的500异常
ini_set("display_errors", "Off");
set_error_handler(function ($errno, $errstr) {
    $err_type = '';
    $return = true;
    if (E_WARNING === $errno) {
        $err_type = 'warning';
        $return = false;
    } elseif (E_NOTICE === $errno) {
        $err_type = 'notice';
    } elseif (E_ERROR === $errno) {
        $err_type = 'error';
    }
    $ret = array(
        "code" => 1003,
        "msg" => $errstr
    );
    _LogRegular("error", "unhandled php error", json_encode($_REQUEST), $err_type, $errno, json_encode($ret));
    return $return;
});
