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

//PHP 有四种不同的变量作用域：
//
//local
//
//global
//
//static
//
//parameter
$x = 5; // 全局变量

function myTest()
{
    $y = 10; // 局部变量
    echo "<p>测试函数内变量:<p>";
    //当我们调用myTest()函数并输出两个变量的值, 函数将会输出局部变量 $y 的值
    //，但是不能输出 $x 的值，因为 $x 变量在函数外定义，无法在函数内使用，如果要在一个函数中访问一个全局变量，需要使用 global 关键字。
    global $x;
    echo "变量 x 为: $x";
    echo "<br>";
    echo "变量 y 为: $y";
}

myTest();

echo "<p>测试函数外变量:<p>";
echo "变量 x 为: $x";
echo "<br>";
//然后我们在myTest()函数外输出两个变量的值，函数将会输出全局部变量 $x 的值，
//但是不能输出 $y 的值，因为 $y 变量在函数中定义，属于局部变量。
//不会报错
echo "变量 y 为: $y";
?>
<?php
$x = 5;
$y = 10;
//同一个文件中function不可以重名
function myTest1()
{
    //函数里可以改变全局变量的值 是引用 不是值传递
    global $x, $y;
    $y = $x + $y;
}

myTest1();
echo $y;
?>
<?php
$x = 5;
$y = 11;

function myTest2()
{
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

myTest2();
echo $y;
?>

<?php

function myTest3()
{
    //当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。
    //
    //要做到这一点，请在您第一次声明变量时使用 static 关键字：
    static $x = 0;
    echo $x;
    $x++;
}

myTest3();
myTest3();
myTest3();

?>
<?php
//参数是通过调用代码将值传递给函数的局部变量。
//
//参数是在参数列表中声明的，作为函数声明的一部分：
function myTest4($x)
{
    echo $x;
}

myTest4(5);

?>
<?php
//NULL 值表示变量没有值。NULL 是数据类型为 NULL 的值。
//
//NULL 值指明一个变量是否为空值。 同样可用于数据空值和NULL值的区别。
//
//可以通过设置变量值为 NULL 来清空变量数据：
$x = "Hello world!";
$x = null;
var_dump($x);
//常量是一个简单值的标识符（名字）。常量值被定义后，在脚本的其他任何地方都不能被改变。
// 区分大小写的常量名 常量是全局的
//常量在定义后，默认是全局变量，可以在整个运行的脚本的任何地方使用。
define("GREETING", "欢迎访问 php.cn");
echo GREETING; // 输出 "欢迎访问 php.cn"
echo '<br>';
echo greeting; // 输出 "greeting"
?>
<?php
function myTest5()
{
    echo GREETING;
}

myTest5();    // 输出 "欢迎访问 php.cn"

