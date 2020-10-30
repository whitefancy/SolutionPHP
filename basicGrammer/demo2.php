<?php
//PHP echo 和 print 语句
//echo 和 print 区别:
//
//echo - 可以输出一个或多个字符串
//
//print - 只允许输出一个字符串，返回值总为 1

$txt1 = "Learn PHP";
$txt2 = "www.php.cn";
$cars = array("Volvo", "BMW", "Toyota");

echo $txt1;
echo "<br>";
echo "Study PHP at $txt2";
echo "<br>";
echo "My car is a {$cars[0]}";
?>
<?php
$txt1 = "Learn PHP";
$txt2 = "www.php.cn";
$cars = array("Volvo", "BMW", "Toyota");

print $txt1;
print "<br>";
print "Study PHP at $txt2";
print "<br>";
print "My car is a {$cars[0]}";
?>
<br/>
<?php
//php数据类型包括String（字符串）, Integer（整型）, Float（浮点型）, Boolean（布尔型）, Array（数组）, Object（对象）, NULL（空值）。
//整型可以用三种格式来指定：十进制， 十六进制（ 以 0x 为前缀）或八进制（前缀为 0）。
//PHP var_dump() 函数返回变量的数据类型和值：
$x = 10.365;
var_dump($x);
echo "<br>";
$x = 2.4e3;
var_dump($x);
echo "<br>";
$x = 8E-5;
var_dump($x);
//布尔型可以是 TRUE 或 FALSE。
echo '<br>';
$x = true;
$y = false;
//PHP 数组
//数组可以在一个变量中存储多个值。
// PHP var_dump() 函数返回数组的数据类型和值：
$cars = array("Volvo", "BMW", "Toyota");
var_dump($cars);

?>
